<?php

namespace models;

use core\Model;

class staff extends Model
{
    private string $id;
    private string $fname;
    private string $lname;
    private string $cv;
    private string $startDate;
    private string $endDate;
    private string $type;
    private string $state;
    private string $email;

    public function __construct()
    {
        parent::__construct();
    }
}