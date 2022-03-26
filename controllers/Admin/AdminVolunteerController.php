<?php

namespace controllers\Admin;

use core\Controller;
use core\DatabaseService;
use core\Request;
use core\sessions\SessionManagement;
use models\users\Staff;
use models\users\User;
use models\volEvents;
use models\volunteerparticipants;

class AdminVolunteerController extends Controller{

    public function Volunteer(Request $request){

        $volEvent = new volEvents();
        $volEvent->overrideTableName('volunteer_event');
        $sqlStatement = "SELECT volunteer_event.startDate,
                           volunteer_event.id,
                           volunteer_event.capacity,
                           volunteer_event.description,
                           volunteer_event.location,
                           volunteer_event.name,
                           volunteer_event.type,
                           volunteer_event.startTime,
                           volunteer_event.endTime,
                           s.fname,s.lname FROM volunteer_event
                           JOIN user u on volunteer_event.moderator = u.id
                           JOIN staff s on u.id = s.id
                           WHERE volunteer_event.startDate >= DATE (NOW()) ORDER BY volunteer_event.startDate ASC";

        $eventDetails = $volEvent->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

        $params = [
            'eventDetails' => $eventDetails
        ];

        return $this->render('Admin/Volunteer', 'Volunteer Events',$params);
    }

    public function viewVolEvent(Request $request){
        $volEvent = new volEvents();

        if ($request->isPost()){
            $data = $request->getBody();

            $sqlStatement = "SELECT volunteer_event.startDate,
                           volunteer_event.id,
                           volunteer_event.capacity,
                           volunteer_event.description,
                           volunteer_event.location,
                            volunteer_event.name,
                           volunteer_event.type,
                           volunteer_event.startTime,
                           volunteer_event.endTime,
                           s.fname,s.lname FROM volunteer_event
                           JOIN user u on volunteer_event.moderator = u.id
                           JOIN staff s on u.id = s.id
                            WHERE volunteer_event.name LIKE '%$data[search]%' OR volunteer_event.startDate LIKE '%$data[search]%'
                            OR  s.fname LIKE '%$data[search]%' OR s.lname LIKE '%$data[search]%'
                           ORDER BY volunteer_event.startDate ASC";
            $eventDetails = $volEvent->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        }else {
            $sqlStatement = "SELECT volunteer_event.startDate,
                           volunteer_event.id,
                           volunteer_event.capacity,
                           volunteer_event.description,
                           volunteer_event.location,                                            
                           volunteer_event.name,
                           volunteer_event.type,
                           volunteer_event.startTime,
                           volunteer_event.endTime,
                           s.fname,s.lname FROM volunteer_event
                           JOIN user u on volunteer_event.moderator = u.id
                           JOIN staff s on u.id = s.id
                           ORDER BY volunteer_event.startDate ASC";

            $eventDetails = $volEvent->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }
        $params = [
            'eventDetails' => $eventDetails
        ];

        return $this->render('Admin/VolunteerEventView', 'Volunteer Events',$params);
    }

    public function createVolEvent(Request $request){
        //        Create Volunteer event
        if ($request->isPost()) {
            $VolunteerCreateEvent = new volEvents();
            $VolunteerCreateEvent->overrideTableName('volunteer_event');
            $data = $request->getBody();

//            Validate event name
            $viewSG = $VolunteerCreateEvent->select('volunteer_event', '*', ["name" => $data["name"]], DatabaseService::FETCH_COUNT);

            if ($viewSG > 0) {
                echo '<script>';
                echo 'alert("Event name already exists")';
                echo '</script>';
            } else {
                $req = $VolunteerCreateEvent->save($data);
            }
            if ($req) {
                header("location:/admin/Volunteer");
            } else {
                echo '<script>';
                echo 'alert("Error Creating Record")';
                echo '</script>';
            }

        }
        //        select event facilitator
        $staffView = new staff();
        $viewModerator = $staffView->select('staff','*',["type" => "moderator" , "state" => "1"],DatabaseService::FETCH_ALL);

        $params = [
            'viewModerator' => $viewModerator
        ];

        return $this->render('Admin/VolunteerEventCreate', 'Volunteer Events',$params);

    }


    public function updateVolEvent(Request $request){
        if ($request->isPost()) {
            $volEvent = new volEvents();
            $data = $request->getBody();

//            Validate Vol event name
            $checkEvent = $volEvent->select('volunteer_event','*', ["name" => $data["name"]],DatabaseService::FETCH_COUNT);

            if ($checkEvent > 1) {
                echo '<script>';
                echo 'alert("Event name already exists")';
                echo '</script>';
            }
            else{
                $volEvent->update("volunteer_event",
                    ["name" => $data["name"],
                        "moderator" => $data["moderator"],
                        "startDate" => $data["startDate"],
                        "location" => $data["location"],
                        "type" => $data["type"],
                        "capacity" => $data["capacity"],
                        "description" => $data["description"],
                        "startTime" => $data["startTime"],
                        "endTime" => $data["endTime"]],
                    [ 'id' => $data['EventId'] ]);
                header("location:/admin/Volunteer");
            }

//            if ($req) {
//
//            } else {
//                echo '<script>';
//                echo 'alert("Error Updating Record")';
//                echo '</script>';
//            }
        }
        //moderators
        $moderatorView = new staff();
        $viewModerator = $moderatorView->select('staff','*',["type" => "moderator" , "state" => "1"],DatabaseService::FETCH_ALL);


        //        update user view
        $volEvent = new volEvents();
        $data = $request->getBody();
        $sqlStatement = "SELECT volunteer_event.*, s.fname AS staffFname, s.lname AS staffLname FROM volunteer_event
                            JOIN staff s on s.id = volunteer_event.moderator
                            WHERE volunteer_event.id = '$data[id]'";
        $viewUpdateEvent = $volEvent->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);

        $params = [
            'viewUpdateEvent' => $viewUpdateEvent,
            'viewModerator' => $viewModerator
        ];

        return $this->render('Admin/VolunteerEventUpdate','update Volunteer',$params);
    }

    public function deleteVolunteerEvent(Request $request)
    {
        if ($request->isGet()) {
            $volEvent = new volEvents();
            $data = $request->getBody();
            $del = $volEvent->delete('volunteer_event',[ 'id' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/Volunteer");
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }
    public function selectVolunteers(Request $request){

//      selected  participants
        $selectedParticipants = new staff();
        $data = $request->getBody();

        SessionManagement::set_session_data('eventId',$data['id']);

        $sqlStatement = "SELECT staff.fname,
                               staff.lname,
                               staff.id AS StaffID,
                               vp.volunteerId,
                               vp.eventId,
                               vp.state
                                FROM staff
                                JOIN volunteer_participate vp on staff.id = vp.volunteerId
                                WHERE vp.state = 1
                                AND vp.eventId LIKE '%$data[id]%'";

        $participants = $selectedParticipants->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $participantsCount = $selectedParticipants->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);

        //   participant requests
        $requestedParticipants = new staff();
        $data = $request->getBody();
        $sqlStatements = "SELECT staff.fname,
                               staff.lname,
                               staff.id AS StaffID,
                               vp.volunteerId,
                               vp.eventId,
                               vp.state
                                FROM staff
                                JOIN volunteer_participate vp on staff.id = vp.volunteerId
                                WHERE vp.state = 0
                                AND vp.eventId LIKE '%$data[id]%'";

        $participantRequests = $requestedParticipants->customSqlQuery($sqlStatements,DatabaseService::FETCH_ALL);
        $participantRequestsCount = $requestedParticipants->customSqlQuery($sqlStatements,DatabaseService::FETCH_COUNT);


        //        volunteer event view
        $volEvent = new volEvents();
        $data = $request->getBody();
        $viewEvent = $volEvent->select('volunteer_event','*',['id' => $data['id']],DatabaseService::FETCH_ALL);

        $params = [
            'viewEvent' => $viewEvent,
            'participants' => $participants,
            'participantsCount' => $participantsCount,
            'participantRequests' => $participantRequests,
            'participantRequestsCount' => $participantRequestsCount

        ];

//        print_r($data);
        return $this->render('Admin/VolunteerSelect','Select Volunteer',$params);

    }

    public function viewVolunteer(Request $request){

        $data = $request->getBody();
        $volunteer = new Staff();
        $volunteerEvent = new volEvents();
        $volunteerEvent->overrideTableName('volunteer_event');


        $sqlStatement = "SELECT ve.*, s2.fname as modFname, s2.lname as modLname
                           FROM volunteer_participate JOIN volunteer_event ve on ve.id = volunteer_participate.eventId
                           JOIN staff s on s.id = volunteer_participate.volunteerId
                           JOIN staff s2 on s2.id = ve.moderator
                           WHERE volunteer_participate.volunteerId =14 AND ve.startDate < DATE(now()) AND volunteer_participate.state = 1 ORDER BY ve.startDate DESC;";

        $viewVolunteerParticipate = $volunteerEvent->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        $viewVolunteerParticipateCount = $volunteerEvent->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);

        $sqlStatement2 = "SELECT s.fname, s.lname, u.email, u.gender, u.profile_pic FROM staff s join user u on s.id = u.id where s.id ='$data[id]'";
        $volunteerData = $volunteer->customSqlQuery($sqlStatement2, DatabaseService::FETCH_ALL);

        $params = [
            'viewVolunteerParticipate' => $viewVolunteerParticipate,
            'viewVolunteerParticipateCount' => $viewVolunteerParticipateCount,
            'volunteerData' => $volunteerData
        ];
        return $this->render('Admin/VolunteerProfileView','View Volunteer',$params);
    }


    public function volunteerRequestsUpdate(Request $request)
    {

        if ($request->isPost()) {
            $updateReq = new volunteerparticipants();
            $data = $request->getBody();

            $stateChange = $updateReq->update("volunteer_participate", ["state" => '1'], [ 'volunteerId' => $data['id'] ]);
        }

        if($stateChange)
        {
            header("location:/admin/selectVolunteer?id=".SessionManagement::get_session_data('eventId')); // redirects to user requests page
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Updating Record")';
            echo '</script>';
        }

    }

    public function VolunteerRequestsDelete(Request $request)
    {
        if ($request->isGet()) {
            $deleteReq = new volunteerparticipants();
            $data = $request->getBody();
            $del = $deleteReq->delete('volunteer_participate',[ 'volunteerId' => $data['id'] ]);
        }

        if($del)
        {
            header("location:/admin/selectVolunteer?id=".SessionManagement::get_session_data('eventId'));
        }
        else
        {
            echo '<script>';
            echo 'alert("Error Deleting Record")';
            echo '</script>';
        }

    }

}

