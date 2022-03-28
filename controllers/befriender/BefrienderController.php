<?php

namespace controllers\befriender;

use core\Application;
use core\Model;
use core\Request;
use core\sessions\SessionManagement;
use Google\Service\AdMob\App;
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
        $requests = $this->befriender->getSupportGroupRequests($request->getBody()['befid']);
        return $this->render('befriender\befriender_dashboard', 'Befriender | Dashboard', [ "requests" => $requests ]);
    }

    public function loadBefrienderAppointments(Request $request)
    {

        //rint_r($request->getBody());
        $meetingList = $this->befriender->getAllMeetingsOfBefriender($request->getBody()["befid"]);

        if (array_key_exists("from", $request->getBody()))
            return $this->render('befriender\befriender_appointments', 'Befriender | Appointments', [
                "meetingList" => $meetingList,
                "cancelled" => $this->befriender->getCancelledWithinWeek($request->getBody())
            ]);

        return $this->render('befriender\befriender_appointments', 'Befriender | Appointments', [
                "meetingList" => $meetingList,
                "cancelled" => $this->befriender->getCancelledWithinWeek()
            ]);
    }

    public function cancelBefrienderAppointmentsForAWeek(Request $request)
    {
        $this->befriender->cancelBefrienderAppointmentsForAWeek($request->getBody()['befid']);
    }

    public function loadBefrienderReports(Request $request)
    {
        $reportData = $this->befriender->getReportPendingForBefriender($request->getBody()['befid']);
        $months = [ "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" ];
        foreach ($reportData as $key => $report) {
            $timestamp = strtotime($report['date']);
            $reportData[$key]['month'] = $months[intval(date("m", $timestamp))-1];
            $reportData[$key]['day'] = date("j", $timestamp);
        }

        $submittedReports = $this->befriender->getSubmittedReportsForBefriender($request->getBody()['befid']);
        foreach ($submittedReports as $key => $submittedReport) {
            $timestamp = strtotime($submittedReport['date']);
            $submittedReports[$key]['month'] = $months[intval(date("m", $timestamp))-1];
            $submittedReports[$key]['day'] = date("j", $timestamp);
        }

        $problemTypes = $this->befriender->getProblemTypes();
        return $this->render('befriender\befriender_reports', 'Befriender | Reports',
            [
                "reports" => $reportData,
                "submittedReports" => $submittedReports,
                "problems" => $problemTypes
            ]);
    }

    public function loadBefrienderCompletedReports(Request $request)
    {
        Application::$app->response->setContentTypeJson();
        return json_encode(
            $this->befriender->loadBefrienderCompletedReports($request->getBody()['reportId'])
        );
    }

    public function loadBefrienderSupportGroup(Request $request)
    {
        return $this->render('befriender\befriender_supportgroup', 'Befriender | Support Group');
    }

    public function befrienderSchedule(Request $request)
    {
        setcookie("max_reservations", $_ENV['max_reservations'], time() + (86400 * 30), "/");
        return $this->render('befriender\befriender_schedule', 'Befriender | Schedule');
    }

    public function transferBefrienderShift(Request $request)
    {
        return $this->render('befriender\befriender_transfer', 'Befriender | Tranfer Shift');
    }

    public function addSupportGroupRequest(Request $request)
    {
        if ($request->isPost()) {
            print_r($request->getBody());
            if ($this->befriender->addSupportGroupRequest($request->getBody())) {
                Application::$app->response->setRedirectUrl('/befriender/dashboard?befid='.SessionManagement::get_session_data('user_id'));
            }
        }
        $this->setLayout('reset');
        Application::$app->response->setRedirectUrl('/befriender/dashboard?befid='.SessionManagement::get_session_data('user_id'));
        //return $this->render('befriender\befriender_supportgroup_request', 'Befriender | Support Group');
    }

    public function getSingleMeetingDetails(Request $request)
    {
        Application::$app->response->setContentTypeJson();
        return json_encode($this->befriender->getSingleMeetingDetails($request->getBody()['meetingId']));
    }

    public function submitReportForMeeting(Request $request)
    {
        Application::$app->response->setContentTypeJson();
        return json_encode([
            "result" => $this->befriender->submitReportForMeeting($request->getJsonBody())
        ], JSON_NUMERIC_CHECK);
    }
}