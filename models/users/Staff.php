<?php

namespace models\users;
use core\Mailer;
use core\Model;

class Staff extends Model
{

    private string $id;
    private string $fname;
    private string $lname;
    private string $cv;
    private string $dob;
    private string $type;
    private string $state;
    private string $email;
    private string $username;
    private string $password;
    private string $gender;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFname(): string
    {
        return $this->fname;
    }

    /**
     * @return string
     */
    public function getLname(): string
    {
        return $this->lname;
    }

    /**
     * @return string
     */
    public function getCv(): string
    {
        return $this->cv;
    }

    /**
     * @return string
     */
    public function getDob(): string
    {
        return $this->dob;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }


    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $fname
     */
    public function setFname(string $fname): void
    {
        $this->fname = $fname;
    }

    /**
     * @param string $lname
     */
    public function setLname(string $lname): void
    {
        $this->lname = $lname;
    }

    /**
     * @param string $cv
     */
    public function setCv(string $cv): void
    {
        $this->cv = $cv;
    }

    /**
     * @param string $dob
     */
    public function setDob(string $dob): void
    {
        $this->dob = $dob;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function saveStaff($befriender)
    {
        $this->insert( "staff",[
            "id" => $befriender['lastId'],
            "fname" => $befriender['fname'],
            "lname" => $befriender['lname'],
            "type" => $befriender['usertype'],
            "cv" => $befriender['cv']
        ]);
    }

    public function saveAdmin($befriender)
    {
        $this->insert( "staff",[
            "id" => $befriender['lastId'],
            "fname" => $befriender['fname'],
            "lname" => $befriender['lname'],
            "type" => $befriender['usertype'],
            "state" => $befriender['state']
        ]);
    }

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