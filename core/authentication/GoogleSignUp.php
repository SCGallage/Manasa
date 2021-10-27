<?php


namespace core\authentication;


use core\Application;
use core\DatabaseService;
use Google\Client;
use Google\Service\Oauth2;
use Google_Client;
use Google_Service_Oauth2;

class GoogleSignUp
{

    private Google_Client $google_Client;
    private Google_Service_Oauth2 $google_Service_Oauth2;

    public function __construct($type)
    {
        $this->google_Client = new Google_Client();
        $this->google_Client->setAccessToken('client_secret.json');
        $this->google_Client->setClientId($_ENV["CLIENT_ID"]);
        $this->google_Client->setClientSecret($_ENV["CLIENT_SECRET"]);
        if ($type === 'login')
            $this->google_Client->setRedirectUri("http://localhost/validatelogin");
        else
            $this->google_Client->setRedirectUri("http://localhost/details");
        $this->google_Client->addScope("profile");
        $this->google_Client->addScope("email");
    }

    public function createAuthenticationUrl(string $type): string
    {
//        $this->google_Client->setAccessToken('client_secret.json');
//        $this->google_Client->setClientId($_ENV["CLIENT_ID"]);
//        $this->google_Client->setClientSecret($_ENV["CLIENT_SECRET"]);
//        if ($type === 'login')
//            $this->google_Client->setRedirectUri("http://localhost/validatelogin");
//        else
//            $this->google_Client->setRedirectUri("http://localhost/details");
//        $this->google_Client->addScope("profile");
//        $this->google_Client->addScope("email");
        return $this->google_Client->createAuthUrl();
    }

    public function getUserAccountDetails(string $authCode): Oauth2\Userinfo
    {
        $token = $this->google_Client->fetchAccessTokenWithAuthCode($authCode);
        $this->google_Client->setAccessToken($token['access_token']);
        $this->google_Service_Oauth2 = new Google_Service_Oauth2($this->google_Client);
        $this->google_Service_Oauth2->userinfo_v2_me->get();
        return $this->google_Service_Oauth2->userinfo->get();
    }

    public function checkGoogleUserAlreadyExists(string $googleId)
    {
        if (Application::$app->databaseService->select("users", "*", [ "google_id" => $googleId ],
                DatabaseService::FETCH_COUNT) === 0)
            return false;

        return true;
    }

}