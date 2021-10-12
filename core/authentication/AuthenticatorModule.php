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

    public function __construct(Database $database)
    {
        $this->databaseService = new DatabaseService($database);
        $this->mailer = new Mailer();
        $this->securityToken = new SecurityToken();
    }

    public function reset_mail(string $email, string $token)
    {
        $this->mailer->init('smtp.gmail.com', $_ENV["SEND_EMAIL"], $_ENV["PASSWORD"]);
        $this->mailer->configure_email($_ENV["SEND_EMAIL"], $email);
        $this->mailer->loadTemplate("Forgot Password", "forgotPasswordTemplate", "\"http://localhost:80/resetpassword?token=$token\"");
        $this->mailer->sendMail();

    }

    public function generate_reset_entry(string $email)
    {
        $token = $this->securityToken->generateToken(16);

        $result = $this->databaseService->insert(
            'pr_token', [
                'token' => $token,
                'email' => $email
            ]
        );

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

}