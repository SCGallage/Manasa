<?php

namespace controllers\caller;

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
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/callNow');
    }

    public function loadTimeslots()
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/timeSlots');
    }

}