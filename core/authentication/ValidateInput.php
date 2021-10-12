<?php


namespace core\authentication;


use core\Application;
use core\DatabaseService;

class ValidateInput
{

    public function validateUsername($username)
    {
        if (Application::$app->databaseService->
            select('user', '*', [ "username" => $username ], DatabaseService::FETCH_COUNT) === 0)
            return true;

        return false;
    }

    public function validateEmail($email)
    {
        if (Application::$app->databaseService->
            select('user', '*', [ "email" => $email ], DatabaseService::FETCH_COUNT) === 0)
            return true;

        return false;
    }

}