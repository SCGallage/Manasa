<?php

namespace models;

use core\Model;

class meeting extends Model
{
    private string $id;
    private string $date;
    private string $time;
    private string $state;
    private string $timeslotId;
    private string $callerId;
    private string $meeting_type;

    public function __construct()
    {
        parent::__construct();
    }
}