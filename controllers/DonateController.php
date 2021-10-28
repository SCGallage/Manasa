<?php

namespace controllers;

use util\CommonConstants;

class DonateController extends \core\Controller
{
    public function loadDonateForm()
    {
        if(isset($_SESSION[CommonConstants::SESSION_LOGGED_IN]) && !empty($_SESSION[CommonConstants::SESSION_LOGGED_IN])) {
            //load Call now function for Caller
            $this->setLayout('caller/callerFunction');
        } else {
            //load Call now function for Visitor
            $this->setLayout('user/visitorFunction');
        }

        return $this->render('user/donate/donateForm');
    }
}