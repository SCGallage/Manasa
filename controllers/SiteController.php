<?php
namespace controllers;

use core\Application;
use core\Request;
use core\Controller;

class SiteController extends Controller
{

    public function home()
    {
        $this->setLayout('main');
        return $this->render("user/landigPage", 'Manasa.lk');

    }

    public function contact()
    {

        return $this->render('contact');

    }





}