<?php

namespace controllers\supportgroup;

use core\Application;
use core\Controller;
use core\Model;
use core\Request;
use core\sessions\SessionManagement;
use models\supportgroup\SupportGroup;

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

    public function callerLoadSupportGroupsList()
    {

        $this->setLayout('caller/callerFunction');
        return $this->render('caller/supportGroups/supportGroupsList');
    }

    public function callerLoadSupportGroupHomeMember()
    {
        $this->setLayout('caller/supportGroupHomeMember');
        return $this->render('caller/supportGroups/memberSupportGroup');
    }

    public function viewSupportGroupEvent()
    {
        $this->setLayout('caller/memberSupportGroupFunction');
        return $this->render('caller/supportGroups/supportGroupEvent');
    }

    public function callerSupportGroupHomeVisitor()
    {
        $this->setLayout('caller/supportGroupHomeVisitor');
        return $this->render('caller/supportGroups/visitorSupportGroup');
    }
}