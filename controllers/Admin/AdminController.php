<?php

namespace controllers\Admin;

use core\Application;
use core\Controller;
use core\DatabaseService;
use core\Request;
use core\Model;
use core\sessions\SessionManagement;
use core\Settings;
use models\donate;
use models\meeting;
use models\session_report;
use models\supportgroup\sg_request;
use models\users\staff;
use models\supportgroup\supportGroup;
use models\users\User;


class AdminController extends Controller
{

    public function test()
    {

        return $this->render('Moderator/test', 'Admin Dashboard');

    }

    public function home()
    {
        $meeting = new meeting();
        $userInfo = new User();
        $sessionReport = new session_report();
        $donationData = new donate();

        $sqlStatement = "SELECT meeting.id,meeting.meeting_type,t.startTime,t.endTime, s.date, s2.fname, s2.lname
                            FROM meeting
                            JOIN timeslot t on meeting.timeslotId = t.timeslotId
                            JOIN shift s on s.shiftId = t.shiftId
                            left join staff s2 on s2.id = meeting.befrienderId
                            WHERE s.date = CURRENT_DATE";
        $meetingDetails = $meeting->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $meetingCount = $meeting->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);

        $sqlStatement1 = "SELECT  COUNT(*) AS Count
                            FROM user
                            WHERE MONTH(user.registration_date)=MONTH(now())
                            AND YEAR(user.registration_date)=YEAR(now())
                            AND user.type='caller'";

        $newCallers = $userInfo->customSqlQuery($sqlStatement1,DatabaseService::FETCH_ALL);

        $sqlStatement2 = "SELECT *
                            FROM session_report
                            WHERE MONTH(session_report.date )=MONTH(now()) AND YEAR(session_report.date )=YEAR(now())";

        $sessionReportCount = $sessionReport->customSqlQuery($sqlStatement2,DatabaseService::FETCH_COUNT);

        $sqlStatement4 = "SELECT SUM(amount) AS Total FROM donate WHERE MONTH(date )=MONTH(now()) AND YEAR(date )=YEAR(now())";
        $donations = $donationData->customSqlQuery($sqlStatement4,DatabaseService::FETCH_ALL);

//        Overview Graph Data
        $overviewData = new session_report();
        $sqlStatement3 = "SELECT p.name AS type, COUNT(p.name) AS amount  
                          FROM session_report s JOIN problems p ON s.problemType = p.id 
                          WHERE MONTH(s.date) = MONTH(now()) AND YEAR(s.date) = YEAR(now())GROUP BY p.name";
        $graphData = $overviewData->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);
//Donation graph Data
        $sqlStatement5 = "SELECT MONTHNAME(date) AS Month , SUM(amount) AS Total FROM donate WHERE YEAR(date)=YEAR(now()) GROUP BY MONTH(date)";
        $donationGraphData = $donationData->customSqlQuery($sqlStatement5,DatabaseService::FETCH_ALL);

        $params = [
            'meetingDetails' => $meetingDetails,
            'meetingCount' => $meetingCount,
            'newCallers' => $newCallers,
            'sessionReportCount' => $sessionReportCount,
            'donations' => $donations,
            'graphData' => $graphData,
            'donationGraphData' => $donationGraphData
        ];

        return $this->render('Admin/Dashboard', 'Admin Dashboard',$params);

    }
//  Limits table----------------------------------------------------------------------------------------------

    public function limits(Request $request){

        if ($request->isPost()){
            $limits = new Settings();
            $data = $request->getBody();
            $limit = $limits->addSettingToDatabase("$data[name]", "$data[val]");
        }

        $limits = new User();
        $limit =$limits->select("settings", "*", null, DatabaseService::FETCH_ALL);

        $params = [
           'limit' => $limit
        ];

        return $this->render('Admin/limitations', 'Update configurations',$params);
    }
//  Support Group  -------------------------------------------------------------------------------------------------------------------------------
    public function supportGroup(Request $request)
    {
//        Support group table details
        $SGView = new SupportGroup();
        $sqlStatement = "SELECT staff1.fname AS facilitatorfname, 
                        staff1.lname AS facilitatorlname,
                        staff2.fname AS co_facilitatorfname, 
                        staff2.lname AS co_facilitatorlname,
                        supportgroup.*
                        FROM supportgroup
                        JOIN staff AS staff1
                        ON staff1.id = supportgroup.facilitator  
                        JOIN staff AS staff2 ON staff2.id = supportgroup.co_facilitator";
        $viewSG = $SGView->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

//        Support group requests
        $sgRequest = new sg_request();
//        $viewSGRequest = $sgRequest->findAll();
        $sqlStatement2 = "SELECT sg_request.*,
                            staff.fname, 
                            staff.lname
                        FROM sg_request
                        JOIN staff
                        ON staff.id = sg_request.befrienderId";
        $viewSGRequest = $sgRequest->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);

//Support Group Graph data
        $sgGraphData = new SupportGroup();
        $sqlStatement3 = "SELECT type , COUNT(type) AS amount FROM supportgroup GROUP BY type";
        $graphData = $sgGraphData ->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);

        $params = [
            'viewSG' => $viewSG,
            'viewSGRequest' => $viewSGRequest,
            'graphData' => $graphData
        ];


        return $this->render('Admin/SupportGroup', 'Support Group', $params);
    }

//  Support Group UPDATE  -------------------------------------------------------------------------------------------------------------------------------

    public function updateSG(Request $request)
    {
//                update  support group
        if ($request->isPost()) {
            $updateSGView = new SupportGroup();
            $data = $request->getBody();
            $updateSGView->update("supportgroup",
                ["name" => $data["name"],
                "participants" => $data["participants"],
                "state" => $data["state"],
                "type" => $data["type"],
                "facilitator" => $data["facilitator"],
                "co_facilitator" => $data["co_facilitator"]],
                [ 'id' => $data['SupportGroupId'] ]);
        }
//        Create support group facilitator select
        $befrienderView = new staff();
        $viewBefriender = $befrienderView->select('staff','*',["type" => "befriender" , "state" => "1"],DatabaseService::FETCH_ALL);

        $SGView = new SupportGroup();
        $data = $request->getBody();
        $sqlStatement = "SELECT staff1.fname AS facilitatorfname, 
                        staff1.lname AS facilitatorlname,
                        staff2.fname AS co_facilitatorfname, 
                        staff2.lname AS co_facilitatorlname,
                        staff2.id AS co_facilitatorID,
                        supportgroup.*
                        FROM supportgroup
                        JOIN staff AS staff1
                        ON staff1.id = supportgroup.facilitator  
                        JOIN staff AS staff2 ON staff2.id = supportgroup.co_facilitator
                        WHERE supportgroup.id = '$data[SupportGroupId]'";
        $viewUpdateSG = $SGView->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);


        $params = [
            'viewBefriender' => $viewBefriender,
            'viewUpdateSG' =>  $viewUpdateSG,
        ];

        return $this->render('Admin/SGUpdate', 'Update Support Group',$params);
    }

//  Support Group CREATE -------------------------------------------------------------------------------------------------------------------------------

    public function createSG(Request $request){

//        Create support group form facilitator select
        $befrienderView = new staff();
        $viewBefriender = $befrienderView->select('staff','*',["type" => "befriender" , "state" => "1"],DatabaseService::FETCH_ALL);

        $data = $request->getBody();


        $params = [
            'viewBefriender' => $viewBefriender,
            'data' => $data
        ];

        return $this->render('Admin/SGCreate', 'Create Support Group',$params);
    }

    public function createdSG(Request $request)
    {

        //        Create support group
        if ($request->isPost()) {
            $VolunteerCreateEvent = new SupportGroup();
            $data = $request->getBody();

            //            Validate Support group name
            $viewSG = $VolunteerCreateEvent->select('supportgroup','*', ["name" => $data["name"]],DatabaseService::FETCH_COUNT);

            if ($viewSG > 0) {
                echo '<script>';
                echo 'alert("Support Group name already exists")';
                echo '</script>';
            }
            else{
                $req = $VolunteerCreateEvent->save($data);
            }

        }

        if ($req) {
            header("location:/admin/SupportGroup");
        } else {
            echo '<script>';
            echo 'alert("Error Creating Record")';
            echo '</script>';
        }
    }

//    Support Group Delete -----------------------------------------------------------------------------

    public function deleteSG(Request $request)
    {
        if ($request->isGet()) {
            $deleteReq = new SupportGroup();
            $data = $request->getBody();
            $del = $deleteReq->delete('SupportGroup',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/SupportGroup");
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }
//    Support group request -----------------------------------------------------------------------------

    public function SupportGroupRequestsUpdate(Request $request)
    {

        if ($request->isGet()) {
            $deleteSGReq = new sg_request();
            $data = $request->getBody();
            $del = $deleteSGReq->delete('sg_request',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/createSG?capacity=$data[capacity]&type=$data[type]&name=$data[name]");
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }

    public function SupportGroupRequestsDelete(Request $request)
    {
        if ($request->isGet()) {
            $deleteReq = new sg_request();
            $data = $request->getBody();
            $del = $deleteReq->delete('sg_request',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/SupportGroup");
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }

//    SG request Page ------------------------------------------------------------------------------
    public function SGRequests(Request $request)
    {
        $sgRequest = new sg_request();
        $sqlStatement2 = "SELECT sg_request.*,
                            staff.fname, 
                            staff.lname
                        FROM sg_request
                        JOIN staff
                        ON staff.id = sg_request.befrienderId";
        $viewSGRequest = $sgRequest->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);


        $params = [
            'viewSGRequest' => $viewSGRequest
        ];
        return $this->render('Admin/SGRequest', 'Support Group Requests',$params);

    }

    public function SupportGroupRequestsPageDelete(Request $request)
    {
        if ($request->isGet()) {
            $deleteReq = new sg_request();
            $data = $request->getBody();
            $del = $deleteReq->delete('sg_request',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/SGRequests");
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }
//    ---------------------------------------------------------------------------------------------------------


    public function SessionReport(Request $request)
    {
        if ($request->isPost()) {
            $sessionReport = new session_report();
            $data = $request->getBody();

            $sqlStatement = "SELECT session_report.*,s.fname AS befrienderFname,s.lname AS befrienderlname,p.name AS problemType,m.meeting_type AS sessionType
                                FROM session_report
                                JOIN staff s on session_report.befrienderId = s.id
                                JOIN problems p on p.id = session_report.problemType
                                LEFT JOIN meeting m on m.id = session_report.meetingId
                            WHERE CONCAT( s.fname,  ' ', s.lname ) LIKE '%$data[search]%'
                            OR session_report.date LIKE CAST('$data[search]' AS DATE )
                            ORDER BY session_report.date DESC";

            $sessionReports = $sessionReport->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }else {
            $sessionReport = new session_report();

            $sqlStatement = "SELECT session_report.id,session_report.date,s.fname AS befrienderFname,
                                    s.lname AS befrienderlname,p.name AS problemType,m.meeting_type AS sessionType,
                                    s2.date AS meetingDate
                                    FROM session_report
                                    JOIN staff s on session_report.befrienderId = s.id
                                    JOIN problems p on p.id = session_report.problemType
                                    LEFT JOIN meeting m on m.id = session_report.meetingId
                                    LEFT JOIN timeslot t on t.timeslotId = m.timeslotId
                                    LEFT JOIN shift s2 on s2.shiftId = t.shiftId
                                    ORDER BY session_report.date DESC;";

            $sessionReports = $sessionReport->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }
        $params = [
            'sessionReports' => $sessionReports
        ];

        return $this->render('Admin/SessionReport', 'Session Reports',$params);

    }

    public function SessionReportView(Request $request)
    {
        $sessionReport = new session_report();
        $data = $request->getBody();

        $sqlStatement = "SELECT session_report.*,s.fname AS befrienderFname,s.lname AS befrienderlname,p.name AS problemType,m.meeting_type AS sessionType
                                FROM session_report
                                JOIN staff s on session_report.befrienderId = s.id
                                JOIN problems p on p.id = session_report.problemType
                                LEFT JOIN meeting m on m.id = session_report.meetingId
                                WHERE session_report.id = $data[id]";

        $sessionReportDetails = $sessionReport->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

        $params = [
            'sessionReportDetails' => $sessionReportDetails
        ];
        return $this->render('Admin/SessionReportView', 'Session Reports',$params);

    }

//  Admin Users  -------------------------------------------------------------------------------------------------------------------------------

    public function SearchUsers(Request $request)
    {
        if ($request->isPost()) {
            $userView = new staff();
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
                                JOIN user u on staff.id = u.id WHERE staff.state='1' AND  staff.type LIKE '%$data[search]%' OR CONCAT( fname,  ' ', lname ) LIKE '%$data[search]%'";
            $viewUser = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }else{
            $userView = new staff();
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
            $viewUser = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }
            $params = [
                'viewUser' => $viewUser
            ];
            return $this->render('Admin/Users', 'Search Users', $params);

    }

    public function InactiveUsers(Request $request)
    {
            $userView = new staff();
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
                                JOIN user u on staff.id = u.id  WHERE staff.state='2'";
            $viewUser = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

            $params = [
                'viewUser' => $viewUser
            ];
            return $this->render('Admin/UsersInactive', 'Search Users', $params);

    }

    public function createUser(Request $request){

        if ($request->isPost()) {
            $userAccount = new User();
            $staffAccount = new Staff();
            $data = $request->getBody();
            $data['type'] = 'staff';

//            Validate Username and email
            $Username = $staffAccount->select('user','*', ["username" => $data["username"]],DatabaseService::FETCH_COUNT);
            $Email = $staffAccount->select('user','*', ["email" => $data["email"]],DatabaseService::FETCH_COUNT);

            if ($Username > 0) {
                echo '<script>';
                echo 'alert("User name already exists")';
                echo '</script>';
            }
            elseif ($Email > 0){
                echo '<script>';
                echo 'alert("Email already exists")';
                echo '</script>';
            }
            else{
//                $staffAccount->save($data);
                $data['lastId'] =  $userAccount->register($data);
                $staffAccount ->saveAdmin($data);
            }
        }

        return $this->render('Admin/UserCreate','Add User');
    }

    public function updateUser(Request $request){

        if ($request->isPost()) {
            $userAccount = new User();
            $staffAccount = new Staff();
            $data = $request->getBody();

//            Validate Username and email
            $viewSGRequest = $userAccount->select('user','*', ["username" => $data["username"]],DatabaseService::FETCH_COUNT);
            $viewRequest = $userAccount->select('user','*', ["email" => $data["email"]],DatabaseService::FETCH_COUNT);

            if ($viewSGRequest > 1) {
                echo '<script>';
                echo 'alert("User name already exists")';
                echo '</script>';
            }
            elseif ($viewRequest > 1){
                echo '<script>';
                echo 'alert("Email already exists")';
                echo '</script>';
            }
            else{
                $userAccount->update("user", ["gender" => $data["gender"], "username" => $data["username"], "email" => $data["email"]], [ 'id' => $data['StaffId'] ]);
                $staffAccount ->update("staff", ["fname" => $data['fname'], "lname" => $data['lname'], "type" => $data["type"], "state" => $data["state"]], [ 'id' => $data['StaffId'] ]);
                header("location:/admin/SearchUsers");
            }
        }

        //        update user view
        $staffAccount = new staff();
        $userAccount = new User();
        $data = $request->getBody();
        $viewUpdateStaff = $staffAccount->select('staff','*',['id' => $data['StaffId']],DatabaseService::FETCH_ALL);
        $viewUpdateUser = $userAccount->select('user','*',['id' => $data['StaffId']],DatabaseService::FETCH_ALL);


        $params = [
            'viewUpdateUser' => $viewUpdateUser,
            'viewUpdateStaff' => $viewUpdateStaff
        ];

        return $this->render('Admin/UserUpdate','update Staff',$params);
    }

    public function deleteUser(Request $request)
    {
        //        update request state
        if ($request->isPost()) {
            $updateUserReq = new Staff();
            $data = $request->getBody();
            $updateReq = $updateUserReq->update("staff", ["state" => '2'], [ 'id' => $data['id'] ]);
        }

        if($updateReq)
        {
            header("location:/admin/SearchUsers"); // redirects to user page
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Updating Record")';
            echo '</script>';
        }

//        if ($request->isGet()) {
//            $deleteReqStaff = new staff();
//            $deleteReqUser = new User();
//            $data = $request->getBody();
//            $del = $deleteReqStaff->delete('staff',[ 'id' => $data['id'] ]);
//            $delUser = $deleteReqUser->delete('user',[ 'id' => $data['id'] ]);
//        }

//        if($del)
//        {
//            header("location:/admin/SearchUsers");
//        }
//        else
//        {
//            echo '<script>';
//            echo 'alert("Error Deleting Record")';
//            echo '</script>';
//        }

    }

//  Verify Registration -------------------------------------------------------------------------------------------------------------------------------

    public function UserRequests(Request $request)
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
        $viewUserRequests = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $params = [
            'viewUserRequests' => $viewUserRequests
        ];

        return $this->render('Admin/UserRequests', 'User Requests',$params);

    }

    public function userWorkPhoneAllocrion(Request $request){
        if ($request->isPost()) {
            $UserReq = new Staff();
            $data = $request->getBody();
            $UserReq->insert("staff_contacts", ["staff_id" => $data['id'], "contact_type" => "phone", "contact_number" => $data['contact_number']]);
            header("location:/admin/UserRequests"); // redirects to all records page
        }else{

            $data = $request->getBody();
            $params = [
                'data' => $data
            ];
        return $this->render('Admin/UserPhoneRegister', 'User verification',$params);
        }
    }
    public function UserRequestsUpdate(Request $request)
    {
        //        update request state
        if ($request->isPost()) {
            $updateUserReq = new Staff();
            $data = $request->getBody();

            $updateReq = $updateUserReq->update("staff", ["state" => '1'], [ 'id' => $data['id'] ]);
            $details = $updateUserReq->select('user', [ 'email','username' ], [ 'id' => $data['id'] ], DatabaseService::FETCH_ALL);
            $updateUserReq->sendApprovedMail($details[0]['username'], $details[0]['email']);
        }

        if($updateReq)
        {
            header("location:/admin/updateUserWorkPhone?id=$data[id]"); // redirects to user requests page
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Updating Record")';
            echo '</script>';
        }

    }

    public function UserRequestsDelete(Request $request)
    {
        if ($request->isGet()) {
//            $deleteReq = new staff();
//            $data = $request->getBody();
//            $del = $deleteReq->delete('staff',[ 'id' => $data['id'] ]);
            $deleteReqStaff = new staff();
            $deleteReqUser = new User();
            $data = $request->getBody();
            $del = $deleteReqStaff->delete('staff',[ 'id' => $data['id'] ]);
            $delUser = $deleteReqUser->delete('user',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/UserRequests"); // redirects to all records page
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }

}