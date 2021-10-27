<?php

namespace controllers\Admin;

use core\Application;
use core\Controller;
use core\DatabaseService;
use core\Request;
use core\Model;
use models\supportgroup\sg_request;
use models\users\staff;
use models\supportgroup\supportGroup;


class AdminController extends Controller
{

    public function test()
    {

        return $this->render('Moderator/test', 'Admin Dashboard');

    }

    public function home()
    {

        return $this->render('Moderator/Admin/Dashboard', 'Admin Dashboard');

    }

    public function Volunteer()
    {

        return $this->render('Moderator/Volunteer', 'Volunteer Events');

    }

    public function Schedule()
    {

        return $this->render('Moderator/Schedule', 'Schedule');

    }

    public function FixSchedule()
    {

        return $this->render('Moderator/FixSchedule', 'Fix Schedule');

    }

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
        $sqlStatement2 = "SELECT *
                        FROM sg_request
                        JOIN staff 
                        ON staff.id = sg_request.befrienderId";
        $viewSGRequest = $sgRequest->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);

        $params = [
            'viewSG' => $viewSG,
            'viewSGRequest' => $viewSGRequest
        ];


        return $this->render('Moderator/SupportGroup', 'Support Group', $params);
    }

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

//        update sg
        $sgview = new SupportGroup();
        $data = $request->getBody();
        $viewUpdateSG = $sgview->select('supportgroup','*',[ 'id' => $data['SupportGroupId'] ], DatabaseService::FETCH_ALL);


        $params = [
            'viewBefriender' => $viewBefriender,
            'viewUpdateSG' =>  $viewUpdateSG,
        ];

        return $this->render('Moderator/SGUpdate', 'Update Support Group',$params);
    }

    public function createSG(Request $request){

        //        Create support group
        if ($request->isPost()) {
            $VolunteerCreateEvent = new SupportGroup();
            $VolunteerCreateEvent->overrideTableName('supportgroup');
            $data = $request->getBody();
            $VolunteerCreateEvent->save($data);
        }
//        Create support group form facilitator select
        $befrienderView = new staff();
        $viewBefriender = $befrienderView->select('staff','*',["type" => "befriender" , "state" => "1"],DatabaseService::FETCH_ALL);

        $params = [
            'viewBefriender' => $viewBefriender
        ];

        return $this->render('Moderator/SGCreate', 'Create Support Group',$params);
    }



    public function GenReport()
    {

        return $this->render('Moderator/Admin/Report', 'Generate Reports');

    }

    public function SessionReport()
    {

        return $this->render('Moderator/SessionReport', 'Session Reports');

    }

    public function SearchUsers(Request $request)
    {

        if ($request->isPost()) {
            $staffAccount = new staff();
            $staffAccount->overrideTableName('staff');
            $data = $request->getBody();
            $staffAccount->save($data);
        }

        $userView = new staff();
        $viewUser = $userView->findAll();

        $params = [
            'viewUser' => $viewUser
        ];

        return $this->render('Moderator/Admin/Users', 'Search Users',$params);

    }

    public function UserRequests(Request $request)
    {
        $userRequest = new staff();
        $sqlStatement = "SELECT * FROM staff WHERE state='0' AND (type='befriender' OR type='volunteer')";
        $viewUserRequests = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

        $params = [
            'viewUserRequests' => $viewUserRequests
        ];

//        update request state
        if ($request->isPost()) {
            $updateUserReq = new staff();
            $data = $request->getBody();
            $updateUserReq->update("staff",
                ["state" => '1'],
                [ 'id' => $data['id'] ]);
        }

        return $this->render('Moderator/UserRequests', 'User Requests',$params);

    }

    public function UserRequestsDelete(Request $request)
    {
        $userRequest = new staff();
        $sqlStatement = "SELECT * FROM staff WHERE state='0' AND (type='befriender' OR type='volunteer')";
        $viewUserRequests = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

        $params = [
            'viewUserRequests' => $viewUserRequests
        ];

//        Delete request state

        if ($request->isGet()) {
            $deleteReq = new staff();
            $data = $request->getBody();
            $deleteReq->delete('staff',[ 'id' => $data['id'] ]);
        }

        return $this->render('Moderator/UserRequests', 'User Requests',$params);

    }

//    Moderator

    public function Modhome()
    {

        return $this->render('Moderator/ModDashboard', 'Moderator Dashboard');

    }

    public function ModUsers()
    {

        return $this->render('Moderator/ModUsers', 'Users');

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