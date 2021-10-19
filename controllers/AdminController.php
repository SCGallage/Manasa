<?php

namespace controllers;

use core\Controller;
use core\DatabaseService;
use core\Request;
use core\Model;
use models\sg_request;
use models\staff;
use models\SupportGroup;
use models\VolunteerEvent;

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
        $viewSG = $SGView->findAll();

//        Create support group facilitator select
        $befrienderView = new staff();
        $viewBefriender = $befrienderView->select('staff','*',["type" => "befriender" , "state" => "1"],DatabaseService::FETCH_ALL);

//        Support group requests
        $sgRequest = new sg_request();
        $viewSGRequest = $sgRequest->findAll();

        $params = [
            'viewSG' => $viewSG,
            'viewBefriender' => $viewBefriender,
            'viewSGRequest' => $viewSGRequest,
        ];


        return $this->render('Moderator/SupportGroup', 'Support Group', $params);
    }
//
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

    public function SearchUsers()
    {

        return $this->render('Moderator/Admin/Users', 'Search Users');

    }

    public function UserRequests()
    {
        $userRequest = new staff();
        $viewUserRequests = $userRequest->select('staff','*',["type" => "befriender" , "state" => "0"] ,DatabaseService::FETCH_ALL);

        $params = [
            'viewUserRequests' => $viewUserRequests
        ];

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