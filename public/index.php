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

$app->router->get('/dashboard', [BefrienderController::class, 'loadBefrienderDashboard', 'Befriender']);
$app->router->get('/appointments', [BefrienderController::class, 'loadBefrienderAppointments']);
$app->router->get('/reports', [BefrienderController::class, 'loadBefrienderReports']);
$app->router->get('/supportgroup', [BefrienderController::class, 'loadBefrienderSupportGroup']);

$app->router->get('/bef/sg_request', [BefrienderController::class, 'addSupportGroupRequest']);
$app->router->post('/bef/sg_request', [BefrienderController::class, 'addSupportGroupRequest']);


/* Caller Views */
$app->router->get('/callerHome', [CallerController::class, 'loadCallerHome']);
$app->router->get('/callerSupportGroupsList', [SupportGroupController::class, 'callerLoadSupportGroupsList']);
$app->router->get('/callerSupportGroupHomeMember', [SupportGroupController::class, 'callerLoadSupportGroupHomeMember']);
$app->router->get('/callerSupportGroupHomeVisitor', [SupportGroupController::class, 'callerSupportGroupHomeVisitor']);
$app->router->get('/viewSupportGroupEvent', [SupportGroupController::class, 'viewSupportGroupEvent']);
$app->router->get('/profile', [CallerController::class, 'loadCallerProfile']);
$app->router->get('/updateProfile', [CallerController::class, 'loadUpdateCallerProfileForm']);
$app->router->get('/appointments', [CallerAppointmentController::class, 'loadAppointmentsPage']);
$app->router->post('/appointmentLink', [CallerAppointmentController::class, 'loadAppointmentLink']);
$app->router->post('/appointmentInfo', [CallerAppointmentController::class, 'loadAppointmentInfo']);
$app->router->get('/loadDonateForm', [DonateController::class, 'loadDonateForm']);
$app->router->get('/callNow', [CallerAppointmentController::class, 'loadCallNow']);
$app->router->post('/timeslots', [CallerAppointmentController::class, 'loadTimeslots']);

/* Volunteer views */
$app->router->get('/volunteerHome', [VolunteerController::class, 'loadVolunteerHome']);
$app->router->get('/volunteerProfile', [VolunteerController::class, 'loadVolunteerProfile']);



$app->run();