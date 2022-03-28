<?php

namespace controllers\caller;

use core\Request;
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
        $normalAppointmentsPending = $callerAppointment->getAllNormalPendingAppointmentsByUser($userId);


        $params = [
            'pending' => $normalAppointmentsPending
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
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $caller = new Caller();
        $params = [
            'info' => $caller->loadCallerInfo($userId)
        ];
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/profile/updateProfileForm', 'Caller | Profile', $params);
    }

    public function updateCallerProfile(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $request = $request->getBody();
        $params = [
            'title' => "Profile update failed.",
            'message' => 'Failed to update profile. Please try again.',
            'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
            'link' => '/profile',
            'linkType' => CommonConstants::LINK_TYPE_GET,
            'req' => $request
        ];
        $caller = new Caller();
        if ($caller->updateCaller($request, $userId)) {
            $params = [
                'title' => "Profile update success.",
                'message' => 'Your profile updated successfully.',
                'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                'link' => '/profile',
                'linkType' => CommonConstants::LINK_TYPE_GET
            ];
        }

        $this->setLayout('caller/callerFunction');
        return $this->render('components/errorMessage', 'Manasa',$params);

    }
}