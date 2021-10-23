<?php


namespace models\users;


use core\Model;

class Befriender extends Model
{

    public function addSupportGroupRequest(array $supportGroupRequest)
    {
        return $this->insert("sg_request", $supportGroupRequest);
    }

}