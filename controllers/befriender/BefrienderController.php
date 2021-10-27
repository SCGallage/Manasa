<?php

namespace controllers\befriender;

use core\Model;
use core\Request;
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

    public function addSupportGroupRequest(Request $request)
    {
        if ($request->isPost()) {
            print_r($request->getBody());
            if ($this->befriender->addSupportGroupRequest($request->getBody())) {
                return $this->render('befriender\befriender_supportgroup_request', 'Befriender | Support Group');
            }
        }
        $this->setLayout('reset');
        return $this->render('befriender\befriender_supportgroup_request', 'Befriender | Support Group');
    }
}