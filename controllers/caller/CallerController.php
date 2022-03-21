<?php

namespace controllers\caller;

use core\sessions\SessionManagement;
use models\Appointment\CallerAppointment;
use models\users\Caller;
use util\CommonConstants;

class CallerController extends \core\Controller
{
    public function loadCallerHome (): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $callerAppointment = new CallerAppointment();
        $params = [
            'pending' => $callerAppointment->getAllPendingAppointmentsByUser($userId)
        ];
        $this->setLayout('caller/callerHome');
        return $this->render('caller/appointments/upcomingAppointments', 'Caller | Home', $params);
    }

    public function loadCallerProfile (): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $caller = new Caller();
        $callerAppointment = new CallerAppointment();
        $params = [
            'info' => $caller->loadCallerInfo($userId),
            'appointments' => $callerAppointment->countCallerMeetings($userId)
        ];
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/profile/profile', 'Caller | Profile', $params);
    }

    public function loadUpdateCallerProfileForm(): array|bool|string
    {
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/profile/updateProfileForm', 'Caller | Update Profile');
    }
}