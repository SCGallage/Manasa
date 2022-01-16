<?php

namespace models\supportgroup;

use core\DatabaseService;
use core\Request;
use core\Model;
use util\CommonConstants;

class SgEnroll extends Model
{
    private string $table = "sg_enrollrequest";

    public function __construct()
    {
        parent::__construct();
    }


    /*
     * Function: addRequest
     * Operation: add new support join request record
     * Parameters: array of values for sg_enrollrequest table
     * Return:
     *
     * */
    public function addRequest(array $supportGroupEnrollRequest): bool|int
    {
        return $this->insert($this->table, $supportGroupEnrollRequest);
    }

    /*
     * Function: removeRequest
     * Operation: remove existing support group join request record from sg_enrollrequest table
     * Parameters: array of values for sg_enrollrequest table
     * Return:
     *
     * */
    public function leaveSupportGroup($sgId, $userId): bool|int
    {
//        return $this->delete($this->table,
//                        array("supportGroupId= $sgId", "callerId = $userId", "state = ".CommonConstants::STATE_ACCEPTED));

        $sql = "DELETE FROM ".$this->table."
                WHERE supportGroupId=".$sgId." AND
                      callerId=".$userId." AND
                      state=".CommonConstants::STATE_ACCEPTED;

        return $this->customSqlQuery($sql, DatabaseService::FETCH_COUNT);

    }

    /*
     * Function: findSupportGroupRequestByIdAndState
     * Operation: find support group join request from sg_enrollrequest using given id and state
     * Parameters: userId(callerId), sgId(supportGroupId), state
     * Return: one support group join request record
     *
     * */
    public function findSupportGroupRequestByIdAndState($userId, $sgId, $state): array|bool|int
    {
        $sqlStatement = "SELECT * FROM sg_enrollrequest WHERE 
                                     supportGroupId = $sgId AND 
                                     callerId = $userId AND
                                     state = $state";
        return $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }



    /*
    * Function: findSupportGroupRequestById
    * Operation: find support group join request from sg_enrollrequest using given id
    * Parameters: userId(callerId), sgId(supportGroupId)
    * Return: one support group join request record
    *
    * */
    public function findSupportGroupRequestById($userId, $sgId)
    {
        $sqlStatement = "SELECT * 
                         FROM sg_enrollrequest 
                         WHERE supportGroupId = ".$sgId." AND 
                               callerId = ".$userId;
        return $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    /*
    * Function: getMemberListById
    * Operation: find and return members of the support group
    * Parameters: sgId(supportGroupId)
    * Return: array of support member information
    *
    * */
    public function getMemberListById($sgId): array|bool|int
    {
        $sqlStatement = "SELECT c.fname, c.lname 
                         FROM sg_enrollrequest sge join caller c on sge.callerId = c.id
                         WHERE sge.supportGroupId = ".$sgId." AND
                               sge.state = ".CommonConstants::STATE_AVAILABLE;

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

    }

}