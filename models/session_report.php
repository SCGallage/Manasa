<?php

namespace models;

use core\Model;

class session_report extends Model
{

    private string $id;
    private string $date;
    private string $meetingId;
    private string $befrienderId;

    public function __construct()
    {
        parent::__construct();
    }

}