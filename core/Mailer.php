<?php

namespace core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    private PHPMailer $mail;

    public function __construct()
    {

        $this->mail = new PHPMailer();

    }

    /**
     * Mailer initializer.
     * @param $host
     * @param $username
     * @param $password
     */
    public function init($host, $username, $password)
    {
        //$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host = $host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username = $username;
        $this->mail->Password = $password;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;

    }

    public function configure_email(string $from, string $to, string $replyTo = null, string $cc = null, string $bcc = null)
    {
        try {
            $this->mail->setFrom($from);
            $this->mail->addAddress($to);
            if ($replyTo != null)
                $this->mail->addReplyTo($replyTo);

            if ($cc != null)
                $this->mail->addCC($cc);

            if ($bcc != null)
                $this->mail->addBCC($bcc);
        } catch (\Exception $exception) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }

    }

    public function addAttachment(string $location)
    {
        try {
            $this->mail->addAttachment($location);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function setContent(bool $isHTML, string $subject, string $body, string $altbody = null)
    {

        $this->mail->isHTML($isHTML);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        if ($altbody != null)
            $this->mail->AltBody = $altbody;

    }

    public function loadTemplate(string $subject, string $template, $params = '')
    {
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $mailBody = file_get_contents("C:\\xampp\\htdocs\\Manasa-v2\\templates\\".$template.".html");
        $mailBody = str_replace('{{resetLink}}', $params, $mailBody);
        $this->mail->Body = $mailBody;
    }


    public function sendMail()
    {
        try {
            $this->mail->send();
        } catch (\Exception $exception) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

}