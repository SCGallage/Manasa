<?php


namespace core\authentication;


use Google_Service_Oauth2;

class GoogleAuthenticator
{
    private \Google_Client $google_Client;
    private Google_Service_Oauth2 $google_Service_Oauth2;

    public function __construct()
    {
        $this->google_Client = new \Google_Client();
        $this->set_google_client_details();
        $this->google_Client->addScope("profile");
    }

    public function get_auth_url(): string
    {
        return $this->google_Client->createAuthUrl();
    }

    public function get_details()
    {
        $token = $this->google_Client->fetchAccessTokenWithAuthCode($_GET['code']);
        $this->google_Client->setAccessToken($token['access_token']);
        $this->google_Service_Oauth2 = new Google_Service_Oauth2($this->google_Client);
        print_r($this->google_Service_Oauth2->userinfo->get());
    }

    public function set_google_client_details()
    {
        //$this->google_Client->setAccessToken('client_secret.json');
        $this->google_Client->setClientId("716792595656-3ft9hljje34p965pveou4ao8lu8tl7lh.apps.googleusercontent.com");
        $this->google_Client->setClientSecret("ex8v0g1o7pZNFsyU77q6U_zQ");
        $this->google_Client->setRedirectUri("http://localhost/google");
    }



    public function getPayload($payload)
    {

    }

}