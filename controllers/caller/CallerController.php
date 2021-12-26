<?php

namespace controllers\caller;

class CallerController extends \core\Controller
{
    public function loadCallerHome ()
    {
        $this->setLayout('caller/callerHome');
        return $this->render('caller/appointments/upcomingAppointments', 'Caller | Home');
    }

    public function loadCallerProfile ()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/profile/profile', 'Caller | Profile');
    }

    public function loadUpdateCallerProfileForm()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/profile/updateProfileForm', 'Caller | Update Profile');
    }
}