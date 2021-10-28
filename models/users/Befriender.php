<?php


namespace models\users;


use core\DatabaseService;
use core\Model;

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

}