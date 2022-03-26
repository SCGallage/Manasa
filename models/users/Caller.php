<?php

namespace models\users;

use core\DatabaseService;
use core\Model;
use util\CommonConstants;

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
        $sqlStatement = "SELECT caller.id,
                                u.username,
                                caller.fname,
                                caller.lname,
                                u.dateOfBirth,
                                u.gender,
                                u.registration_date,
                                u.email,
                                u.email_verified
                        FROM caller LEFT JOIN user u on u.id = caller.id
                        WHERE caller.id = ".$userId;
        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function updateCaller($request, $userId): bool
    {

        $sqlStatement = "UPDATE caller
                         SET fname = '".$request['fname']."', 
                             lname = '".$request['lname']."' 
                         WHERE id = ".$userId;

        if ($this->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT)) {

            //set gender
            if ($request['gender'] == CommonConstants::USER_GENDER_MALE){
                $request['gender'] = "M";
            } else if($request['gender'] == CommonConstants::USER_GENDER_FEMALE) {
                $request['gender'] = "F";
            } else {
                $request['gender'] = "O";
            }

            $sqlStatement = "UPDATE user
                             SET dateOfBirth = '".$request['dateOfBirth']."', 
                                 username = '".$request['username']."', 
                                 gender = '".$request['gender']."'
                             WHERE id = ".$userId;

            if ($this->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT))
                return true;
        }

        return false;
    }

}