<?php

namespace core\authentication;
use core\Database;
use core\DatabaseService;
use core\Mailer;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AuthenticatorModule
{

    private SecurityToken $securityToken;
    private DatabaseService $databaseService;
    private Mailer $mailer;
    //private \PDO $pdo;

    /*public function __construct(Mailer $mailer, SecurityToken $securityToken, DatabaseService $databaseService)
    {
        $this->databaseService = $databaseService;
        $this->mailer = $mailer;
        $this->securityToken = $securityToken;
    }*/

    public function __construct(Database $database)
    {
        $this->databaseService = new DatabaseService($database);
        $this->mailer = new Mailer();
        $this->securityToken = new SecurityToken();
    }

    public function reset_mail(string $email, string $token)
    {
        $this->mailer->init('smtp.gmail.com', 'jw8041360@gmail.com', 'riseofrome');
        $this->mailer->configure_email('jw8041360@gmail.com', $email);
        $this->mailer->setContent(true, 'Password Reset', "Password Reset Link : http://localhost:80/update?token=$token");
        $this->mailer->sendMail();
    }

    public function generate_reset_entry(string $email)
    {
        $token = $this->securityToken->generateToken(16);
        $columns = $this->databaseService->insert_columns([
            'token' => $token,
            'email' => $email
        ], 1);
        print_r($columns);
        //$this->databaseService->array_map_assoc()
        $result = $this->databaseService->insert(
            'password_reset',
            $columns
        );
        /*$sql = "INSERT INTO password_reset(token, email)
                VALUES ('$token', '$email')";
        $result = $this->pdo->exec($sql);*/
        if ($result)
            $this->reset_mail($email, $token);
    }

    public function update_password(string $password, string $email, string $token)
    {
        $this->databaseService->update('registerModel',
            [ 'password' => password_hash($password, PASSWORD_BCRYPT) ],
            [ 'email' => $email ]);
        $this->databaseService->update('password_reset',
            [ 'used' => 1 ],
            [ 'token' => $token ]);
    }

    public function check_token($token)
    {
        /*$sql = "SELECT used FROM password_reset WHERE token = '$token'";
        $result = $this->pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);*/

        $result = $this->databaseService->select(
            'password_reset',
            [ 'used', 'email' ],
            [ 'token' => $token ]
        , DatabaseService::FETCH_ALL);
        print_r($result);

        if ($result[0]['used'])
        {
            echo 'This token is already expired'.PHP_EOL;
            return false;
        }
        else
        {
            if ($this->date_difference($token) >= 1)
            {
                /*$update = "UPDATE password_reset SET used = true WHERE token = '$token'";
                $this->pdo->exec($update);*/
                $this->databaseService->update(
                    'password_reset',
                    [ 'used' => true ],
                    [ 'token' => $token ]
                );
                return false;
            }
            else
            {
                return $result[0]['email'];
            }
        }
    }

    public function date_difference($token) : int
    {
        /*$sql = "SELECT date_time FROM password_reset WHERE token = '$token'";
        $result = $this->pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);*/
        $result = $this->databaseService->select(
            'password_reset',
            [ 'date_time' ],
            [ 'token' => $token ]
        ,DatabaseService::FETCH_ALL);
        echo $result['date_time'];
        try {
            $current_timestamp = new \DateTime(null, new \DateTimeZone('Asia/Colombo'));
            $token_timestamp = new \DateTime($result['date_time'], new \DateTimeZone('Asia/Colombo'));
            $interval = $current_timestamp->diff($token_timestamp);
            return $interval->h + ($interval->days * 24);
        } catch (\Exception $e) {
            echo $e->getTrace();
            return -1;
        }
    }

    public function check_user(string $tableName, string $email, string $password) : bool
    {
        $sql = "SELECT password FROM $tableName WHERE email = '$email'";
        if ($this->pdo->query($sql)->rowCount() == 1) {
            $result = $this->pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);
            if (password_verify($password, $result['password']))
                return true;
            else
                return false;
        } else{
            return false;
        }
    }

    public function check_email(string $tableName, string $email)
    {
        $sql = "SELECT password FROM $tableName WHERE email = '$email'";
        if ($this->pdo->query($sql)->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser($fname, $lname, $email, $password)
    {
        /*$sql = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
        $this->pdo->exec($sql);*/
        $this->databaseService->insert(
            'user',
            [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'password' => $password
            ]
        );
    }

    public function google_signup() : void
    {
        $id_token = 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjY5ZWQ1N2Y0MjQ0OTEyODJhMTgwMjBmZDU4NTk1NGI3MGJiNDVhZTAiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiNzE2NzkyNTk1NjU2LTNmdDlobGpqZTM0cDk2NXB2ZW91NGFvOGx1OHRsN2xoLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXVkIjoiNzE2NzkyNTk1NjU2LTNmdDlobGpqZTM0cDk2NXB2ZW91NGFvOGx1OHRsN2xoLmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwic3ViIjoiMTAzMjc3NzMwOTg1NjI4MDQ2MDA1IiwiZW1haWwiOiJnYWxsYWdlc2Fua2EwM0BnbWFpbC5jb20iLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXRfaGFzaCI6IngzOGQtTE42U3pOSlkxX1R2OGJRR3ciLCJuYW1lIjoiU2Fua2EgR2FsbGFnZSIsInBpY3R1cmUiOiJodHRwczovL2xoMy5nb29nbGV1c2VyY29udGVudC5jb20vYS0vQU9oMTRHaG5Yb0RGNlA4eXpxZVppX3Y2RmcwN1k4WDVkMVVWMDczRTVUZTc9czk2LWMiLCJnaXZlbl9uYW1lIjoiU2Fua2EiLCJmYW1pbHlfbmFtZSI6IkdhbGxhZ2UiLCJsb2NhbGUiOiJlbiIsImlhdCI6MTYyMDk3MTg4NCwiZXhwIjoxNjIwOTc1NDg0LCJqdGkiOiI1ZGJhNWQ0MTRmY2EwMTViN2U4YmRjNWUwNWE0NWNkYzMyNmRmNjhjIn0.dQQUpxnye2TW69T1oNRCsFp7LySh1ZCX_qNYodY4LKTmV4T0pa5CgAAmYv3HiFVCJlEJ20YO9UUn-5FhHfs7zK9ssgMG9hlqcl0aFDXt9HZoH113YuBvZIX66Mc_R7psgOCER9X5sTVTEBR4iqi99tDw2JuttHGpQHMuudE405M-3GOqNTB-3qvnWoECL_QhjntAcyxY04xIUPRupeQATQ6XHB2j1JdRD8JGKV4CL5YphMzJ3NXuUvZl1Vb_iqgEWm2eTPClT0PZlrTqpEabAkr12By7gbBt1ZD4__YrQqLdZMOSIX23efgvhk9rsB3UNHheVVzEbFSdiOkX8jeokg';

        $CLIENT_ID = '716792595656-3ft9hljje34p965pveou4ao8lu8tl7lh.apps.googleusercontent.com';
        $client  = new \Google_Client(['client_id' => $CLIENT_ID]);
        $payload = $client->verifyIdToken($id_token);

        if ($payload){
            //print_r($payload);
            $sub = $payload['sub'];
            $email = $payload['email'];
            $fName = $payload['given_name'];
            $lName = $payload['family_name'];
            $pic_url = $payload['picture'];
            echo $lName;
            $sql = "INSERT INTO google_users
            VALUES ('$sub', '$email', '$fName', '$lName')";
            $this->pdo->exec($sql);
        } else {
            echo "invalid Token";
        }
    }

}