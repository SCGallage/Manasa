<?php

namespace models\supportgroup;

use core\DatabaseService;
use core\Model;

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


    public function findAllSupportGroupsWithRequestsByUserId($userId)
    {
        $sqlStatement = "SELECT * FROM supportgroup LEFT JOIN sg_enrollrequest se ON supportgroup.id = se.supportGroupId WHERE callerId = ".$userId;
        return $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function findAllSupportGroups()
    {
        $sqlStatement = "SELECT * FROM supportgroup";
        return $result = $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }


    public function __construct()
    {
        parent::__construct();
    }

}