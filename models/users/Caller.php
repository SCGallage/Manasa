<?php

namespace models\users;

use core\DatabaseService;
use core\Model;

class Caller extends Model
{

    private int $id;
    private string $fname;
    private string $lname;
    private int $phone;
    private string $type;

    public function saveCaller(array $caller)
    {
        $this->insert( "caller",[
            "id" => $caller['lastId'],
            "fname" => $caller['fname'],
            "lname" => $caller['lname'],-
            "type" => $caller['usertype'],
        ]);
    }

    public function loadCallerInfo($userId): int|array
    {
        $conditions = [
            'id' => $userId
        ];
        return $this->select('user', ['*'], $conditions, DatabaseService::FETCH_ALL);
    }

}