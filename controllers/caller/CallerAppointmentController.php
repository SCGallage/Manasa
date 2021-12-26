<?php

namespace controllers\caller;

use core\sessions\SessionManagement;
use util\CommonConstants;

class CallerAppointmentController extends \core\Controller
{
    public function loadAppointmentsPage()
    {
        $this->setLayout('caller/callerAppointmentFunction');
        return $this->render('caller/appointments/appointmentFunction','Caller | Appointments');
    }

    public function loadAppointmentLink()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/appointmentGetLink', 'Caller | Get Link');
    }

    public function loadAppointmentInfo()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/appointmentGetInfo', 'Caller | Appointment Info');
    }

    public function loadCallNow()
    {
        $userType = "";
        if(isset($_SESSION[CommonConstants::SESSION_LOGGED_IN]) && !empty($_SESSION[CommonConstants::SESSION_LOGGED_IN])) {
            //load Call now function for Caller
            $params = [
                'userType' => $userType
            ];
            $this->setLayout('caller/callerFunction');

        } else{
            $this->setLayout('user/visitorFunction');
        }

        return $this->render('caller/appointments/callNow', 'Call Now');

    }

    public function loadTimeslots()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/timeSlots', 'Time Slots');
    }

}