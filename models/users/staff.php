<?php

namespace models\users;

use core\Model;

class staff extends Model
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

    public function __construct()
    {
        parent::__construct();
    }
}