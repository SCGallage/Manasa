<?php

namespace models\users;

use core\Application;
use core\DatabaseService;
use core\Mailer;
use core\Model;
use core\Request;
use core\sessions\SessionManagement;
use Google\Client;
use Google\Service\Oauth2;
use Google_Client;
use Google_Service_Oauth2;
use http\Cookie;

class User extends Model
{
    private string $userid;
    private string $google_id;
//    private string $firstname;
//    private string $lastname;
    private string $email;
    private string $password;
    private string $username;
    private string $gender;
    private string $dateOfBirth;
    private string $type;

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
//    private string $cv_file_name;

    public function login(array $login)
    {
        $data = $this->select('user', '*', [ "email" => $login['email'] ], DatabaseService::FETCH_ALL);

        if (($data[0]['email'] === $login['email'])  && password_verify($login['password'], $data[0]['password'])  ) {
            $user = $this->select($data[0]['type'], "*", [ 'id' => $data[0]['id'] ], DatabaseService::FETCH_ALL);
            //print_r($user);
            //return $user[0]['type'];
            return ["user_id" => $data[0]['id'], "username" => $data[0]['username'], "user_type" => $user[0]['type'], "profile_pic" => $data[0]['profile_pic']];
        }

        return false;
    }

    public function register(array $userdata)
    {
        if ($userdata['password'] === $userdata['conpassword']) {
            $userdata['password'] = password_hash($userdata['password'], PASSWORD_BCRYPT);
            print_r($userdata);
            return $this->save($userdata);
        }
    }

    public function logout()
    {
        //session_start();
        session_unset();
        session_destroy();
    }

    public function resetPassword()
    {

    }

    public function sendRegistrationEmail($username, $email)
    {
        $mailer = new Mailer();
        $mailer->init('smtp.gmail.com', 'jw8041360@gmail.com', 'riseofrome');
        $mailer->configure_email('jw8041360@gmail.com', $email);
        $mailer->loadTemplate("Welcome To Manasa!", "registerTemplate", $username);
        $mailer->sendMail();
    }

    public function checkGoogleLoginExists(string $google_id)
    {
        $queryData = $this->select("user", [ "id","type" ], [ "google_id" => $google_id ], DatabaseService::FETCH_ALL);
        if (count($queryData) === 1) {
            $userType = $this->select($queryData[0]["type"], [ "type" ], [ "id" => $queryData[0]["id"] ], DatabaseService::FETCH_ALL);
            return $userType[0]["type"];
        }

        return false;
    }

}