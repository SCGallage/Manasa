<?php

namespace controllers\volunteer;

use core\Request;
use core\sessions\SessionManagement;
use models\users\Volunteer;
use models\volEvents;
use util\CommonConstants;

class VolunteerController extends \core\Controller
{
    public function loadParticipatedEvents(): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $volunteerEvent = new volEvents();
        $params = [
            'events' => $volunteerEvent->loadParticipatedEvents($userId)
        ];

        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('volunteer/events/volunteerEvents', "Volunteer | Participated", $params);

    }

    public function participateVolunteerEvent(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $volunteerEvent = new volEvents();
        $requestBody = $request->getBody();

        //message
        $params = [
            'title' => "Participation request failed.",
            'message' => 'Failed to participate event. Please try again.',
            'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
            'link' => '/volunteerHome',
            'linkType' => CommonConstants::LINK_TYPE_GET,
        ];
        if ($volunteerEvent->participateVolunteerEvent($requestBody,$userId)) {
            $params['messageType'] = CommonConstants::MESSAGE_TYPE_SUCCESS;
            $params['title'] = 'Successfully participated';
            $params['message'] = 'Participation request placed successfully.';
        }

        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('components/errorMessage', 'Manasa',$params);

    }

    public function cancelEventParticipation(Request $request): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $requestBody = $request->getBody();
        $volunteerEvent = new volEvents();
        //message
        $params = [
            'title' => "Cannot remove participation request.",
            'message' => 'Failed to remove participation request. Please try again.',
            'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
            'link' => '/volunteerHome',
            'linkType' => CommonConstants::LINK_TYPE_GET,
        ];

        //set timezone
        date_default_timezone_set("Asia/Colombo");
        $today = date("Y-m-d");
        $timeToday = date("H:i:s");
        $event = $volunteerEvent->loadVolunteerEventById($requestBody['eventId']);
        //calculate date difference
        $eventDate = date_create($event[0]['startDate']);
        $todayDate = date_create($today);
        $difference = intval(date_diff($todayDate, $eventDate)->format('%R%a days'));

        if (!empty($event)){
            //display error message
            if ($difference <= CommonConstants::VOLUNTEER_EVENT_CANCEL_LIMIT &&
                $event[0]['type'] == CommonConstants::VOLUNTEER_EVENT_TYPE_EXCLUSIVE) {
                $this->setLayout('volunteer/volunteerFunction');
                return $this->render('components/errorMessage', 'Manasa',$params);
            }

            if ($volunteerEvent->cancelEventParticipation($requestBody['eventId'], $userId)) {
                $params['messageType'] = CommonConstants::MESSAGE_TYPE_SUCCESS;
                $params['title'] = 'Participation request removed.';
                $params['message'] = 'Participation request removed successfully.';
            }
        }

        $params['count'] = intval($volunteerEvent->checkParticipantCount($requestBody['eventId']));

        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('components/errorMessage', 'Manasa',$params);
    }

    public function loadVolunteerHome(): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $volunteerEvent = new volEvents();
        $participated = $volunteerEvent->loadVolunteerEventsByUser($userId);
        $allEvents = $volunteerEvent->loadAllVolunteerEvents();

        foreach ($participated as $participatedEvent) {

            //clear array
            $eventRemove = 0;

            foreach ($allEvents as $event) {

                if ($participatedEvent['id'] == $event['id']) {
                    //set eventRemove
                    $eventRemove = $event;
                    break;
                }
                $eventRemove++;
            }

            if ($eventRemove != 0) {
                unset($allEvents[array_search($eventRemove, $allEvents)]);
                $allEvents = array_values($allEvents);
            }
        }

        $params = [
            'upcoming' => $allEvents,
            'participated' => $participated
            ];
        $this->setLayout('volunteer/volunteerHome');
        return $this->render('volunteer/events/upcomingEvents','Volunteer | Home',$params);
    }

    public function loadVolunteerProfile(): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $volunteer = new Volunteer();
        $params = [
            'info' => $volunteer->getVolunteerById($userId),
            'events' => $volunteer->eventsParticipated($userId)
        ];
        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('volunteer/profile/profile', "Volunteer | Profile", $params);
    }

    public function loadVolunteerProfileUpdateForm(): array|bool|string
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $volunteer = new Volunteer();
        $params = [
            'info' => $volunteer->getVolunteerById($userId)
        ];
        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('volunteer/profile/updateProfileForm', 'Update | Volunteer', $params);
    }

    public function updateVolunteer(Request $request)
    {
        $userId = intval(SessionManagement::get_session_data(CommonConstants::SESSION_USER_ID));
        $request = $request->getBody();
        $volunteer = new Volunteer();
        $params = [
            'title' => "Profile update failed.",
            'message' => 'Failed to update profile. Please try again.',
            'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
            'link' => '/volunteerProfile',
            'linkType' => CommonConstants::LINK_TYPE_GET,
            'req' => $request
        ];

        if ($volunteer->updateVolunteer($request, $userId)) {
            $params = [
                'title' => "Profile update success.",
                'message' => 'Your profile updated successfully.',
                'messageType' => CommonConstants::MESSAGE_TYPE_SUCCESS,
                'link' => '/volunteerProfile',
                'linkType' => CommonConstants::LINK_TYPE_GET
            ];
        }

        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('components/errorMessage', 'Manasa',$params);
    }

    public function loadVolunteerEvents(): array|bool|string
    {
        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('volunteer/events/volunteerEvents');

    }
}