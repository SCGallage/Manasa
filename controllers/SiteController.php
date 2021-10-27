<?php
namespace controllers;

use core\Application;
use core\Request;
use core\Controller;

class SiteController extends Controller
{

    public function home()
    {
        $params = [
            'name' => "John Doe"
        ];
        return $this->render("home", params: $params);

    }

    public function contact()
    {

        return $this->render('contact');

    }

    public function callerHome()
    {
        return $this->render('callerHome');
    }



}