<?php
namespace models\Appointment;

use core\DatabaseService;
use core\Model;
use core\Request;
use util\CommonConstants;

class CallerAppointment extends Model
{

    private string $timeslot_table = "timeslot";
    private string $shift_table = "shift";
    private string $meeting_table = "meeting";
    private string $limit_table = "limits";
    private string $schedule_table = "schedule";

    public function __construct()
    {
        parent::__construct();
    }


    /*
     * Function: loadTimeSlotsSGEnroll
     * Operation: add new support join request record
     * Parameters: date value
     * Return: array of timeslots data
     *
     * */
    public function loadTimeSlots($userId, $date): array|bool|int
    {
        //load timeslots
        $sqlStatement = "SELECT * 
                         FROM shift s JOIN timeslot t on s.shiftId = t.shiftId 
                         WHERE s.date = '$date'  AND 
                               s.num_of_befrienders > 0 AND 
                               s.num_of_befrienders - 1 > t.num_reservations";

        $timeslots = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

        $meetings = $this->getPendingMeetingsByUser($userId, $date);

        if (!empty($meetings)) {
            $filtered = array();
            foreach ($timeslots as $timeslot) {

                $check = 0;

                foreach ($meetings as $meeting){
                    if ($meeting['timeslotId'] == $timeslot['timeslotId']) {
                        $check = 1;
                        break;
                    }
                }

                if ($check == 0) array_push($filtered, $timeslot);

            }

            return $filtered;

        }

       return $timeslots;

    }


    /*
     * Function: reserveMeeting
     * Operation: Reserve meetings for callers
     * Parameter: request array
     * Return: bool or int value
     *
     * */
    public function reserveMeeting(array $requestBody): bool|int
    {

        //check availability of request timeslot
        //reserve timeslot
        $sqlStatement = "UPDATE ".$this->timeslot_table."
                             SET num_reservations = num_reservations + 1
                             WHERE timeslotId = ".$requestBody['timeslotId']." AND
                                   num_reservations < (SELECT num_of_befrienders
                                                       FROM ".$this->shift_table."
                                                       WHERE shiftId = (SELECT shiftId 
                                                                        FROM ".$this->timeslot_table." 
                                                                        WHERE timeslotId = ".$requestBody['timeslotId']."))";
        //confirm update
        if ($this->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT) == 1) {
            //schedule meeting
            $columns = array(
                "date" => $requestBody['reserveDate'],
                "time" => $requestBody['reserveTime'],
                "state" => $requestBody['state'],
                "timeslotId" => $requestBody['timeslotId'],
                "callerId" => $requestBody['callerId'],
                "meeting_type" => $requestBody['meetingType']
            );

            $lastId = -1;
            $lastId = $this->insert($this->meeting_table, $columns, DatabaseService::RETURN_LAST_ID);
            if ($lastId != -1) {
                return $lastId;
            }
        }
        return false;
    }


    /*
     * Function: cancelMeeting
     * Operation: Cancel reserved meetings for callers
     * Parameter: meeting id
     * Return: bool or int value
     *
     * */
    public function cancelMeeting($meetingId): bool|int
    {
        //get timeslot
        $meeting = $this->getMeetingByID($meetingId);

        if (!empty($meeting) && sizeof($meeting) == 1){
            $timeslotId = $meeting[0]['timeslotId'];

            if ($timeslotId >= 0){
                //delete meeting
                $sql = "delete from ".$this->meeting_table." where id = ".$meetingId." and state = ".CommonConstants::STATE_PENDING;
                if ($this->customSqlQuery($sql,DatabaseService::FETCH_COUNT == 1)){//$this->delete($this->meeting_table, $conditions)){
                    //update timeslot
                    $sqlStatement = "UPDATE ".$this->timeslot_table." 
                             SET num_reservations = num_reservations - 1
                             WHERE timeslotId =".$timeslotId." AND
                                   num_reservations > 0";

                    return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);

                }
            }
        }



        return false;
    }

    /*
     * Function: getMeetingByID
     * Operation: Get meeting data by using meeting id
     * Parameter: meeting id
     * Return: array or int
     *
     * */
    public function getMeetingByID($meetingId): array|int
    {
        $sqlStatement = "SELECT meeting.id,
                                meeting.date 'date_reserved',
                                meeting.time 'time_reserved',
                                meeting.state,
                                meeting.timeslotId,
                                meeting.callerId,
                                meeting.meeting_type,
                                meeting.virtual_meeting,
                                meeting.contact,
                                t.startTime 'startTime',
                                t.endTime 'endTime',
                                s.date 'date'
                        FROM meeting JOIN timeslot t ON t.timeslotId = meeting.timeslotId JOIN 
                             shift s ON s.shiftId = t.shiftId 
                        WHERE meeting.id = ".$meetingId;

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Function: deleteOldPendingAppointments
     * Operation: Delete all old pending appointments
     * Parameter:
     * Return:
     *
     * */
    public function deleteOldPendingAppointments(){
        //delete old pending appointments
        $sqlStatement = "DELETE FROM meeting 
                         WHERE id IN (SELECT m.id FROM meeting m
                                        LEFT JOIN timeslot t ON m.timeslotId = t.timeslotId
                                        LEFT JOIN shift s ON s.shiftId = t.shiftId
                                      WHERE s.date < DATE (NOW()) AND m.state = ".CommonConstants::STATE_PENDING.")";

        $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);
    }

    /*
     * Function: getAllPendingAppointmentsByUser
     * Operation: Get all pending appointments by user
     * Parameter: userId
     * Return: Array, boolean or int
     *
     * */
    public function getAllPendingAppointmentsByUser($userId): array|bool|int
    {
        //delete old pending appointments
        $this->deleteOldPendingAppointments();

        $sqlStatement = "SELECT m.id,
                                m.state,
                                m.timeslotId,
                                m.callerId,
                                m.meeting_type,
                                m.contact,
                                m.virtual_meeting,
                                t.startTime,
                                t.endTime,
                                t.shiftId,
                                s.date
                        FROM meeting m LEFT JOIN
                             timeslot t on m.timeslotId = t.timeslotId LEFT JOIN
                             shift s on t.shiftId = s.shiftId
                        WHERE m.callerId = $userId AND m.state = ".CommonConstants::STATE_PENDING." 
                        ORDER BY s.date";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

    }

    /*
     * Function: getAllMeetingsByUser
     * Operation: Get all meeting data by using user id and date
     * Parameter: user id
     * Return: array or int
     *
     * */
    public function getAllMeetingsByUser($userId): array|int
    {

        $sqlStatement = "SELECT m.id, 
                                m.state, 
                                m.timeslotId, 
                                m.callerId, 
                                m.meeting_type, 
                                t.startTime, 
                                t.endTime, 
                                t.shiftId, 
                                s.date
                         FROM meeting m 
                             LEFT JOIN timeslot t 
                             on m.timeslotId = t.timeslotId 
                             LEFT JOIN shift s 
                                 on t.shiftId = s.shiftId
                         WHERE m.callerId = ".$userId." ORDER BY s.date";

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Function: getPendingMeetingsByUser
     * Operation: Get meetings data by using user id and date
     * Parameter: user id , date
     * Return: array or int
     *
     * */
    public function getPendingMeetingsByUser($userId, $date): array|bool|int
    {

        //check date available
        if (!empty($date)){
            //load meeting info for given date
            $sqlStatement = "SELECT m.id, m.state, m.timeslotId, m.callerId, m.meeting_type, t.startTime, t.endTime, s.shiftId,s.date
                         FROM meeting m JOIN timeslot t on t.timeslotId = m.timeslotId
                                        JOIN shift s on s.shiftId = t.shiftId
                         WHERE m.state = ".CommonConstants::STATE_PENDING." AND
                               m.callerId = $userId AND
                               S.date = '$date'";
        } else {
            //load all meeting info
            $sqlStatement = "SELECT m.id, m.state, m.timeslotId, m.callerId, m.meeting_type, t.startTime, t.endTime, s.shiftId,s.date
                         FROM meeting m JOIN timeslot t on t.timeslotId = m.timeslotId
                                        JOIN shift s on s.shiftId = t.shiftId
                         WHERE m.state = ".CommonConstants::STATE_PENDING." AND
                               m.callerId = $userId AND";
        }

        if (!empty($sqlStatement)){
            return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        }

        return false;

    }

    /*
     * Function: getMeetingByID
     * Operation: Get meeting data by using meeting id
     * Parameter: meeting id
     * Return: array or int
     *
     * */
    public function reservationLimit_check($userId,$date)
    {
        //get schedule start and end date using date
        $sql = "SELECT startDate, endDate FROM ".$this->schedule_table."
                WHERE startDate<='$date' and endDate>='$date'";
        $scheduleDuration = $this->customSqlQuery($sql, DatabaseService::FETCH_ALL);

        if (empty($scheduleDuration)){
            return -1;
        } else{

            $start = null;
            $end = null;

            foreach ($scheduleDuration as $row){
                $start = $row['startDate'];
                $end = $row['endDate'];
            }

            //get all meetings in schedule start date to end date for given user
            if (isset($start,$end)){
                $sql = "SELECT COUNT(id) AS count 
                        FROM ".$this->meeting_table." 
                        WHERE state = ".CommonConstants::STATE_PENDING." AND 
                        callerId = ".$userId." AND
                        date BETWEEN '$start' AND '$end'";


                $result = $this->customSqlQuery($sql, DatabaseService::FETCH_ALL);

                if(isset($result)){
                    foreach ($result as $row){
                        $count = $row['count'];
                    }

                    if (isset($count)){
                        $result = $this->select($this->limit_table,
                            array("limit_value"),
                            array("id=".CommonConstants::RESERVATION_LIMIT),
                            DatabaseService::FETCH_ALL);

                        if (!empty($result)){
                            foreach ($result as $row){
                                $limit = $row['limit_value'];
                            }

                            if (isset($limit)){
                                if ($limit > $count) return $limit - $count;
                            }
                        }
                    }
                }
            }
        }

        return false;

    }

    public function countCallerMeetings($userId): int|bool|array
    {
        $sqlStatement = "SELECT COUNT(id) count FROM meeting WHERE callerId = ".$userId." AND state = ".CommonConstants::STATE_FINISHED;
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

}