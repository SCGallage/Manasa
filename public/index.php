<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__.'/../core/vendor/autoload.php';
require_once './autoload.php';


use controllers\authentication\AuthController;
use controllers\befriender\BefrienderController;
use controllers\caller\CallerAppointmentController;
use controllers\caller\CallerController;
use controllers\DonateController;
use controllers\schedule\ScheduleController;
use controllers\supportgroup\SupportGroupController;
use controllers\supportgroup\SupportGroupEventController;
use controllers\volunteer\VolunteerController;
use core\Application;
use controllers\SiteController;
use core\DotEnv;
use controllers\Admin\AdminController;
use controllers\moderator\modController;
use controllers\moderator\ModeratorVolunteerController;
use controllers\moderator\modScheduleController;
use controllers\Admin\ReportGenerationController;
use controllers\Admin\AdminVolunteerController;
use controllers\Admin\AdminScheduleController;
use controllers\Admin\FPDFController;
use core\Settings;

$dotenv = new DotEnv(dirname(__DIR__).'\.env');
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    //echo "You have CORS!";
}

cors();

$app = new Application(dirname(__DIR__), $config);

$settings = new Settings();
$settings->addSettingToDatabase("bef_limit", 10);
$settings->loadSettingsToEnv();


/* Testing routes only */
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);

/* insert new ones here */

/* users routes */
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);

/* register using google */
$app->router->get('/details', [AuthController::class, 'registerGoogleUser']);
$app->router->post('/details', [AuthController::class, 'registerGoogleUser']);

/* login using google */
$app->router->get('/validatelogin', [AuthController::class, 'loginGoogleUser']);

/* Password Reset */
$app->router->get('/resetpassword', [AuthController::class, 'resetPassword']);
$app->router->post('/resetpassword', [AuthController::class, 'resetPassword']);
$app->router->get('/resetemail', 'users/resetEmailSent');
$app->router->get('/updatepassword', [AuthController::class, 'updatePassword']);
$app->router->post('/updatepassword', [AuthController::class, 'updatePassword']);

/* Befriender Views */

$app->router->get('/befriender/dashboard', [BefrienderController::class, 'loadBefrienderDashboard', 'Befriender']);
$app->router->get('/befriender/appointments', [BefrienderController::class, 'loadBefrienderAppointments']);
$app->router->get('/befriender/reports', [BefrienderController::class, 'loadBefrienderReports']);
$app->router->get('/befriender/supportgroup', [BefrienderController::class, 'loadBefrienderSupportGroup']);
$app->router->get('/befriender/schedule', [BefrienderController::class, 'befrienderSchedule']);
$app->router->get('/befriender/sg_request', [BefrienderController::class, 'addSupportGroupRequest']);
$app->router->post('/befriender/sg_request', [BefrienderController::class, 'addSupportGroupRequest']);

/* Schedule Views */
$app->router->get('/befriender/transfershift', [ScheduleController::class, 'loadPreviousShift']);

//admin landing page
$app->router->get('/admin/AdminDash', [AdminController::class, 'home']);

//Admin support group
$app->router->get('/admin/SupportGroup', [AdminController::class, 'supportGroup']);
$app->router->get('/admin/createSG', [AdminController::class, 'createSG']);
$app->router->post('/admin/createSG', [AdminController::class, 'createdSG']);
$app->router->get('/admin/updateSG', [AdminController::class, 'updateSG']);
$app->router->post('/admin/updatedSGform', [AdminController::class, 'updateSG']);
$app->router->get('/admin/deleteSG', [AdminController::class, 'deleteSG']);

//Support group request update
$app->router->get('/admin/SGRequestsUpdate', [AdminController::class, 'SupportGroupRequestsUpdate']);
$app->router->get('/admin/SGRequestsDelete', [AdminController::class, 'SupportGroupRequestsDelete']);

//Support group page requests
$app->router->get('/admin/SGRequests', [AdminController::class, 'SGRequests']);
$app->router->get('/admin/SGRequestsPageDelete', [AdminController::class, 'SupportGroupRequestsPageDelete']);

//admin views (upcoming events)
$app->router->get('/admin/Volunteer', [AdminVolunteerController::class, 'Volunteer']);

//Admin volunteer event view (all volunteer event views)
$app->router->get('/admin/viewVolunteerEvent', [AdminVolunteerController::class, 'viewVolEvent']);
$app->router->post('/admin/viewVolunteerEvent', [AdminVolunteerController::class, 'viewVolEvent']);

$app->router->get('/admin/createVolunteerEvent', [AdminVolunteerController::class, 'createVolEvent']);
$app->router->post('/admin/createVolunteerEvent', [AdminVolunteerController::class, 'createVolEvent']);

$app->router->get('/admin/updateVolunteerEvent', [AdminVolunteerController::class, 'updateVolEvent']);
$app->router->post('/admin/updateVolunteerEvent', [AdminVolunteerController::class, 'updateVolEvent']);
$app->router->get('/admin/deleteVolunteerEvent', [AdminVolunteerController::class, 'deleteVolunteerEvent']);

$app->router->get('/admin/selectVolunteer', [AdminVolunteerController::class, 'selectVolunteers']);
$app->router->post('/admin/selectVolunteer', [AdminVolunteerController::class, 'selectVolunteers']);
$app->router->get('/admin/volParticipateReport',[ReportGenerationController::class,'volParticipateReport']);
$app->router->post('/admin/volParticipateReport',[ReportGenerationController::class,'volParticipateReport']);
//admin view volunteer details
$app->router->get('/admin/viewVolunteerInformation', [AdminVolunteerController::class, 'viewVolunteer']);
//accept volunteers
$app->router->get('/admin/acceptVolunteer', [AdminVolunteerController::class, 'volunteerRequestsUpdate']);
$app->router->post('/admin/acceptVolunteer', [AdminVolunteerController::class, 'volunteerRequestsUpdate']);
$app->router->get('/admin/rejectVolunteer', [AdminVolunteerController::class, 'VolunteerRequestsDelete']);


$app->router->get('/admin/Schedule', [AdminScheduleController::class, 'Schedule']);
$app->router->get('/admin/upcomingSchedule', [AdminScheduleController::class, 'UpcomingSchedule']);
$app->router->get('/admin/FixSchedule', [AdminScheduleController::class, 'FixSchedule']);
$app->router->get('/admin/CreateSchedule', [AdminScheduleController::class, 'createSchedule']);
$app->router->post('/admin/CreateSchedule', [AdminScheduleController::class, 'createSchedule']);
$app->router->get('/admin/ScheduleSelect', [AdminScheduleController::class, 'selectSchedule']);
$app->router->post('/admin/ScheduleSelect', [AdminScheduleController::class, 'selectSchedule']);

//Remove befriender from slot
$app->router->get('/admin/removeBefriender', [AdminScheduleController::class, 'removeBefriender']);
$app->router->post('/admin/assignBefriender', [AdminScheduleController::class, 'assignBefriender']);

//Close/open schedule slot
$app->router->post('/admin/closeSlot', [AdminScheduleController::class, 'closeSlot']);
$app->router->post('/admin/openSlot', [AdminScheduleController::class, 'openSlot']);
//lock schedule
$app->router->post('/admin/lockSchedule', [AdminScheduleController::class, 'lockSchedule']);
$app->router->post('/admin/unlockSchedule', [AdminScheduleController::class, 'unlockSchedule']);
$app->router->post('/admin/lockUpcomingSchedule', [AdminScheduleController::class, 'lockUpcomingSchedule']);
$app->router->post('/admin/unlockUpcomingSchedule', [AdminScheduleController::class, 'unlockUpcomingSchedule']);

//admin report generation form
//volunteer report
$app->router->get('/admin/volReport', [ReportGenerationController::class, 'volunteerReportForm']);
$app->router->post('/admin/volReport', [ReportGenerationController::class, 'volunteerReportForm']);
//pdf
$app->router->get('/admin/volReportPDF', [ReportGenerationController::class, 'volunteerReportPDF']);
$app->router->post('/admin/volReportPDF', [ReportGenerationController::class, 'volunteerReportPDF']);

//overview report
$app->router->get('/admin/GenReport', [ReportGenerationController::class, 'overviewReportForm']);
$app->router->post('/admin/GenReport', [ReportGenerationController::class, 'overviewReportForm']);

//befriender report
$app->router->get('/admin/befrienderReport', [ReportGenerationController::class, 'befrienderReportForm']);
$app->router->post('/admin/befrienderReport', [ReportGenerationController::class, 'befrienderReportForm']);

$app->router->get('/admin/donationReport', [ReportGenerationController::class, 'donationReportForm']);
$app->router->post('/admin/donationReport', [ReportGenerationController::class, 'donationReportForm']);

//admin report view
$app->router->get('/admin/ReportVolunteer', [ReportGenerationController::class, 'volunteerReport']);
$app->router->post('/admin/ReportVolunteer', [ReportGenerationController::class, 'volunteerReport']);

//session report
$app->router->get('/admin/SessionReport', [AdminController::class, 'SessionReport']);
$app->router->post('/admin/SessionReport', [AdminController::class, 'SessionReport']);
$app->router->get('/admin/SessionReportView', [AdminController::class, 'SessionReportView']);
$app->router->post('/admin/SessionReportView', [AdminController::class, 'SessionReportView']);

//admin user function
$app->router->get('/admin/SearchUsers', [AdminController::class, 'SearchUsers']);
$app->router->post('/admin/SearchUsers', [AdminController::class, 'SearchUsers']);

//admin Inactive users
$app->router->get('/admin/inactiveUsers', [AdminController::class, 'InactiveUsers']);
$app->router->post('/admin/inactiveUsers', [AdminController::class, 'InactiveUsers']);
//add users
$app->router->get('/admin/addUsers', [AdminController::class, 'createUser']);
$app->router->post('/admin/addUsers', [AdminController::class, 'createUser']);

$app->router->get('/admin/updateUser', [AdminController::class, 'updateUser']);
$app->router->post('/admin/updateUser', [AdminController::class, 'updateUser']);

$app->router->get('/admin/deleteUser', [AdminController::class, 'deleteUser']);

//User requests
$app->router->get('/admin/UserRequests', [AdminController::class, 'UserRequests']);
$app->router->post('/admin/UserRequests', [AdminController::class, 'UserRequestsUpdate']);
$app->router->get('/admin/UserRequestsDelete', [AdminController::class, 'UserRequestsDelete']);

$app->router->get('/cvdownload', [AdminController::class, 'cvDownload']);

//moderator views
//moderator landing page
$app->router->get('/mod/ModDash', [modController::class, 'Modhome']);
$app->router->get('/mod/ModUsers', [modController::class, 'ModUsers']);
$app->router->post('/mod/ModUsers', [modController::class, 'ModUsers']);
//$app->router->get('/mod/Schedule', [modController::class, 'ModSchedule']);
//$app->router->get('/mod/FixSchedule', [modController::class, 'ModFixSchedule']);

$app->router->get('/mod/Schedule', [modScheduleController::class, 'Schedule']);
$app->router->get('/mod/upcomingSchedule', [modScheduleController::class, 'UpcomingSchedule']);
$app->router->get('/mod/FixSchedule', [modScheduleController::class, 'FixSchedule']);
$app->router->get('/mod/CreateSchedule', [modScheduleController::class, 'createSchedule']);
$app->router->post('/mod/CreateSchedule', [modScheduleController::class, 'createSchedule']);
$app->router->get('/mod/ScheduleSelect', [modScheduleController::class, 'selectSchedule']);
$app->router->post('/mod/ScheduleSelect', [modScheduleController::class, 'selectSchedule']);
//Close/open schedule slot
$app->router->post('/mod/closeSlot', [modScheduleController::class, 'closeSlot']);
$app->router->post('/mod/openSlot', [modScheduleController::class, 'openSlot']);
//lock schedule
$app->router->post('/mod/lockSchedule', [modScheduleController::class, 'lockSchedule']);
$app->router->post('/mod/unlockSchedule', [modScheduleController::class, 'unlockSchedule']);
$app->router->post('/mod/lockUpcomingSchedule', [modScheduleController::class, 'lockUpcomingSchedule']);
$app->router->post('/mod/unlockUpcomingSchedule', [modScheduleController::class, 'unlockUpcomingSchedule']);

//Remove befriender from slot
$app->router->get('/mod/removeBefriender', [modScheduleController::class, 'removeBefriender']);
$app->router->post('/mod/assignBefriender', [modScheduleController::class, 'assignBefriender']);

$app->router->get('/mod/UserRequests', [modController::class, 'ModUserRequests']);
$app->router->post('/mod/UserRequests', [modController::class, 'ModUserRequestsUpdate']);
$app->router->get('/mod/UserRequestsDelete', [modController::class, 'ModUserRequestsDelete']);

//moderator volunteer
$app->router->get('/mod/Volunteer', [ModeratorVolunteerController::class, 'Volunteer']);

$app->router->get('/mod/createVolunteerEvent', [ModeratorVolunteerController::class, 'createVolEvent']);
$app->router->post('/mod/createVolunteerEvent', [ModeratorVolunteerController::class, 'createVolEvent']);

$app->router->get('/mod/updateVolunteerEvent', [ModeratorVolunteerController::class, 'updateVolEvent']);
$app->router->post('/mod/updateVolunteerEvent', [ModeratorVolunteerController::class, 'updateVolEvent']);
$app->router->get('/mod/deleteVolunteerEvent', [ModeratorVolunteerController::class, 'deleteVolunteerEvent']);

$app->router->get('/mod/selectVolunteer', [ModeratorVolunteerController::class, 'selectVolunteers']);
$app->router->post('/mod/selectVolunteer', [ModeratorVolunteerController::class, 'selectVolunteers']);

//accept volunteers
$app->router->get('/mod/acceptVolunteer', [ModeratorVolunteerController::class, 'volunteerRequestsUpdate']);
$app->router->post('/mod/acceptVolunteer', [ModeratorVolunteerController::class, 'volunteerRequestsUpdate']);
$app->router->get('/mod/rejectVolunteer', [ModeratorVolunteerController::class, 'VolunteerRequestsDelete']);



/* Caller Views */
$app->router->get('/callerHome', [CallerController::class, 'loadCallerHome']);
$app->router->get('/callerSupportGroupsList', [SupportGroupController::class, 'callerLoadSupportGroupsList']);
$app->router->get('/callerSupportGroupHome', [SupportGroupController::class, 'supportGroupHome']);
$app->router->get('/viewSupportGroupEvent', [SupportGroupController::class, 'viewSupportGroupEvent']);
$app->router->get('/cancelSgEventParticipation', [SupportGroupController::class, 'cancelSgEventParticipation']);
$app->router->get('/profile', [CallerController::class, 'loadCallerProfile']);
$app->router->get('/updateProfile', [CallerController::class, 'loadUpdateCallerProfileForm']);
$app->router->post('/updateProfile', [CallerController::class, 'updateCallerProfile']);
$app->router->get('/appointments', [CallerAppointmentController::class, 'loadAppointmentsPage']);
$app->router->get('/appointmentLink', [CallerAppointmentController::class, 'loadAppointmentById']);
$app->router->get('/appointmentInfo', [CallerAppointmentController::class, 'loadAppointmentById']);
$app->router->get('/loadDonateForm', [DonateController::class, 'loadDonateForm']);
$app->router->get('/callNow', [CallerAppointmentController::class, 'loadCallNow']);
$app->router->post('/timeslots', [CallerAppointmentController::class, 'loadTimeslots']);
$app->router->post('/cancelSupportGroupJoinRequest', [SupportGroupController::class, 'cancelSupportGroupJoinRequest']);
$app->router->get('/loadJoinRequestTimeSlots', [SupportGroupController::class, 'loadJoinRequestTimeSlots']);
$app->router->post('/loadJoinRequestTimeSlots', [SupportGroupController::class, 'loadJoinRequestTimeSlots']);
$app->router->post('/completeSgJoinRequest', [SupportGroupController::class, 'callerJoinSupportGroup']);
$app->router->get('/leaveSupportGroup', [SupportGroupController::class, 'leaveSupportGroup']);
$app->router->post('/participateSgEvent', [SupportGroupController::class, 'participateSgEvent']);
$app->router->post('/searchSg', [SupportGroupController::class, 'searchSg']);
$app->router->post('/reserveMeeting', [CallerAppointmentController::class, 'reserveMeeting']);
$app->router->post('/cancelMeeting', [CallerAppointmentController::class, 'cancelMeeting']);
$app->router->post('/saveDonation', [DonateController::class, 'saveDonation']);
$app->router->post('/failedDonation', [DonateController::class, 'failedDonation']);
$app->router->post('/reserveSgMeeting', [SupportGroupController::class, 'reserveSgJoinMeeting']);


/* Visitor views*/
$app->router->get('/callNowVisitor', [CallerAppointmentController::class, 'loadCallNow']);

/* Volunteer views */
$app->router->get('/volunteerHome', [VolunteerController::class, 'loadVolunteerHome']);
$app->router->get('/participateVolunteerEvent', [VolunteerController::class, 'participateVolunteerEvent']);
$app->router->get('/cancelParticipationVolunteerEvent', [VolunteerController::class, 'cancelEventParticipation']);
$app->router->get('/volunteerProfile', [VolunteerController::class, 'loadVolunteerProfile']);
$app->router->get('/updateVolunteerProfile', [VolunteerController::class, 'loadVolunteerProfileUpdateForm']);
$app->router->post('/updateVolunteerProfile', [VolunteerController::class, 'updateVolunteer']);
$app->router->get('/volunteerParticipatedEvents', [VolunteerController::class, 'loadParticipatedEvents']);

/* API endpoints */

/* SupportGroup Requests */
$app->router->get('/api/v1/supportgroup/requests', [SupportGroupController::class, 'getSupportGroupRequests']);
$app->router->post('/api/v1/supportgroup/requestDecision', [SupportGroupController::class, 'supportGroupRequestDecision']);

/* SupportGroup Members */
$app->router->get('/api/v1/supportgroup/members', [SupportGroupController::class, 'getSupportGroupMembers']);
$app->router->post('/api/v1/supportgroup/remove_member', [SupportGroupController::class, 'removeMemberFromSupportGroup']);

/* Validation */
$app->router->post('/api/v1/auth/validate', [AuthController::class, 'checkExistingUsernameOrEmail']);

/* Schedule Functions */
$app->router->get('/api/v1/schedule/scheduleDetails', [ScheduleController::class, 'getAllSlotDetails']);
$app->router->get('/api/v1/schedule/getDisabledSchedule', [ScheduleController::class, 'getDisabledSchedule']);
$app->router->get('/api/v1/schedule/getReservedSlotsBefriender', [ScheduleController::class, 'getReservedSlotsByBefriender']);
$app->router->get('/api/v1/schedule/getSlotReservations', [ScheduleController::class, 'getBefriendersAssignedToSlot']);
$app->router->get('/api/v1/schedule/checkLock', [ScheduleController::class, 'getPreviousDate']);
$app->router->get('/api/v1/schedule/getTransferRequest', [ScheduleController::class, 'loadShiftsAvailableForTransfer']);

$app->router->post('/api/v1/schedule/reserveTimeSlot', [ScheduleController::class, 'reserveTimeSlot']);
$app->router->post('/api/v1/schedule/requestShiftTransfer', [ScheduleController::class, 'requestShiftTransfer']);
$app->router->get('/api/v1/schedule/getShiftFromDate', [ScheduleController::class, 'getSlotForGivenDate']);
$app->router->post('/api/v1/schedule/createShiftTransfer', [ScheduleController::class, 'createTransferRequest']);
$app->router->post('/api/v1/schedule/deleteShiftTransfer', [ScheduleController::class, 'deleteTransferRequest']);
$app->router->post('/api/v1/schedule/makeDecisionOnTransfer', [ScheduleController::class, 'makeDecisionForTransferRequest']);

/* Support Group Events */
$app->router->post('/api/v1/supportgroup/createEvent', [SupportGroupController::class, 'createSupportGroupEvent']);
$app->router->get('/api/v1/supportgroup/getEvents', [SupportGroupController::class, 'getSupportGroupEvents']);
$app->router->get('/api/v1/supportgroup/upcomingEvents', [SupportGroupEventController::class, 'getUpcomingEventForSG']);
$app->router->get('/api/v1/supportgroup/eventfordate', [SupportGroupEventController::class, 'getSupportGroupEventsForDate']);
$app->router->get('/supportGroup/bulk', [SupportGroupController::class, 'sendBulkMail']);

/* Befriender Reports */
$app->router->get('/api/v1/meeting', [BefrienderController::class, 'getSingleMeetingDetails']);
$app->router->post('/api/v1/addSessionReport', [BefrienderController::class, 'submitReportForMeeting']);

//terms and conditions
$app->router->get('/TermsandConditions', '/TermsandConditions');

/* Currently testing */

$app->router->get('/verifyemail', [AuthController::class, 'verifyEmail']);

$app->router->post('/api/v1/profilepic', [AuthController::class, 'updateUserProfilePicture']);

$app->run();