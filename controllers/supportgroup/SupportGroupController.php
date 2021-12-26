<?php

namespace controllers\supportgroup;

use core\Application;
use core\Controller;
use core\Model;
use core\Request;
use core\sessions\SessionManagement;
use models\supportgroup\SgEnroll;
use models\supportgroup\SupportGroup;
use util\CommonConstants;

class SupportGroupController extends Controller
{

    public function getSupportGroupRequests(Request $request) {
        $requestData = $request->getBody();
        //print_r($requestData);
        $supportGroup = new SupportGroup();
        Application::$app->response->setContentTypeJson();
        return json_encode($supportGroup->getSupportGroupRequests($requestData["supportGroupId"]), JSON_NUMERIC_CHECK);
    }

    public function supportGroupRequestDecision(Request $request)
    {
        $requestData = $request->getJsonBody();
        $supportGroup = new SupportGroup();
        Application::$app->response->setContentTypeJson();
        return json_encode($supportGroup->supportGroupRequestDecision($requestData), JSON_NUMERIC_CHECK);
    }

    public function getSupportGroupMembers(Request $request)
    {
        $requestData = $request->getBody();
        $supportGroup = new SupportGroup();
        Application::$app->response->setContentTypeJson();
        return json_encode($supportGroup->getSupportGroupMembers($requestData["supportGroupId"]), JSON_NUMERIC_CHECK);
    }

    public function removeMemberFromSupportGroup(Request $request)
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
    public function callerLoadSupportGroupsList()
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
            if ($state === CommonConstants::STATE_PENDING) {
                array_push($requests, $row);
                continue;
            }
            //check for user's support groups
            if ($state === CommonConstants::STATE_ACCEPTED) {
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
            'mySupportGroups' => $mySupportGroups
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
    public function callerLoadSupportGroupHomeMember()
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        //load upcoming events
        //load members
        $membeList =
            $this->setLayout('caller/supportGroupHomeMember');
        return $this->render('caller/supportGroups/memberSupportGroup', 'Support Group Home');
    }

    public function viewSupportGroupEvent()
    {
        $this->setLayout('caller/memberSupportGroupFunction');
        return $this->render('caller/supportGroups/supportGroupEvent', 'Support Group Event');
    }

    public function callerSupportGroupHomeVisitor()
    {
        $this->setLayout('caller/supportGroupHomeVisitor');
        return $this->render('caller/supportGroups/visitorSupportGroup', 'Support Group Home');
    }

    public function callerJoinSupportGroup(Request $request)
    {
        $sgEnrollRequest = new SgEnroll();
        if ($request->isPost()) {

            if ($sgEnrollRequest->addRequest($request->getBody())) {

            }
            Application::$app->response->setRedirectUrl('/callerSupportGroupsList');
        }
    }


    public function cancelSupportGroupJoinRequest(Request $request)
    {
        $sgEnrollRequest = new SgEnroll();
        if ($request->isPost()) {
            //check the state of request
            //$sgEnrollRequest
            if ($sgEnrollRequest->removeRequest($request->getBody())) {

            }
            Application::$app->response->setRedirectUrl('/callerSupportGroupsList');
        }
    }


    /*
     * Function: loadJoinRequestTimeSlots
     * Operation: Load timeslots for preliminary session for support group join
     * Parameters: Request request
     * Return:
     *
     * */
    public function loadJoinRequestTimeSlots(Request $request)
    {
        $back =
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/timeSlots', 'Time Slots');
        print_r($request);
    }
}