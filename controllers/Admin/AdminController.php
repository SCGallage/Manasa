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
use models\users\User;


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

        return $this->render('Moderator/Admin/Volunteer', 'Volunteer Events');

    }

    public function Schedule()
    {

        return $this->render('Moderator/Admin/Schedule', 'Schedule');

    }

    public function FixSchedule()
    {

        return $this->render('Moderator/Admin/FixSchedule', 'Fix Schedule');

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



        $params = [
            'viewSG' => $viewSG,
            'viewSGRequest' => $viewSGRequest
        ];


        return $this->render('Moderator/SupportGroup', 'Support Group', $params);
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
        $sqlStatement = "SELECT staff1.fname AS facilitatorfname, 
                        staff1.lname AS facilitatorlname,
                        staff2.fname AS co_facilitatorfname, 
                        staff2.lname AS co_facilitatorlname,
                        staff2.id AS co_facilitatorID,
                        supportgroup.*
                        FROM supportgroup
                        JOIN staff AS staff1
                        ON staff1.id = supportgroup.facilitator  
                        JOIN staff AS staff2 ON staff2.id = supportgroup.co_facilitator";
        $viewSG = $SGView->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

//        update sg
        $sgview = new SupportGroup();
        $data = $request->getBody();
        $viewUpdateSG = $sgview->select('supportgroup','*',[ 'id' => $data['SupportGroupId'] ], DatabaseService::FETCH_ALL);


        $params = [
            'viewBefriender' => $viewBefriender,
            'viewUpdateSG' =>  $viewUpdateSG,
            'viewSG' => $viewSG
        ];

        return $this->render('Moderator/SGUpdate', 'Update Support Group',$params);
    }

//  Support Group CREATE -------------------------------------------------------------------------------------------------------------------------------

    public function createSG(Request $request){

//        Create support group form facilitator select
        $befrienderView = new staff();
        $viewBefriender = $befrienderView->select('staff','*',["type" => "befriender" , "state" => "1"],DatabaseService::FETCH_ALL);

        $params = [
            'viewBefriender' => $viewBefriender
        ];

        return $this->render('Moderator/SGCreate', 'Create Support Group',$params);
    }

    public function createdSG(Request $request)
    {

        //        Create support group
        if ($request->isPost()) {
            $VolunteerCreateEvent = new SupportGroup();
            $VolunteerCreateEvent->overrideTableName('supportgroup');
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
            header("location:/admin/createSG");
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
        return $this->render('Moderator/SGRequest', 'Support Group Requests',$params);

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
    public function GenReport()
    {

        return $this->render('Moderator/Admin/Report', 'Generate Reports');

    }

    public function SessionReport()
    {

        return $this->render('Moderator/SessionReport', 'Session Reports');

    }

//  Admin Users  -------------------------------------------------------------------------------------------------------------------------------

    public function SearchUsers(Request $request)
    {
        $userView = new staff();
//        $viewUser = $userView->select('staff','*',[ 'state' => 1 ], DatabaseService::FETCH_ALL);
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
        $viewUser = $userView->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

        $params = [
            'viewUser' => $viewUser
        ];

        return $this->render('Moderator/Admin/Users', 'Search Users',$params);

    }

//    create user

    public function createUser(Request $request){

        if ($request->isPost()) {
            $userAccount = new User();
            $staffAccount = new Staff();
            $staffAccount->overrideTableName('staff');
            $data = $request->getBody();
            $data['type'] = 'staff';

//            Validate Username and email
            $viewSGRequest = $staffAccount->select('user','*', ["username" => $data["username"]],DatabaseService::FETCH_COUNT);
            $viewRequest = $staffAccount->select('user','*', ["email" => $data["email"]],DatabaseService::FETCH_COUNT);

            if ($viewSGRequest > 0) {
                echo '<script>';
                echo 'alert("User name already exists")';
                echo '</script>';
            }
            elseif ($viewRequest > 0){
                echo '<script>';
                echo 'alert("Email already exists")';
                echo '</script>';
            }
            else{
//                $staffAccount->save($data);
                $data['lastId'] =  $userAccount ->save($data);
                $staffAccount ->saveAdmin($data);
            }
        }

        return $this->render('Moderator/Admin/AddStaff','Add Staff');
    }

//    Delete User
    public function deleteUser(Request $request)
    {
        if ($request->isGet()) {
            $deleteReq = new staff();
            $data = $request->getBody();
            $del = $deleteReq->delete('staff',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/SearchUsers");
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }
//  Verify Registration -------------------------------------------------------------------------------------------------------------------------------

    public function UserRequests(Request $request)
    {
        $userRequest = new staff();
//        $sqlStatement2 = "SELECT sg_request.*,
//                            staff.fname,
//                            staff.lname
//                        FROM sg_request
//                        JOIN staff
//                        ON staff.id = sg_request.befrienderId";
//        $viewSGRequest = $sgRequest->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);

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

        return $this->render('Moderator/Admin/UserRequests', 'User Requests',$params);

    }

    public function UserRequestsUpdate(Request $request)
    {
        //        update request state
        if ($request->isPost()) {
            $updateUserReq = new staff();
            $data = $request->getBody();
            $updateReq = $updateUserReq->update("staff", ["state" => '1'], [ 'id' => $data['id'] ]);
        }

        if($updateReq)
        {
            header("location:/admin/UserRequests"); // redirects to user requests page
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
            $deleteReq = new staff();
            $data = $request->getBody();
            $del = $deleteReq->delete('staff',[ 'id' => $data['id'] ]);
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
//---------------------------------------------------------------------------------------------------------------
//    Moderator

    public function Modhome()
    {
        $userRequest = new staff();
        $sqlStatement = "SELECT * FROM staff WHERE state='0' AND (type='befriender' OR type='volunteer')";
        $viewUserRequests = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $viewUserRequestsCount = $userRequest->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);
        $params = [
            'viewUserRequests' => $viewUserRequests,
            'viewUserRequestsCount' => $viewUserRequestsCount
        ];

        $this->setLayout('modNav');
        return $this->render('Moderator/ModDashboard', 'Moderator Dashboard',$params);

    }

    public function ModUsers()
    {
        $userView = new staff();
//        $viewUser = $userView->select('staff','*',[ 'state' => 1 ], DatabaseService::FETCH_ALL);
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
        $viewUser = $userView->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

        $params = [
            'viewUser' => $viewUser
        ];

        $this->setLayout('modNav');
        return $this->render('Moderator/ModUsers', 'Users',$params);

    }


    public function ModVolunteer()
    {

        $this->setLayout('modNav');
        return $this->render('Moderator/Volunteer', 'Volunteer Events');

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
            $updateUserReq = new staff();
            $data = $request->getBody();
            $updateReq = $updateUserReq->update("staff", ["state" => '1'], [ 'id' => $data['id'] ]);
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