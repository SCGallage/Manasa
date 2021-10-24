<?php

require_once __DIR__.'/../core/vendor/autoload.php';
require_once './autoload.php';

use controllers\CallerController;
use controllers\SupportGroupController;
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

$app = new Application(dirname(__DIR__), $config);

/* Testing routes only */
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->get('/callerHome', [CallerController::class, 'loadCallerHome']);
$app->router->get('/callerSupportGroupsList', [SupportGroupController::class, 'loadSupportGroupsList']);

/* insert new ones here */

$app->run();