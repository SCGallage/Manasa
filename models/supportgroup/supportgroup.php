<?php


namespace models\supportgroup;

use core\Model;
use core\DatabaseService;

class SupportGroup extends Model
{
    private string $id;
    private string $name;
    private string $type;
    private string $description;
    private string $facilitator;
    private string $co_facilitator;
    private string $state;
    private string $participants;

//    public function sgUpdate(int $request){
//        $sqlStatement = "SELECT * FROM supportgroup
//                         WHERE supportgroup.id = 45";
//        return ['sqlStatement'=>$sqlStatement];
//    }
//
    public function tableView(){
        $sqlStatement = "SELECT * FROM supportgroup
                        JOIN staff
                        ON supportgroup.facilitator = staff.id ,supportgroup.co_facilitator = staff.id";
        return $this->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
    }


    public function __construct()
    {
        parent::__construct();
    }

}