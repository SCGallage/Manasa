<?php

namespace controllers\befriender;

use core\Application;
use core\Model;
use core\Request;
use core\sessions\SessionManagement;
use models\users\Befriender;

class BefrienderController extends \core\Controller
{

    private Befriender $befriender;
    /**
     * BefrienderController constructor.
     */
    public function __construct()
    {
        $this->befriender = new Befriender();
        $this->setLayout('auth');
    }

    public function loadBefrienderDashboard(Request $request)
    {
        return $this->render('befriender\befriender_dashboard', 'Befriender | Dashboard');
    }

    public function loadBefrienderAppointments(Request $request)
    {
        return $this->render('befriender\befriender_appointments', 'Befriender | Appointments');
    }

    public function loadBefrienderReports(Request $request)
    {
        return $this->render('befriender\befriender_reports', 'Befriender | Reports');
    }

    public function loadBefrienderSupportGroup(Request $request)
    {
        return $this->render('befriender\befriender_supportgroup', 'Befriender | Support Group');
    }

    public function befrienderSchedule(Request $request)
    {
        return $this->render('befriender\befriender_schedule', 'Befriender | Schedule');
    }

    public function addSupportGroupRequest(Request $request)
    {
        if ($request->isPost()) {
            print_r($request->getBody());
            if ($this->befriender->addSupportGroupRequest($request->getBody())) {
                return $this->render('befriender\befriender_supportgroup_request', 'Befriender | Support Group');
            }
        }
        $this->setLayout('reset');
        Application::$app->response->setRedirectUrl('/befriender/dashboard?befid='.SessionManagement::get_session_data('user_id'));
        //return $this->render('befriender\befriender_supportgroup_request', 'Befriender | Support Group');
    }
}