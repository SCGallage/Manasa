<?php

namespace core\authentication;

class SecurityToken
{


    /**
     * SecurityToken constructor.
     */
    public function __construct()
    {
    }

    public function generateToken($length) : string
    {
        $token = openssl_random_pseudo_bytes($length);
        return bin2hex($token);
    }

    public function generatePIN($length) : int
    {
        $randomPIN = null;
        for ($i = 0; $i <= $length; $i++){
            $randomPIN .= mt_rand(0, 9);
        }
        return $randomPIN;
    }

}