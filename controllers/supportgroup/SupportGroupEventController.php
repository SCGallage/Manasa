<?php

namespace controllers\supportgroup;

use core\Application;
use core\Controller;
use core\Request;
use models\supportgroup\SupportGroupEvent;
use models\supportgroup\VirtualMeeting;

class SupportGroupEventController extends Controller
{
    private SupportGroupEvent $sgEvent;

    public function __construct()
    {
        $this->sgEvent = new SupportGroupEvent();
    }

    public function createSupportGroupEvent(Request $request) {
        $meetingDetails = $request->getJsonBody();
        if ($meetingDetails['type'] === 'virtual') {
            $virtualMeeting = new VirtualMeeting();
            $virtualMeeting->setMeetingOptions($meetingDetails['topic'], $meetingDetails['eventDate'], $meetingDetails['startTime'],
                $meetingDetails['duration'], $meetingDetails['agenda']);
            $virtualMeeting->createMeeting();
        }
    }

    public function getUpcomingEventForSG(Request $request)
    {
        $data = $request->getJsonBody();
        Application::$app->response->setContentTypeJson();
        $eventList = $this->sgEvent->getUpcomingEvents();

        return json_encode($eventList);
    }

    public function getSupportGroupEventsForDate(Request $request)
    {
        $data = $request->getBody();
        //print_r($data);
        Application::$app->response->setContentTypeJson();
        return json_encode($this->sgEvent->getSupportGroupEventsForDate($data["date"]));
    }

    public function getMeetingTypeDetails(Request $request)
    {
        Application::$app->response->setContentTypeJson();
        return json_encode($this->sgEvent->getMeetingTypeDetails($request->getBody()['meetingType']
            , $request->getBody()['meetingId']), JSON_NUMERIC_CHECK);
    }

    public function deleteSupportGroupEvent(Request $request)
    {
        Application::$app->response->setContentTypeJson();
        return json_encode([
            "result" => $this->sgEvent->deleteSupportGroupEvent($request->getJsonBody()['id'])
        ]);
    }
}