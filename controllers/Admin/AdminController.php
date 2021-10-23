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
//        Create support group
        if ($request->isPost()) {
            $VolunteerCreateEvent = new SupportGroup();
            $VolunteerCreateEvent->overrideTableName('supportgroup');
            $data = $request->getBody();
            $VolunteerCreateEvent->save($data);
        }


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

//        Create support group form facilitator select
        $befrienderView = new staff();
        $viewBefriender = $befrienderView->select('staff','*',["type" => "befriender" , "state" => "1"],DatabaseService::FETCH_ALL);

//        Support group requests
        $sgRequest = new sg_request();
//        $viewSGRequest = $sgRequest->findAll();
        $sqlStatement1 = "SELECT *
                        FROM sg_request
                        JOIN staff 
                        ON staff.id = sg_request.befrienderId";
        $viewSGRequest = $sgRequest->customSqlQuery($sqlStatement1,DatabaseService::FETCH_ALL);

        $params = [
            'viewSG' => $viewSG,
            'viewBefriender' => $viewBefriender,
            'viewSGRequest' => $viewSGRequest,
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

//    public function getSupportGroupRequests(Request $request){
//        $requestData = $request->getBody();
//        $supportGroup = new sg_request();
//        Application::$app->response->setContentTypeJson();
//        return json_encode($supportGroup->getSupportGroupRequests($requestData["supportGroupId"]),JSON_NUMERIC_CHECK);
//    }
//
//    public function supportGroupRequestSecision(Request $request){
//        $requestData = $request->getJsonBody();
//        $supportGroup = new sg_request();
//        Application::$app->response->setContentTypeJson();
//        return json_encode($supportGroup->supportGroupRequestDecision($requestData),JSON_NUMERIC_CHECK);
//    }
//    public function getBefrienderDetails(){
//        $BefrienderView = new staff();
//        $viewBefriender = $BefrienderView->findAll();
//        $params = [
//
//        ];
//        return $this->render('Moderator/SupportGroup', 'Support Group', $params);
//    }


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

        return $this->render('Moderator/Admin/Users', 'Search Users');

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
}