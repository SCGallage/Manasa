<?php

namespace models\users;

use core\Application;
use core\authentication\SecurityToken;
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
        $data = $this->select('user', '*', ["email" => $login['email']], DatabaseService::FETCH_ALL);

        if ($data[0]['type'] === 'staff') {
            $state = $this->select('staff', ["state"], ["id" => $data[0]['id']], DatabaseService::FETCH_ALL);
            if ($state[0]['state'] == 0)
                return false;
        }
        //SessionManagement::set_session_data('state', $state[0]['state']);
        if (($data[0]['email'] === $login['email']) && password_verify($login['password'], $data[0]['password'])) {


            if (($data[0]['email'] === $login['email']) && password_verify($login['password'], $data[0]['password'])) {
                $user = $this->select($data[0]['type'], "*", ['id' => $data[0]['id']], DatabaseService::FETCH_ALL);
                //print_r($user);
                //return $user[0]['type'];
                return ["user_id" => $data[0]['id'], "username" => $data[0]['username'], "user_type" => $user[0]['type'], "profile_pic" => $data[0]['profile_pic']];
            }

            return false;
        }
    }

        public function register(array $userdata)
    {
        if ($userdata['password'] === $userdata['conpassword']) {
            $userdata['password'] = password_hash($userdata['password'], PASSWORD_BCRYPT);
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
            print_r($userType);
            return $userType[0]["type"];
        }

        return false;
    }

        public function verifyEmail($token)
    {
        $data = $this->select('email_token', '*', [ 'token' => $token ], DatabaseService::FETCH_ALL);
        if (count($data) == 1) {

            $this->update('user', [ "email_verified" => 1 ], [ "email" => $data[0]['email'] ]);
            $this->delete('email_token', [ "email" => $data[0]['email'] ]);
        }
    }

        public function addEmailValidationRecord($email)
    {
        $token = SecurityToken::generateRandomToken(16);
        $result = $this->insert('email_token', [ "email" => $email, "token" => $token]);
        if ($result) {
            $mailer = new Mailer();
            $mailer->init('smtp.gmail.com', $_ENV['SEND_EMAIL'], $_ENV['PASSWORD']);
            $mailer->configure_email($_ENV['SEND_EMAIL'], $email);
            $mailer->loadTemplate("Confirm Your Email", "confirmEmailTemplate", $_ENV['BASE_URL'].'/verifyemail?token='.$token);
            $mailer->sendMail();
        }
    }

        public function updateUserProfilePicture($data, $userId)
        {
//        $this->delete('user', ["id" => $userId]);
        $data = explode(',', $data);
        $extension = explode(';', explode('/', $data[0])[1]);
        //echo $extension[0];
        $filename = microtime(true) * 10000.0 . "." . $extension[0];
        $fptr = fopen("./file_storage/profile_pictures/pictures/" . $filename, "wb");

        fwrite($fptr, base64_decode($data[1]));
        fclose($fptr);
        $result = $this->update('user', ["profile_pic" => $filename], ["id" => $userId]);
        return json_encode(["result" => $result]);
        //base64_decode($data);
        }

        public function saveDonation($request): bool|int
        {
            //$sql = "INSERT INTO donate (id, email, date, amount)
              //      VALUES (".$request['payment_id'].", '".$request['order_id']."', '".$request['date']."', ".$request['payhere_amount'].")";
            $columnsAndValues = [
                'id' => $request['payment_id'],
                'email' => $request['order_id'],
                'date' => $request['date'],
                'amount' => $request['payhere_amount']
            ];

            return $this->insert('donate', $columnsAndValues, DatabaseService::FETCH_COUNT);
        }

        public function loadUserInfo($userId): int|array
        {
            $conditions = [
                'id' => $userId
            ];
            return $this->select('user', ['*'], $conditions, DatabaseService::FETCH_ALL);
        }

        public function updateUser($request)
        {
            $columns = [
                'username' => $request['username'],
                'password' => $request['password'],
                'gender' => $request['gender'],
                'dateOfBirth' => $request['dateOfBirth']
            ];

            $conditions = ["id=" . $request['id']];
            return $this->update('user', $columns, $conditions);
        }
}