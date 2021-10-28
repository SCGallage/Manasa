<?php

namespace models\users;
use core\Model;

class Staff extends Model
{

    private string $id;
    private string $fname;
    private string $lname;
    private string $cv;
    private string $dob;
    private string $type;
    private string $state;
    private string $email;
    private string $username;
    private string $password;
    private string $gender;

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

    public function saveAdmin($befriender)
    {
        $this->insert( "staff",[
            "id" => $befriender['lastId'],
            "fname" => $befriender['fname'],
            "lname" => $befriender['lname'],
            "type" => $befriender['usertype'],
            "state" => $befriender['state']
        ]);
    }
    public function __construct()
    {
        parent::__construct();
    }
}