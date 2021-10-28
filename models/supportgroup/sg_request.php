<?php

namespace models\supportgroup;

use core\DatabaseService;
use core\Model;

class sg_request extends Model
{
    private string $id;
    private string $befrienderId;
    private string $name;
    private string $capacity;
    private string $type;
    private string $reason;

//    public function getSupportGroupRequests(int $supportGroupID){
//        $sqlStatement = "SELECT caller.id, caller.fname, caller.lname
//        FROM caller, sg_enrollrequest
//        WHERE sg_enrollrequest,supportGroupID =1 AND sg_enrollrequest.state='pending' AND caller.id = sg_enrollrequest.callerId";
//        return $this->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
//    }
//
//    public function supportGroupRequestDecision(array $sgRequestDetails){
//        $result = $this->update("sg_enrollrequest",["state" => $sgRequestDetails["type"]],["supportGroupId" => $sgRequestDetails["supportGroupId"], "callerId" => $sgRequestDetails["callerId"] ]);
//        return["result" => $result];
//    }

    public function sendApprovedMail($username, $email)
    {
        $mailer = new Mailer();
        $mailer->init('smtp.gmail.com', $_ENV['SEND_EMAIL'], $_ENV['PASSWORD']);
        $mailer->configure_email($_ENV['SEND_EMAIL'], $email);
        $mailer->loadTemplate("Welcome To Manasa!", "registerTemplate", $username);
        $mailer->sendMail();
    }
    public function __construct()
    {
        parent::__construct();
    }
}