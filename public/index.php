<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__.'/../core/vendor/autoload.php';
require_once './autoload.php';


use controllers\authentication\AuthController;
use controllers\befriender\BefrienderController;
use controllers\caller\CallerAppointmentController;
use controllers\caller\CallerController;
use controllers\DonateController;
use controllers\supportgroup\SupportGroupController;
use controllers\volunteer\VolunteerController;
use core\Application;
use controllers\SiteController;
use core\DotEnv;
use controllers\Admin\AdminController;

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

/* API endpoints */

/* SupportGroup Requests */
$app->router->get('/api/v1/supportgroup/requests', [SupportGroupController::class, 'getSupportGroupRequests']);
$app->router->post('/api/v1/supportgroup/requestDecision', [SupportGroupController::class, 'supportGroupRequestDecision']);

/* SupportGroup Members */
$app->router->get('/api/v1/supportgroup/members', [SupportGroupController::class, 'getSupportGroupMembers']);
$app->router->post('/api/v1/supportgroup/remove_member', [SupportGroupController::class, 'removeMemberFromSupportGroup']);

$app->router->post('/api/v1/auth/validate', [AuthController::class, 'checkExistingUsernameOrEmail']);

/* Befriender Views */


$app->router->get('/befriender/dashboard', [BefrienderController::class, 'loadBefrienderDashboard', 'Befriender']);
$app->router->get('/befriender/appointments', [BefrienderController::class, 'loadBefrienderAppointments']);
$app->router->get('/befriender/reports', [BefrienderController::class, 'loadBefrienderReports']);
$app->router->get('/befriender/supportgroup', [BefrienderController::class, 'loadBefrienderSupportGroup']);
$app->router->get('/befriender/schedule', [BefrienderController::class, 'befrienderSchedule']);

$app->router->get('/befriender/sg_request', [BefrienderController::class, 'addSupportGroupRequest']);
$app->router->post('/befriender/sg_request', [BefrienderController::class, 'addSupportGroupRequest']);

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

//admin views
$app->router->get('/admin/Volunteer', [AdminController::class, 'Volunteer']);
$app->router->get('/admin/Schedule', [AdminController::class, 'Schedule']);
$app->router->get('/admin/FixSchedule', [AdminController::class, 'FixSchedule']);
$app->router->get('/admin/GenReport', [AdminController::class, 'GenReport']);
$app->router->get('/admin/SessionReport', [AdminController::class, 'SessionReport']);

//admin user function
$app->router->get('/admin/SearchUsers', [AdminController::class, 'SearchUsers']);

//add users
$app->router->get('/admin/addUsers', [AdminController::class, 'createUser']);
$app->router->post('/admin/addUsers', [AdminController::class, 'createUser']);

$app->router->get('/admin/deleteUser', [AdminController::class, 'deleteUser']);

//User requests
$app->router->get('/admin/UserRequests', [AdminController::class, 'UserRequests']);
$app->router->post('/admin/UserRequests', [AdminController::class, 'UserRequestsUpdate']);
$app->router->get('/admin/UserRequestsDelete', [AdminController::class, 'UserRequestsDelete']);

$app->router->get('/cvdownload', [AdminController::class, 'cvDownload']);

//moderator views
//moderator landing page
$app->router->get('/mod/ModDash', [AdminController::class, 'Modhome']);
$app->router->get('/mod/ModUsers', [AdminController::class, 'ModUsers']);
$app->router->get('/mod/Volunteer', [AdminController::class, 'ModVolunteer']);
$app->router->get('/mod/Schedule', [AdminController::class, 'ModSchedule']);
$app->router->get('/mod/FixSchedule', [AdminController::class, 'ModFixSchedule']);

$app->router->get('/mod/UserRequests', [AdminController::class, 'ModUserRequests']);
$app->router->post('/mod/UserRequests', [AdminController::class, 'ModUserRequestsUpdate']);
$app->router->get('/mod/UserRequestsDelete', [AdminController::class, 'ModUserRequestsDelete']);


/* Caller Views */
$app->router->get('/callerHome', [CallerController::class, 'loadCallerHome']);
$app->router->get('/callerSupportGroupsList', [SupportGroupController::class, 'callerLoadSupportGroupsList']);
$app->router->get('/callerSupportGroupHome', [SupportGroupController::class, 'supportGroupHome']);
$app->router->get('/viewSupportGroupEvent', [SupportGroupController::class, 'viewSupportGroupEvent']);
$app->router->get('/cancelSgEventParticipation', [SupportGroupController::class, 'cancelSgEventParticipation']);
$app->router->get('/profile', [CallerController::class, 'loadCallerProfile']);
$app->router->get('/updateProfile', [CallerController::class, 'loadUpdateCallerProfileForm']);
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

/* Visitor views*/
$app->router->get('/callNowVisitor', [CallerAppointmentController::class, 'loadCallNow']);
$app->router->get('/callNowVisitor', [CallerAppointmentController::class, 'loadCallNow']);

/* Volunteer views */
$app->router->get('/volunteerHome', [VolunteerController::class, 'loadVolunteerHome']);
$app->router->get('/participateVolunteerEvent', [VolunteerController::class, 'participateVolunteerEvent']);
$app->router->get('/cancelParticipationVolunteerEvent', [VolunteerController::class, 'cancelEventParticipation']);
$app->router->get('/volunteerProfile', [VolunteerController::class, 'loadVolunteerProfile']);
$app->router->get('/updateVolunteerProfile', [VolunteerController::class, 'loadVolunteerProfileUpdateForm']);
$app->router->get('/volunteerParticipatedEvents', [VolunteerController::class, 'loadParticipatedEvents']);




//terms and conditions
$app->router->get('/TermsandConditions', '/TermsandConditions');

$app->run();