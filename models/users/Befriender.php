<?php


namespace models\users;


use core\DatabaseService;
use core\Model;
use Google\Service\Analytics\Resource\Data;
use mysql_xdevapi\Statement;

class Befriender extends Model
{

    public function addSupportGroupRequest(array $supportGroupRequest)
    {
        return $this->insert("sg_request", $supportGroupRequest);
    }

    public function getSupportGroupRequests($befrienderId)
    {
        return $this->select('sg_request', "*", [ 'befrienderId' => $befrienderId ], returnTypeFlag: DatabaseService::FETCH_ALL);
    }

    public function getReportPendingForBefriender($befrienderId)
    {
        $sqlStatement = "select meeting.id, shift.date, timeslot.startTime, timeslot.endTime, meeting.meeting_type
            from meeting, timeslot, shift
            where meeting.timeslotId = timeslot.timeslotId and meeting.befrienderId = {$befrienderId} and shift.shiftId = timeslot.shiftId and id not in (
            select meetingId
            from session_report)";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function getSingleMeetingDetails($meetingId)
    {
        $sqlStatement = "select * from meeting where id = {$meetingId}";
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function submitReportForMeeting($reportData)
    {
        date_default_timezone_set('Asia/Colombo');
        $sqlStatement = "";
        return $this->insert("session_report", [
            "date" => date("Y-m-d"),
            "meetingId" => $reportData['meetingId'],
            "remarks" => $reportData['remark'],
            "problemType" => $reportData['problem'],
            "befrienderId" => $reportData['befrienderId']
        ]);
    }

    public function getSubmittedReportsForBefriender($befrienderId)
    {
        return $this->customSqlQuery("select meeting.id, shift.date, timeslot.startTime, timeslot.endTime, meeting.meeting_type
            from session_report, timeslot, meeting, shift
            where shift.shiftId = timeslot.shiftId and session_report.meetingId = meeting.id and timeslot.timeslotId = meeting.timeslotId and meeting.befrienderId = {$befrienderId}", DatabaseService::FETCH_ALL);
    }

    public function getAllMeetingsOfBefriender($befrienderId)
    {
        $sqlStatement = "select meeting.id, meeting.date, shift.date as 'appointment_date', user.username, timeslot.startTime, timeslot.endTime, meeting.meeting_type
            from meeting, timeslot, shift, user
            where meeting.timeslotId = timeslot.timeslotId and meeting.state = 0
              and shift.shiftId = timeslot.shiftId and befrienderId = {$befrienderId} and user.id = meeting.callerId and shift.date >= CURRENT_DATE";
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function cancelBefrienderAppointmentsForAWeek(mixed $befid)
    {
        $date = date('Y-m-d');
        $newdate = date('Y-m-d', strtotime($date.' + 7 days'));
        echo $date;
        echo $newdate;
        $sqlStatement = "select callerId, meeting.id, meeting.callerId
            from meeting, timeslot, shift
            where meeting.befrienderId = 41 and timeslot.timeslotId = meeting.timeslotId
              and timeslot.shiftId = shift.shiftId
              and shift.date between '$date' and '$newdate'";
        echo $sqlStatement;
        $dates = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        print_r($dates);
        foreach ($dates as $date) {
            $this->update("meeting", [
                "state" => 3,
            ], [
                "id" => $date['id']
            ]);
        }
    }

    public function getCancelledWithinWeek($data = null)
    {
        $date = date('Y-m-d');
        $newdate = date('Y-m-d', strtotime($date.' + 7 days'));
        $sqlStatement = "select caller.id, caller.fname, caller.lname, caller.age
            from caller, meeting, timeslot, shift
            where caller.id = meeting.callerId and meeting.timeslotId = timeslot.timeslotId
              and shift.shiftId = timeslot.shiftId and meeting.state = 3
              and shift.date between '$date' and '$newdate'";

        if ($data != null) {
            $sqlStatement .= " and age between {$data['from']} and {$data['to']}";
            //echo $sqlStatement;
        }
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function getProblemTypes()
    {
        return $this->select("problems", "*", [], DatabaseService::FETCH_ALL);
    }

}