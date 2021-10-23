<?php

namespace models\users;
use core\Model;

class Staff extends Model
{

    public function saveStaff($befriender)
    {
        $this->insert( "staff",[
            "id" => $befriender['lastId'],
            "fname" => $befriender['fname'],
            "lname" => $befriender['lname'],
            "type" => $befriender['usertype'],
            "cv" => $befriender['cv']
        ]);
    }

}