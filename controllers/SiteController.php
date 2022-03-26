<?php
namespace controllers;

use core\Application;
use core\Mailer;
use core\Request;
use core\Controller;

class SiteController extends Controller
{

    public function home()
    {
        $this->setLayout('main');
        return $this->render("user/landigPage");

    }

    public function contact()
    {

        return $this->render('contact');

    }

    public function callerHome()
    {
        return $this->render('callerHome');
    }

    public function sendBulkMail() {
        $mailer = new Mailer();
    }



}