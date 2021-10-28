<?php

namespace controllers\volunteer;

class VolunteerController extends \core\Controller
{
    public function loadVolunteerHome()
    {
        $this->setLayout('volunteer/volunteerHome');
        return $this->render('volunteer/events/upcomingEvents');
    }

    public function loadVolunteerProfile()
    {
        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('volunteer/profile/profile');
    }

    public function loadVolunteerProfileUpdateForm()
    {
        $this->setLayout('volunteer/volunteerFunction');
        return $this->render('volunteer/profile/updateProfileForm');
    }
}