<?php

namespace models;

use core\Model;

class donate extends Model
{
    private string $id;
    private string $email;
    private string $date;
    private string $amount;

    public function __construct()
    {
        parent::__construct();
    }
}