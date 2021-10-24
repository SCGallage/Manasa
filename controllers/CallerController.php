<?php

namespace controllers;

class CallerController extends \core\Controller
{
    public function loadCallerHome ()
    {
        $this->setLayout('callerHome');
        return $this->render('caller/appointments/upcomingAppointments');
    }
}