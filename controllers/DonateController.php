<?php

namespace controllers;

class DonateController extends \core\Controller
{
    public function loadDonateForm()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('user/donate/donateForm');
    }
}