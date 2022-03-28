<?php

namespace controllers\moderator;

use core\Application;
use core\Controller;
use core\DatabaseService;
use core\Request;
use core\Model;
use models\meeting;
use models\users\staff;
use models\users\User;
use models\volEvents;


class modController extends Controller
{

//---------------------------------------------------------------------------------------------------------------
//    Moderator

    public function Modhome()
    {
        $meeting = new meeting();
//        meeting data
        $sqlStatement = "SELECT meeting.id,meeting.meeting_type,t.startTime,t.endTime, s.date, s2.fname, s2.lname
                            FROM meeting
                            JOIN timeslot t on meeting.timeslotId = t.timeslotId
                            JOIN shift s on s.shiftId = t.shiftId
                            left join staff s2 on s2.id = meeting.befrienderId
                            WHERE s.date = CURRENT_DATE";
        $meetingDetails = $meeting->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $meetingCount = $meeting->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);

//        User requests data
        $userRequest = new staff();
        $sqlStatement = "SELECT * FROM staff WHERE state=0 AND (type='Befriender' OR type='Volunteer')";
        $viewUserRequests = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $viewUserRequestsCount = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);

//        Upcoming events data
        $upcomingEvents = new volEvents();
        $sqlStatement2 = "SELECT v.name, v.location, v.startDate, v.startTime FROM volunteer_event v WHERE v.startDate > CURRENT_DATE ORDER BY v.startDate ASC ";
        $events = $upcomingEvents->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);

        $params = [
            'viewUserRequests' => $viewUserRequests,
            'viewUserRequestsCount' => $viewUserRequestsCount,
            'events' => $events,
            'meetingDetails' => $meetingDetails,
            'meetingCount' => $meetingCount
        ];

        $this->setLayout('modNav');
        return $this->render('Moderator/ModDashboard', 'Moderator Dashboard',$params);

    }

    public function ModUsers(Request $request)
    {
        $userView = new staff();
        if ($request->isPost()) {
//            $userView = new staff();
            $data = $request->getBody();
            $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                staff.cv,
                                staff.type AS 'role',
                                staff.state,
                                u.email,
                                u.gender,
                                u.username,
                                u.id
                                FROM staff
                                JOIN user u on staff.id = u.id WHERE staff.state='1' AND concat(fname,' ',lname) LIKE '%$data[search]%'  OR staff.type LIKE '%$data[search]%'
                                OR u.email LIKE '%$data[search]%'";
//        $sqlStatement = "SELECT * FROM staff WHERE state='0' AND (type='Befriender' OR type='Volunteer')";
            $viewUser = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }else {
            $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                staff.cv,
                                staff.type AS 'role',
                                staff.state,
                                u.email,
                                u.gender,
                                u.username,
                                u.id
                                FROM staff
                                JOIN user u on staff.id = u.id WHERE staff.state='1'";
//        $sqlStatement = "SELECT * FROM staff WHERE state='0' AND (type='Befriender' OR type='Volunteer')";
            $viewUser = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }
        $params = [
            'viewUser' => $viewUser
        ];

        $this->setLayout('modNav');
        return $this->render('Moderator/ModUsers', 'Users',$params);

    }



    public function ModSchedule()
    {

        $this->setLayout('modNav');
        return $this->render('Moderator/Schedule', 'Schedule');

    }

    public function ModFixSchedule()
    {
        $this->setLayout('modNav');
        return $this->render('Moderator/FixSchedule', 'Fix Schedule');

    }

    //  Verify Registration -------------------------------------------------------------------------------------------------------------------------------

    public function ModUserRequests(Request $request)
    {
        $userRequest = new staff();
        $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                staff.cv,
                                staff.type AS 'role',
                                staff.state,
                                u.email,
                                u.gender,
                                u.username,
                                u.id
                                FROM staff
                                JOIN user u on staff.id = u.id WHERE
                                staff.state='0' AND (staff.type='Befriender' OR staff.type='Volunteer')";
//        $sqlStatement = "SELECT * FROM staff WHERE state='0' AND (type='Befriender' OR type='Volunteer')";
        $viewUserRequests = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

        $params = [
            'viewUserRequests' => $viewUserRequests
        ];

        $this->setLayout('modNav');
        return $this->render('Moderator/UserRequests', 'User Requests',$params);

    }

    public function ModUserRequestsUpdate(Request $request)
    {
        //        update request state
        if ($request->isPost()) {
            $updateUserReq = new Staff();
            $data = $request->getBody();
            $updateReq = $updateUserReq->update("staff", ["state" => '1'], [ 'id' => $data['id'] ]);
            $data = $updateUserReq->select('user', [ 'email','username' ], [ 'id' => $data['id'] ], DatabaseService::FETCH_ALL);
            $updateUserReq->sendApprovedMail($data[0]['username'], $data[0]['email']);
        }

        if($updateReq)
        {
            header("location:/mod/UserRequests"); // redirects to user requests page
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Updating Record")';
            echo '</script>';
        }

    }

    public function ModUserRequestsDelete(Request $request)
    {
        if ($request->isGet()) {
            $deleteReq = new staff();
            $data = $request->getBody();
            $del = $deleteReq->delete('staff',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/mod/UserRequests"); // redirects to all records page
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }

    public function cvDownload(Request $request)
    {
        $filename = $request->getBody()['filename'];
//        $filename = 'http://localhost/core/uploads/'.$filename;
        echo $filename;
        //Check the file exists or not
        if(file_exists("../core/uploads/".$filename)) {

            //Define header information
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: 0");
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            header('Content-Length: ' . filesize($filename));
            header('Pragma: public');

            //Clear system output buffer
            flush();

            //Read the size of the file
            readfile("../core/uploads/".$filename);

            //Terminate from the script
            //die();
            Application::$app->response->setRedirectUrl('/admin/SearchUsers');
        }
        else{
            echo "File does not exist.";
        }
    }
}