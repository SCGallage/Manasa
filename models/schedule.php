<?php

namespace models;

use core\DatabaseService;
use core\Model;

class schedule extends Model
{
    private string $scheduleId;
    private string $startDate;
    private string $endDate;

    public function __construct()
    {
        parent::__construct();
    }

    public function getCurrentSchedule(){
        $scheduleData1 = new schedule();
        $sqlStatement1 = "select * from schedule where week(startDate)=week(now())";
        $scheduleInfo =  $scheduleData1->customSqlQuery($sqlStatement1,DatabaseService::FETCH_ALL);
        return $scheduleInfo;
    }
}