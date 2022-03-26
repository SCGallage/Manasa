<?php

namespace models;

use core\Model;

class shift extends Model
{

    private string $shiftId;
    private string $startTime;
    private string $endTime;
    private string $date;
    private string $scheduleId;
    private string $state;
    private string $num_of_befrienders;

    public function __construct()
    {
        parent::__construct();
    }
}