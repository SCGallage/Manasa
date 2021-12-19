<?php

namespace models\supportgroup;

use core\DatabaseService;
use core\Request;
use core\Model;

class SgEnroll extends Model
{
    private $table = "sg_enrollrequest";

    /*
     * Function: addRequest
     * Operation: add new support join request record
     * Parameters: array of values for sg_enrollrequest table
     * Return:
     *
     * */
    public function addRequest(array $supportGroupEnrollRequest)
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
    public function removeRequest(array $supportGroupEnrollRequest)
    {
        return $this->delete($this->table, $supportGroupEnrollRequest);
    }

    /*
     * Function: findSupportGroupRequestByIdAndState
     * Operation: find support group join request from sg_enrollrequest using given id and state
     * Parameters: userId(callerId), sgId(supportGroupId), state
     * Return: one support group join request record
     *
     * */
    public function findSupportGroupRequestByIdAndState($userId, $sgId, $state)
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
        $sqlStatement = "SELECT * FROM sg_enrollrequest WHERE 
                                     supportGroupId = $sgId AND 
                                     callerId = $userId";
        return $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

}