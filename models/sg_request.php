<?php

namespace models;

use core\Model;

class sg_request extends Model
{
    private string $id;
    private string $befrienderId;
    private string $name;
    private string $capacity;
    private string $type;
    private string $reason;

    public function __construct()
    {
        parent::__construct();
    }
}