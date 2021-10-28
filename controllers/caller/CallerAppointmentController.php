<?php

namespace controllers\caller;

use core\sessions\SessionManagement;
use util\CommonConstants;

class CallerAppointmentController extends \core\Controller
{
    public function loadAppointmentsPage()
    {
        $this->setLayout('caller/callerAppointmentFunction');
        return $this->render('caller/appointments/appointmentFunction');
    }

    public function loadAppointmentLink()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/appointmentGetLink');
    }

    public function loadAppointmentInfo()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/appointmentGetInfo');
    }

    public function loadCallNow()
    {
        if(isset($_SESSION[CommonConstants::SESSION_LOGGED_IN]) && !empty($_SESSION[CommonConstants::SESSION_LOGGED_IN])) {
            //load Call now function for Caller
            $this->setLayout('caller/callerFunction');
            return $this->render('caller/appointments/callNow');
        } else {
            //load Call now function for Visitor
            $this->setLayout('user/visitorFunction');
            return $this->render('user/callNow/callNow');
        }

    }

    public function loadTimeslots()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/timeSlots');
    }

}