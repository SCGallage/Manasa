<?php

namespace models\users;
use core\DatabaseService;
use core\Model;
use util\CommonConstants;
class Volunteer extends Model
{
    public function getVolunteerById($userId): array|bool|int
    {
        $sqlStatement = "SELECT *
                         FROM staff LEFT JOIN user u on u.id = staff.id
                         WHERE staff.id = ".$userId;

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function eventsParticipated($userId): array|bool|int
    {
        $sqlStatement = "SELECT COUNT(volunteer_participate.eventId) events 
                         FROM volunteer_participate LEFT JOIN volunteer_event ve on ve.id = volunteer_participate.eventId
                         WHERE volunteer_participate.volunteerId = ".$userId." AND ve.state = ".CommonConstants::STATE_FINISHED;

        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
    }

    public function updateVolunteer($request, $userId): bool
    {
        $sqlStatement = "UPDATE staff
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