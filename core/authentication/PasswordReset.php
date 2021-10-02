<?php


namespace core\authentication;


class PasswordReset
{

    public function generate_reset_entry(string $email)
    {
        $token = $this->securityToken->generateToken(16);
        $result = $this->databaseService->insert(
            'password_reset',
            [
                'token' => $token,
                'email' => $email
            ]
        );
        /*$sql = "INSERT INTO password_reset(token, email)
                VALUES ('$token', '$email')";
        $result = $this->pdo->exec($sql);*/
        if ($result)
            $this->reset_mail($email, $token);
    }

    public function check_token($token) : bool
    {
        /*$sql = "SELECT used FROM password_reset WHERE token = '$token'";
        $result = $this->pdo->query($sql)->fetch(\PDO::FETCH_ASSOC);*/

        $result = $this->databaseService->select(
            'password_reset',
            ['used'],
            [ 'token' => $token ]
        );

        if ($result['used'])
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
                return true;
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
        );
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