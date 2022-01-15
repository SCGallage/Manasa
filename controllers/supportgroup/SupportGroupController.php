<?php

namespace controllers\supportgroup;

use core\Application;
use core\Controller;
use core\Request;
use core\sessions\SessionManagement;
use models\Appointment\CallerAppointment;
use models\supportgroup\SgEnroll;
use models\supportgroup\SupportGroup;
use util\CommonConstants;
use util\CustomMessage;

class SupportGroupController extends Controller
{

    public function getSupportGroupRequests(Request $request): bool|string
    {
        $requestData = $request->getBody();
        //print_r($requestData);
        $supportGroup = new SupportGroup();
        Application::$app->response->setContentTypeJson();
        return json_encode($supportGroup->getSupportGroupRequests($requestData["supportGroupId"]), JSON_NUMERIC_CHECK);
    }

    public function supportGroupRequestDecision(Request $request): bool|string
    {
        $requestData = $request->getJsonBody();
        $supportGroup = new SupportGroup();
        Application::$app->response->setContentTypeJson();
        return json_encode($supportGroup->supportGroupRequestDecision($requestData), JSON_NUMERIC_CHECK);
    }

    public function getSupportGroupMembers(Request $request): bool|string
    {
        $requestData = $request->getBody();
        $supportGroup = new SupportGroup();
        Application::$app->response->setContentTypeJson();
        return json_encode($supportGroup->getSupportGroupMembers($requestData["supportGroupId"]), JSON_NUMERIC_CHECK);
    }

    public function removeMemberFromSupportGroup(Request $request): bool|string
    {
        $requestData = $request->getJsonBody();
        $supportGroup = new SupportGroup();
        Application::$app->response->setContentTypeJson();
        return json_encode($supportGroup->removeMemberFromSupportGroup($requestData), JSON_NUMERIC_CHECK);
    }

    /*
     * Function: callerLoadSupportGroupsList
     * Operation: filter support group details according to the user and
                  set data to load caller support group list UI
     * Parameters:
     * Return:
     *
     * */
    public function callerLoadSupportGroupsList(): array|bool|string
    {

        $supportGroup = new SupportGroup();
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $results = $supportGroup->findAllSupportGroupsWithRequestsByUserId($userId);
        $supportGroups = $supportGroup->findAllSupportGroups();
        $requests = array();
        $mySupportGroups = array();
        $availableSupportGroups = array();

        //loop to set request and mySupportGroups arrays
        foreach ($results as $row) {

            $state = $row['state'];
            //check for requests
            if ($state == CommonConstants::STATE_PENDING) {
                array_push($requests, $row);
                continue;
            }
            //check for user's support groups
            if ($state == CommonConstants::STATE_ACCEPTED) {
                array_push($mySupportGroups, $row);
            }

        }

        //loop for available support groups array
        foreach ($supportGroups as $row) {

            $supportGroupId = intval($row['id']);

            $check = 0; // value 0 -> record not found value 1 -> record found

            // check in requests list
            foreach($requests as $req_row) {
                if (intval($req_row['supportGroupId']) === $supportGroupId) {
                    $check = 1;
                    break;
                }
            }

            //check in mySupporGroups list
            if ($check === 0) {
                foreach ($mySupportGroups as $mysg_row) {
                    if (intval($mysg_row['supportGroupId']) === $supportGroupId) {
                        $check = 1;
                        break;
                    }
                }
            }

            //if Support group not found in above arrays
            if ($check === 0) {
                array_push($availableSupportGroups, $row);
            }

        }

        $params = [
            'requests' => $requests,
            'availableSupportGroups' =>$availableSupportGroups,
            'mySupportGroups' => $mySupportGroups,
            'viewType' => 'sgList'
        ];

        $this->setLayout('caller/callerFunction');
        return $this->render('caller/supportGroups/supportGroupsList',"Support Groups List",$params);
    }


    /*
     * Function: callerLoadSupportGroupHomeMember
     * Operation: get data from database to load support group member home page UI
     * Parameter:
     * Return:
     *
     * */
    public function callerLoadSupportGroupHomeMember(): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        //load upcoming events
        //load members
        //$membeList =
            $this->setLayout('caller/supportGroupHomeMember');
        return $this->render('caller/supportGroups/memberSupportGroup', 'Support Group Home');
    }

    /*
     * Function: viewSupportGroupEvent
     * Operation: View support group event
     * Parameter:
     * Return: event info
     *
     * */
    public function viewSupportGroupEvent(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $requestBody = $request->getBody();
        $sgId = $requestBody['sgId'];
        $eventId = $requestBody['eventId'];
        $supportGroup = new SupportGroup();

        //get event
        $event = $supportGroup->get_sg_event_by_id($userId, $eventId);

        $params = [
            'request' => $requestBody,
            'event' => $event,
            'sgId' => $sgId,
            'participants' => $supportGroup->get_sg_event_participant_count($eventId)
        ];

        $this->setLayout('caller/memberSupportGroupFunction');
        return $this->render('caller/supportGroups/supportGroupEvent', 'Support Group Event', $params);
    }

    public function participateSgEvent(Request $request){

        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $requestBody = $request->getBody();
        $supportGroup = new SupportGroup();

        if ($supportGroup->participateSgEvent($userId, $requestBody['eventId'])){

            $params = [
                'request' => ['sgId' => $requestBody['sgId']],
                'title' => "Successfully participated.",
                'message' => 'Your participation was successful.',
                'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                'link' => '/callerSupportGroupHome',
                'linkType' => CommonConstants::LINK_TYPE_GET,
            ];
        } else {
            $params = [
                'request' => ['sgId' => $requestBody['sgId']],
                'title' => "Participation failed.",
                'message' => 'Your participation was failed.',
                'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
                'link' => '/callerSupportGroupHome',
                'linkType' => CommonConstants::LINK_TYPE_GET,
            ];
        }

        $this->setLayout('caller/callerFunction');
        return $this->render('components/errorMessage', 'test',$params);

    }

    public function cancelSgEventParticipation(Request $request){
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $supportGroup = new SupportGroup();
        $requestBody = $request->getBody();

        if ($supportGroup->cancelSgEventParticipation($requestBody['eventId'], $userId)){
            $params = [
                'request' => ['sgId' => $requestBody['sgId']],
                'title' => "Your participation removed.",
                'message' => 'Your participation removed successfully.',
                'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                'link' => '/callerSupportGroupHome',
                'linkType' => CommonConstants::LINK_TYPE_GET,
            ];
        } else {
            $params = [
                'request' => ['sgId' => $requestBody['sgId']],
                'title' => "Cannot remove your participation.",
                'message' => 'Remove participation failed.',
                'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                'link' => '/callerSupportGroupHome',
                'linkType' => CommonConstants::LINK_TYPE_GET,
            ];
        }

        $this->setLayout('caller/callerFunction');
        return $this->render('components/errorMessage', 'test',$params);
    }

    /*
     * Function: supportGroupHome
     * Operation: get data from database to load support group home page UI
     * Parameter: Request object
     * Return: Array of data values
     *
     * */
    public function supportGroupHome(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $requestBody = $request->getBody();
        $sgEnrollRequest = new SgEnroll();
        $supportGroup = new SupportGroup();
        $params = array();
        $params['viewType'] = CommonConstants::USER_TYPE_VISITOR;
        $params['befrinders'] = $supportGroup->get_befrienders_by_sg_id(intval($requestBody['sgId']));
        //load support group info
        $params['sg'] = $supportGroup->getSupportGroupById($requestBody['sgId']);


        //check user is a member or not
        $check = $sgEnrollRequest->findSupportGroupRequestById($userId,$requestBody['sgId']);

        if (!empty($check)){
            //user in sg_enroll table
            //check the request accepted or not
            foreach ($check as $row){
                if ($row['state'] == CommonConstants::STATE_ACCEPTED){
                    //request accepted
                    //set view type
                    $params['viewType'] = CommonConstants::USER_TYPE_NORMAL_CALLER;

                    //load sg member list
                    $members = $sgEnrollRequest->getMemberListById($requestBody['sgId']);
                    $params['members'] = $members;

                    //load sg event list
                    $events = $supportGroup->get_sg_events_by_sg_id(intval($requestBody['sgId']));
                    $events_p = $supportGroup->get_sg_event_participate_member($userId, $requestBody['sgId']);

                    //filter events
                    if (!empty($events_p) && !empty($events)){

                        //add params
                        $params['participated'] = $events_p;

                        //filter events
                        foreach ($events_p as $participation){
                            $key = -1;
                            foreach ($events as $event){
                                if ($event['id'] == $participation['eventId']){
                                    $key = array_keys($events, $event, true);
                                    break;
                                }
                            }

                            if ($key != -1){
                                //remove requested events from events
                                unset($events[$key[0]]);

                            }

                        }

                    }
                    //add filtered events
                    $params['events'] = $events;
                }
            }
        }

        $this->setLayout('caller/supportGroupHomeMember');
        return $this->render('caller/supportGroups/memberSupportGroup', 'Support Group Home', $params);
    }

    /*
     * Function: callerJoinSupportGroup
     * Operation: Place support group join request
     * Parameter: Request object
     * Return:
     *
     * */
    public function callerJoinSupportGroup(Request $request)
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $requestBody = $request->getBody();
        //set user id for security purposes
        $requestBody['callerId'] = $userId;
        $sgEnrollRequest = new SgEnroll();
        $callerAppointment = new CallerAppointment();
        if ($request->isPost()) {

            //Reserve meeting
            $meetingId = -1;
            $meetingId = $callerAppointment->reserveMeeting($requestBody);
            if ($meetingId > -1) {
                //add support group join request
                $columns = array(
                    "supportGroupId" => $requestBody['supportGroupId'],
                    "callerId" => $requestBody['callerId'],
                    "state" => $requestBody['state'],
                    "meeting" => $meetingId
                );
                if ($sgEnrollRequest->addRequest($columns)) {

                }
            } else {

                $params = [
                    'request' => $requestBody,
                    'title' => "Cannot reserve timeslot.",
                    'message' => 'Requested timeslot already reserved. Please try again with another timeslot.',
                    'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
                    'link' => '/callerSupportGroupsList',
                    'linkType' => CommonConstants::LINK_TYPE_GET,
                ];

                $this->setLayout('caller/callerFunction');
                return $this->render('components/errorMessage', 'test',$params);

            }


            Application::$app->response->setRedirectUrl('/callerSupportGroupsList');
        }
    }


    /*
     * Function: cancelSupportGroupJoinRequest
     * Operation: cancel support group join request
     * Parameter: Request object
     * Return:
     *
     * */
    public function cancelSupportGroupJoinRequest(Request $request)
    {

        if ($request->isPost()) {

            $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
            $requestBody = $request->getBody();
            //set user id
            $requestBody['callerId'] = $userId;
            $sgEnrollRequest = new SgEnroll();
            $callerAppointment = new CallerAppointment();

            //default error message
            $params = [
                'request' => $requestBody,
                'title' => "Cannot remove request.",
                'message' => 'Cannot remove your support group join request. Please try again.',
                'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
                'link' => '/callerSupportGroupsList',
                'linkType' => CommonConstants::LINK_TYPE_GET,
            ];

            //get support group join request
            $sg_join_request = $sgEnrollRequest->findSupportGroupRequestById($userId, $requestBody['supportGroupId']);

            //check results
            if (!empty($sg_join_request)){
                $meetingId = -1;
                $timeslotId = -1;

                foreach ($sg_join_request as $row) {
                    //check join request state
                    if ($row['state'] == CommonConstants::STATE_PENDING) {
                        $meeting = intval($row['meeting']);

                        if ($meeting > -1) {
                            //get timeslot id
                            $meeting = $callerAppointment->getMeetingByID($meeting);

                            if (!empty($meeting)) {
                                foreach ($meeting as $row) {
                                    //check meeting state
                                    if ($row['state'] == CommonConstants::STATE_PENDING) {
                                        $timeslotId = intval($row['timeslotId']);
                                        $meetingId = intval($row['id']);
                                        break;
                                    }
                                }
                            }
                        }
                        break;
                    }
                }

                if ($timeslotId > -1 && $meetingId > -1) {

                    $params['request'] = $requestBody;

                    if ($callerAppointment->cancelMeeting($timeslotId, $meetingId)) {
                        //success message
                        $params = [
                            'request' => $requestBody,
                            'title' => "Request removed",
                            'message' => 'Support Group join request removed successfully.',
                            'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                            'link' => '/callerSupportGroupsList',
                            'linkType' => CommonConstants::LINK_TYPE_GET,
                        ];
                    }


                }
            }

            $this->setLayout('caller/callerFunction');
            return $this->render('components/errorMessage', 'test',$params);
        }
    }


    /*
     * Function: loadJoinRequestTimeSlots
     * Operation: Load timeslots for preliminary session when support group join
     * Parameters: Request request
     * Return:
     *
     * */
    public function loadJoinRequestTimeSlots(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $callerAppointment = new CallerAppointment();
        $sgEnrollRequest = new SgEnroll();
        $requestBody = $request->getBody();
        $params = array();
        if ($request->isGet()){
            $params = [
                'request' =>$requestBody,
                'viewType' => 'sg_join_meeting'
            ];
        }

        if (array_key_exists('date', $requestBody)){

            $limitCheck = $callerAppointment->reservationLimit_check($userId,$requestBody['date']);

            if ($limitCheck != -1){
                //schedule found
                if ($request->isPost() && $limitCheck){
                    $params = [
                        'timeSlots' => $callerAppointment->loadTimeSlots($userId, $requestBody['date']),
                        'request' =>$requestBody,
                        'viewType' => 'sg_join_meeting',
                        'searchedDate' => $requestBody['date'],
                        'meetingType' => $requestBody['meetingType'],
                        'chances' => $limitCheck
                    ];
                } else if (!$limitCheck){
                    //error message
                    $params = [
                        'error' => $callerAppointment->reservationLimit_check($userId,$requestBody['date']),
                        'request' => $requestBody,
                        'title' => "Cannot load timeslots.",
                        'message' => 'Reservation limit exceeded.',
                        'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
                        'link' => '/callerSupportGroupsList',
                        'linkType' => CommonConstants::LINK_TYPE_GET,
                    ];

                    $this->setLayout('caller/callerFunction');
                    return $this->render('components/errorMessage', 'test',$params);
                }
            } else if ($limitCheck == -1) {
                //schedule not found
                //error message
                $params = [
                    'error' => $callerAppointment->reservationLimit_check($userId,$requestBody['date']),
                    'request' => $requestBody,
                    'title' => "Cannot find timeslots.",
                    'message' => 'Timeslots not available. Please try again with another date. ',
                    'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
                    'link' => '/callerSupportGroupsList',
                    'linkType' => CommonConstants::LINK_TYPE_GET,
                ];

                $this->setLayout('caller/callerFunction');
                return $this->render('components/errorMessage', 'test',$params);
            }

        }

        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/timeSlots', 'Time Slots',$params);
    }
}