<?php


namespace core;


class Validation
{

    const EMAIL_REGEX = "/^([a-z\d\.-]+)@([a-z-]+).([a-z-]+)$/";
    const PASSWORD_REGEX = "";

    function emailValidation(string $email): bool|int
    {

        return preg_match(Validation::EMAIL_REGEX, $email);

    }

    function passwordValidation(string $password): bool|int
    {

        return preg_match(Validation::PASSWORD_REGEX, $password);

    }

    function checkForPassedDate(string $date): bool
    {

        $todayDate = date_create(date('Y-m-d'));
        $dateToCompare = date_create($date);
        $diffInDays = date_diff($todayDate, $dateToCompare);

        if ($diffInDays['interval'] !== 1)
            return true;
        else
            return false;

    }

    function dateDifference(string $firstDate, string $secondDate): bool
    {
        $firstDate = date_create($firstDate);
        $secondDate = date_create($secondDate);
        $diffInDays = date_diff($firstDate, $secondDate);

        if ($diffInDays['interval'] !== 1)
            return true;
        else
            return false;

    }

}