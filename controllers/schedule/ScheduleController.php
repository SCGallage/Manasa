<?php

namespace controllers\schedule;

use core\Application;
use core\Controller;
use core\DatabaseService;
use core\Request;
use core\sessions\SessionManagement;
use Google\Service\AdMob\App;
use models\schedule\Schedule;

class ScheduleController extends Controller
{

    private Schedule $schedule;

    /**
     * ScheduleController constructor.
     * @param Schedule $schedule
     */
    public function __construct()
    {
        $this->schedule = new Schedule();
        $this->setLayout('auth');
    }

    public function getAllSlotDetails(Request $request)
    {
        Application::$app->response->setContentTypeJson();
        return $this->schedule->getAllSlotDetails();
    }

    public function getDisabledSchedule(Request $request)
    {
        Application::$app->response->setContentTypeJson();
        return $this->schedule->getDisabledSchedule();
    }

    public function getReservedSlotsByBefriender(Request $request)
    {
        $requestData = $request->getBody();

        Application::$app->response->setContentTypeJson();
        return $this->schedule->getReservedSlotsByBefriender($requestData['befId']);
    }

    public function reserveTimeSlot(Request $request)
    {
        $requestData = $request->getJsonBody();
        Application::$app->response->setContentTypeJson();
        return $this->schedule->reserveTimeSlot($requestData['befrienderId'], $requestData['shiftId'], $requestData['reserveType']);
    }

    public function getBefriendersAssignedToSlot(Request $request)
    {
        $requestData = $request->getBody();
        Application::$app->response->setContentTypeJson();
        return $this->schedule->getBefriendersAssignedToSlot($requestData['slotId']);
    }

    public function requestShiftTransfer(Request $request)
    {
        $requestData = $request->getJsonBody();
        $this->schedule->requestShiftTransfer($requestData);
    }

    public function loadPreviousShift(Request $request)
    {
        $scheduleData = $this->schedule->loadPreviousShift();
        //print_r($scheduleData);
        return $this->render('befriender\befriender_schedule_transfer', 'Befriender | Transfer Shift',
            [ "startDate" =>  $scheduleData[0]["startDate"],
                "endDate" =>  $scheduleData[0]["endDate"],
                "transfers" =>  $this->schedule->loadTransfersForBefriender($request->getBody()['befid']),
                "requestedTransfers" => $this->schedule->loadPendingTransfersForBefriender($request->getBody()['befid']),
                "availableShifts" => $this->schedule->loadShiftsAvailableForTransfer($request->getBody()['befid']),
                "reservedSlots" => $this->schedule->getShiftReservedByBefriender($request->getBody()['befid'])
            ]);
    }

    public function getSlotForGivenDate(Request $request)
    {
        $requestData = $request->getBody();
        Application::$app->response->setContentTypeJson();
        return json_encode($this->schedule->getSlotForGivenDate($requestData['scheduleDate']));
    }

    public function getTransferRequestsForBefriender(Request $request)
    {
        $requestData = $request->getBody();
        Application::$app->response->setContentTypeJson();
        return json_encode($this->schedule->getTransferRequestsForBefriender($requestData));
    }

    public function createTransferRequest(Request $request)
    {
        $requestData = $request->getJsonBody();
        $this->schedule->creteTransferRequest($requestData);
    }

    public function deleteTransferRequest(Request $request)
    {
        $this->schedule->deleteTransferRequest($request->getJsonBody()['trRequestId']);
    }

    public function getPreviousDate()
    {
        $this->schedule->checkForLockedSchedule();
    }

    public function loadShiftsAvailableForTransfer(Request $request)
    {
        $this->schedule->loadShiftsAvailableForTransfer($request->getBody()['befid']);
    }

    public function makeDecisionForTransferRequest(Request $request)
    {
        $this->schedule->makeDecisionForTransferRequest($request->getJsonBody()['transferId']);
    }

}