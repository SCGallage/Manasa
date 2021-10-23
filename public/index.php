<?php

require_once __DIR__.'/../core/vendor/autoload.php';
require_once './autoload.php';

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

$app = new Application(dirname(__DIR__), $config);

/* Testing routes only */
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);

/* insert new ones here */

$app->router->post('/SupportGroup', [AdminController::class, 'supportGroup']);
$app->router->get('/SupportGroup', [AdminController::class, 'supportGroup']);

$app->router->get('/updateSG', [AdminController::class, 'updateSG']);
$app->router->post('/updatedSGform', [AdminController::class, 'updateSG']);

$app->router->get('/test', [AdminController::class, 'getSupportGroupRequests']);
$app->router->get('/test1', [AdminController::class, 'supportGroupRequestSecision']);
$app->router->get('/AdminDash', [AdminController::class, 'home']);

$app->router->get('/Volunteer', [AdminController::class, 'Volunteer']);

$app->router->get('/Schedule', [AdminController::class, 'Schedule']);

$app->router->get('/FixSchedule', [AdminController::class, 'FixSchedule']);

$app->router->get('/GenReport', [AdminController::class, 'GenReport']);

$app->router->get('/SessionReport', [AdminController::class, 'SessionReport']);

$app->router->get('/SearchUsers', [AdminController::class, 'SearchUsers']);
$app->router->post('/SearchUsers', [AdminController::class, 'SearchUsers']);

$app->router->get('/UserRequests', [AdminController::class, 'UserRequests']);
$app->router->post('/UserRequests', [AdminController::class, 'UserRequests']);
$app->router->get('/UserRequestsDelete', [AdminController::class, 'UserRequestsDelete']);

$app->router->get('/ModDash', [AdminController::class, 'Modhome']);

$app->router->get('/ModUsers', [AdminController::class, 'ModUsers']);

//$app->router->get('/test', [AdminController::class, 'test']);


$app->run();