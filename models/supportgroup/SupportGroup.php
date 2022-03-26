<?php

namespace models\supportgroup;

use core\DatabaseService;
use core\Model;
use util\CommonConstants;

class SupportGroup extends Model
{
    private string $id;
    private string $name;
    private string $type;
    private string $description;
    private string $facilitator;
    private string $co_facilitator;
    private string $state;
    private string $participants;

    private string $sg_table = 'supportgroup';
    private string $sg_event_participate = "sg_eventparticipate";
    private string $sg_event_table = "sg_event";

    public function getSupportGroupRequests(int $supportGroupId)
    {
        $sqlStatement = "SELECT caller.id, caller.fname, caller.lname, user.profile_pic, user.username
                    FROM caller, sg_enrollrequest, user
                    WHERE sg_enrollrequest.supportGroupId = 1 AND sg_enrollrequest.state = 'pending' AND caller.id = sg_enrollrequest.callerId AND caller.id = user.id";
        $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
//        echo dirname(__DIR__, 2).$_ENV['PROFILE_LOCATION'];
        for ($i = 0; $i < count($result); $i++) {
            $filePath = dirname(__DIR__, 2).$_ENV['PROFILE_LOCATION']."\\{$result[$i]['profile_pic']}";
            $result[$i]['profile_pic'] = base64_encode(fread(fopen($filePath, 'r'), filesize($filePath)));
        }
        return $result;
        //return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function supportGroupRequestDecision(array $sgRequestDetails)
    {
        $result = $this->update("sg_enrollrequest",
            [ "state" => $sgRequestDetails["type"] ],
            [ "supportGroupId" => $sgRequestDetails["supportGroupId"], "callerId" => $sgRequestDetails["callerId"] ]);
        //print_r($sgRequestDetails);
        return [ "result" => $result ];
    }

    public function getSupportGroupMembers(int $supportGroupId)
    {
        $sqlStatement = "SELECT caller.id, caller.fname, caller.lname, user.profile_pic, user.username
                    FROM caller, sg_enrollrequest, user
                    WHERE sg_enrollrequest.supportGroupId = 1 AND sg_enrollrequest.state = 'approved' AND caller.id = sg_enrollrequest.callerId AND caller.id = user.id";
        $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        for ($i = 0; $i < count($result); $i++) {
            $filePath = dirname(__DIR__, 2).$_ENV['PROFILE_LOCATION']."\\{$result[$i]['profile_pic']}";
            $result[$i]['profile_pic'] = base64_encode(fread(fopen($filePath, 'r'), filesize($filePath)));
        }
        return $result;
    }

    public function removeMemberFromSupportGroup(array $memberDetails)
    {
        $result = $this->delete("sg_enrollrequest",
            [ "supportGroupId" => $memberDetails["supportGroupId"], "callerId" => $memberDetails["callerId"] ]);
        return [ "result" => $result ];
    }


    /*
     * Function: findAllSupportGroupsWithRequestsByUserId
     * Operation: find all support group requests with all support group details using given user id
     * Parameters: userId (callerId)
     * Return: all support group records where caller id in sg_enrollrequest table
     *
     * */
    public function findAllSupportGroupsWithRequestsByUserId($userId)
    {
        $sqlStatement = "SELECT * 
                         FROM supportgroup LEFT JOIN sg_enrollrequest se 
                         ON supportgroup.id = se.supportGroupId 
                         WHERE callerId = ".$userId;
        return $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Function:findAllSupportGroups
     * Operation: find all support group records in supportgroup table
     * Parameters:
     * Return:r return all records of supportgroups table
     *
     * */
    public function findAllSupportGroups()
    {
        $sqlStatement = "SELECT * FROM supportgroup WHERE state = ".CommonConstants::STATE_ACCEPTED;
        return $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function getSupportGroupById($sgId){
        $sqlStatement = "SELECT * FROM ".$this->sg_table." WHERE id =".$sgId;
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Function:get_sg_events_by_id
     * Operation: find all support group events in sg_event by support group id
     * Parameters: int support group id
     * Return: array of support group events
     *
     * */
    public function get_sg_events_by_sg_id(int $sgId): array|bool|int
    {
        $sqlStatement = "SELECT *
                         FROM ".$this->sg_event_table."
                         WHERE ".$this->sg_event_table.".supportGroupId = ".$sgId ." AND
                               ".$this->sg_event_table.".eventDate >= DATE (NOW())";
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Function:get_sg_event_by_id
     * Operation: find event data
     * Parameters: event id
     * Return: event record
     *
     * */
    public function get_sg_event_by_id($userId, $eventId): int|bool|array
    {

        //check participation
        if (!empty($this->customSqlQuery(
                "SELECT * FROM ".$this->sg_event_participate." 
                         WHERE eventId = ".$eventId." AND callerId = ".$userId,
                DatabaseService::FETCH_ALL
        ))){

            $sqlStatement = "SELECT * 
                             FROM ".$this->sg_event_table." e LEFT JOIN ".$this->sg_event_participate." se on e.id = se.eventId 
                                     LEFT JOIN virtual_meeting vm on e.virtualMeetingId = vm.meetingId
                             WHERE e.id = ".$eventId." AND se.callerId = ".$userId;

            return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        } else {
            return $this->select($this->sg_event_table,
                                array("*"),
                                array("id=".$eventId),
                                DatabaseService::FETCH_ALL);
        }
    }

    /*
     * Function:participateSgEvent
     * Operation: save support group event participation
     * Parameters: user id, event id
     * Return: int | bool
     *
     * */
    public function participateSgEvent($userId, $eventId){
        $columns = ['eventId' => $eventId, 'callerId' => $userId];
        return $this->insert($this->sg_event_participate, $columns, DatabaseService::FETCH_COUNT);
    }

    /*
     * Function:get_sg_events_by_id
     * Operation: find all support group events in sg_event by support group id
     * Parameters: int support group id
     * Return: array of support group events
     *
     * */
    public function get_sg_event_participate_member($userId, $sgId): array|bool|int
    {
        $sqlStatement = "SELECT *
                         FROM ".$this->sg_event_table." eve RIGHT JOIN ".$this->sg_event_participate." par
                                ON eve.id = par.eventId 
                         WHERE eve.supportGroupId = ".$sgId." AND par.callerId = ".$userId;
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
     * Function:get_sg_event_participant_count
     * Operation: find number of participants for a given sg event
     * Parameters: event id
     * Return: participant count
     *
     * */
    public function get_sg_event_participant_count($eventId): int
    {
        $sqlStatement = "SELECT COUNT(callerId) AS participants 
                         FROM ".$this->sg_event_participate." 
                         WHERE eventId = ".$eventId;
        return intval($this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL)[0]['participants']);

    }

    /*
     * Function:cancelSgEventParticipation
     * Operation: remove sg event participation record
     * Parameters: event id, user id
     * Return: int
     *
     * */
    public function cancelSgEventParticipation($eventId, $userId): bool|int
    {
        return $this->customSqlQuery(
            "DELETE FROM ".$this->sg_event_participate." 
            WHERE eventId = ".$eventId." AND callerId = ".$userId,
            DatabaseService::FETCH_COUNT
        );
    }

    /*
     * Function:get_befrienders_by_sg_id
     * Operation: find facilitator info of the support group
     * Parameters: int support group id
     * Return: facilitator info
     *
     * */
    public function get_befrienders_by_sg_id(int $sgId): array|bool|int
    {
        $sqlStatement = "SELECT s.id, s.fname, s.lname, u.profile_pic, s2.facilitator, s2.co_facilitator
                         FROM staff s JOIN user u on u.id = s.id JOIN supportgroup s2 on s.id = s2.facilitator or s.id = s2.co_facilitator
                         WHERE s2.id = ".$sgId;

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function searchSg($key): array|bool|int
    {
        $sqlStatement = "SELECT *
                         FROM supportgroup
                         WHERE supportgroup.name LIKE '%".$key."%' OR
                               supportgroup.type LIKE '%".$key."%'";
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function __construct()
    {
        parent::__construct();
    }

}