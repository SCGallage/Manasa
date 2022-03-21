<?php

namespace controllers\caller;

use core\Request;
use core\sessions\SessionManagement;
use models\Appointment\CallerAppointment;
use models\supportgroup\SgEnroll;
use util\CommonConstants;

class CallerAppointmentController extends \core\Controller
{
    /*
     * Function: loadPendingAppointments
     * Operation: Get meeting data by using user id
     * Parameter: user id
     * Return: array or int
     *
     * */
    public function loadAllAppointments(): array|bool|int
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $appointment = new CallerAppointment();
        return $appointment->getAllMeetingsByUser($userId);
    }

    /*
     * Function: loadAppointmentsPage
     * Operation: loads all data required to load appointments page
     * Parameter: Request object
     * Return: array, boolean, or string
     *
     * */
    public function loadAppointmentsPage(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $sg_enroll = new SgEnroll();
        $normalAppointmentsPending = array();
        $normalAppointmentsFinished = array();
        $allAppointments = $this->loadAllAppointments();
        $sgAppointments = $sg_enroll->getSgRequestsByMember($userId);

        //filter appointments
        foreach ($allAppointments as $appointment){
            $check = 0;
            $key = -1;

            //filter support group join request meetings
            foreach ($sgAppointments as $sga){
                if ($sga['meeting'] == $appointment['id']){
                    $check = 1;
                    $key = array_keys($sgAppointments, $sga, true);
                    break;
                }
            }

            //set normal appointments
            if ($check == 0 && $key == -1){
                if ($appointment['state'] == CommonConstants::STATE_PENDING){
                    array_push($normalAppointmentsPending, $appointment);
                }

                if ($appointment['state'] == CommonConstants::STATE_ACCEPTED){
                    array_push($normalAppointmentsFinished, $appointment);
                }
            }
            if ($check != 0 && is_array($key)) unset($sgAppointments[$key[0]]);
        }

        $params = [
            'pending' => $normalAppointmentsPending,
            'finished' => $normalAppointmentsFinished,
        ];

        $this->setLayout('caller/callerAppointmentFunction');
        return $this->render('caller/appointments/appointmentFunction','Caller | Appointments', $params);
    }

    /*
     * Function: loadAppointmentLink
     * Operation: loads all data of single appointment.
     * Parameter: Request object
     * 
     * Return: array, boolean, or string
     *
     * */
    public function loadAppointmentById(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $requestBody = $request->getBody();
        $appointmentId = $requestBody['id'];
        $callerAppointment = new CallerAppointment();
        $appointmentInfo = $callerAppointment->getMeetingByID($appointmentId);
        $params = [
            'appointmentInfo' => $appointmentInfo,
            'userId' => $userId,
            'request' => $requestBody
            ];
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/appointmentGetInfo', 'Caller | Appointment', $params);
    }

    public function loadAppointmentInfo(Request $request): array|bool|string
    {
        $requestBody = $request->getBody();
        $appointmentId = $requestBody['id'];
        $callerAppointment = new CallerAppointment();
        $appointmentInfo = $callerAppointment->getMeetingByID($appointmentId);
        $params = [
            'appointmentInfo' => $appointmentInfo
        ];
        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/appointmentGetInfo', 'Caller | Appointment Info', $params);
    }

    public function loadCallNow(): array|bool|string
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

    public function loadTimeslots(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $callerAppointments = new CallerAppointment();
        $requestBody = $request->getBody();
        $reservationLimit = $callerAppointments->reservationLimit_check($userId, $requestBody['date']);
        $requestBody['callerId'] = $userId;
        $params = [
            'request' => $requestBody,
            'viewType' => 'normal_meeting'
        ];
        if ($reservationLimit){
            $params['timeSlots'] = $callerAppointments->loadTimeSlots($userId, $requestBody['date']);
            $params['chances'] = $reservationLimit;
        }

        $this->setLayout('caller/callerFunction');
        return $this->render('caller/appointments/timeSlots', 'Time Slots', $params);
    }

    /*
     * Function: reserveMeeting
     * Operation: make an appointment
     * Parameter: Request object
     * Return: array, boolean, or string
     *
     * */
    public function reserveMeeting(Request $request): array|bool|string
    {
        $callerAppointment = new CallerAppointment();
        $params = [
            'title' => "Cannot reserve timeslot.",
            'message' => 'Failed to reserve requested timeslot. Please try again with another timeslot.',
            'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
            'link' => '/appointments',
            'linkType' => CommonConstants::LINK_TYPE_GET,
        ];


        if ($callerAppointment->reserveMeeting($request->getBody())){
            $params = [
                'title' => "Appointment placed.",
                'message' => 'Appointment placed successfully.',
                'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                'link' => '/appointments',
                'linkType' => CommonConstants::LINK_TYPE_GET,
            ];

        }

        $this->setLayout('caller/callerFunction');
        return $this->render('components/errorMessage', 'Manasa',$params);
    }

    public function cancelMeeting(Request $request): array|bool|string
    {
        $callerAppointment = new CallerAppointment();
        $requestBody = $request->getBody();

        $params = [
            'title' => "Cannot cancel meeting.",
            'message' => 'Failed to cancel meeting. Please try again.',
            'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
            'link' => '/appointments',
            'linkType' => CommonConstants::LINK_TYPE_GET,
        ];


        if ($callerAppointment->cancelMeeting($requestBody['id'])){
            $params = [
                'title' => "Appointment cancelled.",
                'message' => 'Your appointment cancelled successfully.',
                'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                'link' => '/appointments',
                'linkType' => CommonConstants::LINK_TYPE_GET,
            ];

        }

        $this->setLayout('caller/callerFunction');
        return $this->render('components/errorMessage', 'Manasa',$params);
    }



}