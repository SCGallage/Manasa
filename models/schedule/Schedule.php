<?php

namespace models\schedule;

use core\DatabaseService;
use core\Model;
use Google\Service\Analytics\Resource\Data;

class Schedule extends Model
{

    public function getAllSlotDetails()
    {
        /*$sqlStatement = "SELECT s.*, COALESCE(sRC.reserved_count, 0) as 'reserved_count'
            FROM schedule
            JOIN shift s on schedule.scheduleId = s.scheduleId
            LEFT JOIN shiftReserveCount sRC on s.shiftId = sRC.shiftId;";*/
        return json_encode($this->executeStoredProcedure('CALL getShiftsInSchedule()'), JSON_NUMERIC_CHECK);
        //$this->executeStoredProcedure('CALL getShiftsInSchedule()');
    }

    public function getDisabledSchedule()
    {
        /*$sqlStatement = "SELECT s.*, COALESCE(sRC.reserved_count, 0) as 'reserved_count'
            FROM schedule
            JOIN shift s on schedule.scheduleId = s.scheduleId
            LEFT JOIN shiftReserveCount sRC on s.shiftId = sRC.shiftId;";*/
        return json_encode($this->executeStoredProcedure('CALL getLastDisabledSchedule()'), JSON_NUMERIC_CHECK);
        //$this->executeStoredProcedure('CALL getShiftsInSchedule()');
    }

    public function getSlotDetailsOfBefriender($befrienderId)
    {

    }

    public function getReservedSlotsByBefriender($befrienderId)
    {
        $sqlStatement = "SELECT reserve.shiftId
            FROM reserve, shift
            WHERE befrienderId = {$befrienderId} AND shift.shiftId = reserve.shiftId AND shift.scheduleId = 1";
        return json_encode($this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL), JSON_NUMERIC_CHECK);
    }

    public function reserveTimeSlot($befrienderId, $shiftId, $type)
    {
        if ($type === "add")
            $result = $this->insert('reserve', [ "befrienderId" => $befrienderId, "shiftId" => $shiftId ]);
        elseif ($type === "remove")
            $result = $this->delete('reserve', [ "befrienderId" => $befrienderId, "shiftId" => $shiftId ]);
        return json_encode([ "result" => $result ], JSON_NUMERIC_CHECK);
    }

    public function getBefriendersAssignedToSlot($slotId)
    {
        $sqlStatement = "SELECT shiftId, befrienderId, fname, lname
            FROM reserve, staff
            WHERE staff.id = reserve.befrienderId AND reserve.shiftId = {$slotId}";

        return json_encode($this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL), JSON_NUMERIC_CHECK);
    }

    public function checkForLockedSchedule()
    {
        $sqlStatement = "SELECT startDate FROM schedule WHERE scheduleId = 1";
        $lockedSchedule = $this->select("schedule", [ "startDate" ], [ "scheduleId" => 1 ], DatabaseService::FETCH_ALL);
        //echo $lockedSchedule[0]["startDate"];
        $pastDate = date("Y-m-d", strtotime('-7 days', strtotime($lockedSchedule[0]["startDate"])));
        echo $pastDate;
    }

    public function requestShiftTransfer(array $transferRequest)
    {
        $sqlStatement = "SELECT ";
        $this->insert("transfer_shift", ["shiftId" => $transferRequest["shiftId"], "befrienderId" => $transferRequest["befrienderId"]]);
    }

    public function getTransferRequestsForBefriender(mixed $requestData)
    {
        $sqlStatement = "SELECT s.*
            FROM reserve r
            JOIN shift s on s.shiftId = r.shiftId
            JOIN transfer_shift ts on r.shiftId = ts.shiftId
            WHERE r.befrienderId = {$requestData["befid"]}";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function loadPreviousShift()
    {
        $sqlStatement = "select startDate, endDate
            from (select * from schedule order by scheduleId desc limit 2) lastTwo
            order by scheduleId
            limit 1";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function getSlotForGivenDate(string $date)
    {
        $sqlStatement = "select *
            from shift
            where date = '$date'";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function creteTransferRequest(array $transferRequestData)
    {
        $sqlStatement = "";
        foreach ($transferRequestData['trBefIds'] as $trBefId) {
            $this->insert('transfer_shift', [
                'befrienderId' => $transferRequestData['befrienderId'],
                'transferBefriender' => $trBefId,
                'exchange_shiftId' => $transferRequestData['reservedShift'],
                'requested_shiftId' => $transferRequestData['availableShift']
            ], false);
            echo $trBefId;
        }
        //return $this->insert('transfer_shift', [], false);
    }

    public function loadTransfersForBefriender(mixed $befrienderId)
    {
        $sqlStatement = "select shift.shiftId, transfer_shift.transferBefriender, shift.date, shift.startTime, shift.endTime, staff.fname, staff.lname
            from transfer_shift, shift, staff
            where befrienderId = $befrienderId and transfer_shift.requested_shiftId = shift.shiftId and staff.id = transfer_shift.transferBefriender";
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function loadPendingTransfersForBefriender($befrienderId) {
        $sqlStatement = "select transfer_shift.id, shift.date, shift.startTime, shift.endTime, staff.fname, staff.lname
            from staff, shift, transfer_shift
            where transfer_shift.transferBefriender = $befrienderId and staff.id = transfer_shift.befrienderId and transfer_shift.requested_shiftId = shift.shiftId";
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function resolveTransferRequest($transferId, $type)
    {
        if ($type == "accept") return $this->update("transfer_shift", [ "state" => 1 ], [ "id" => $transferId ]);
        else if ($type == "decline") return $this->update("transfer_shift", [ "state" => 2 ], [ "id" => $transferId ]);
    }

    public function deleteTransferRequest($trRequestId)
    {
        return $this->delete('transfer_shift', [ "id" => $trRequestId ]);
    }

    public function loadShiftsAvailableForTransfer($befrienderId)
    {
        $sqlStatementOne = "select shiftId
            from reserve
            where befrienderId = $befrienderId";

        $shiftData = $this->customSqlQuery($sqlStatementOne, DatabaseService::FETCH_ALL);

        if (!empty($shiftData)) {
            $shiftList = "";
            $i = 0;
            foreach ($shiftData as $shift) {
                $i++;
                $shiftList .= $shift['shiftId'];
                if (count($shiftData) == $i)
                    continue;
                $shiftList .= ",";
            }
        }

        echo $shiftList;

        $sqlStatement = "select distinct(shift.shiftId), startTime, endTime, date
            from reserve, shift
            where reserve.shiftId = shift.shiftId and reserve.shiftId not in ($shiftList) 
            and shift.scheduleId = (select scheduleId
                                    from (select * from schedule order by scheduleId desc limit 2) lastTwo
                                    order by scheduleId
                                    limit 1)";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function getShiftReservedByBefriender($befrienderId)
    {
        $sqlStatement = "select shift.shiftId, date, startTime, endTime
            from reserve, shift
            where reserve.shiftId = shift.shiftId and reserve.befrienderId = $befrienderId";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function makeDecisionForTransferRequest($transferId)
    {
        $sqlStatement = "call accept_transfer($transferId)";
        return $this->executeStoredProcedure($sqlStatement);
    }

}