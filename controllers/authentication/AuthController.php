<?php

namespace controllers\authentication;

use core\Application;
use core\authentication\AuthenticatorModule;
use core\authentication\GoogleSignUp;
use core\authentication\ValidateInput;
use core\Controller;
use core\DatabaseService;
use core\Model;
use core\Request;
use core\sessions\SessionManagement;
use models\users\Caller;
use models\users\Staff;
use models\users\User;
use util\CommonConstants;

class AuthController extends Controller
{

    private User $user;
    private ValidateInput $validateInput;
    private GoogleSignUp $googleSignUp;
    private AuthenticatorModule $authenticatorModule;

    public function __construct()
    {
        $this->setLayout('main');
        $this->user = new User();
        $this->validateInput = new ValidateInput();
    }

    public function login(Request $request)
    {
        //session_start();
        if ($request->isGet()) {
            $this->googleSignUp = new GoogleSignUp('login');
            $authenticationUrl = $this->googleSignUp->createAuthenticationUrl('login');
            return $this->render('user\login', 'Manasa | Login', [ "auth_url" => $authenticationUrl ]);
        }

        //print_r($request->getBody());
        $userData = $this->user->login($request->getBody());
        print_r($userData);
        if ($userData === false)
            echo 'Failed';
        if ($userData != false) {
            SessionManagement::set_session_data('loggedIn', true);
            SessionManagement::set_session_data('user_name', $userData['username']);
            SessionManagement::set_session_data('user_id', $userData['user_id']);
            SessionManagement::set_session_data('profile_pic', $userData['profile_pic']);
            if ($userData['user_type'] == 'Befriender') {
                SessionManagement::set_session_data('user_data', 'Befriender');
                Application::$app->response->setRedirectUrl('/befriender/dashboard?befid='.SessionManagement::get_session_data('user_id'));
            }
            if ($userData['user_type'] == 'Normal') {
                SessionManagement::set_session_data('user_data', 'Caller');
                Application::$app->response->setRedirectUrl('/callerHome');
            }
            if ($userData['user_type'] == 'Administrator') {
                SessionManagement::set_session_data('user_data', 'Administrator');
                Application::$app->response->setRedirectUrl('/admin/AdminDash');
            }


            if ($userData['user_type'] == CommonConstants::USER_TYPE_VOLUNTEER) {
                SessionManagement::set_session_data('user_data', CommonConstants::USER_TYPE_VOLUNTEER);
                Application::$app->response->setRedirectUrl('/volunteerHome');
            }


            if ($userData['user_type'] == 'Moderator') {
                SessionManagement::set_session_data('user_data', 'Moderator');
                Application::$app->response->setRedirectUrl('/mod/ModDash');
            }

        }

        SessionManagement::set_session_data('failed', true);
        $this->googleSignUp = new GoogleSignUp('login');
        $authenticationUrl = $this->googleSignUp->createAuthenticationUrl('login');
        return $this->render('user\login', 'Manasa | Login', [ "auth_url" => $authenticationUrl ]);
//        if ($this->user->login($request->getBody()))
//            return $this->render('user\register', 'Manasa | Register');

        //return $this->render('users\register', 'Manasa | Register');
        //return $this->render('', '');
    }

    public function loginGoogleUser(Request $request)
    {
        session_start();
        $requestData = $request->getBody();

        if (array_key_exists('code', $requestData)){
            $this->googleSignUp = new GoogleSignUp('login');
            $googleUserProfile = $this->googleSignUp->getUserAccountDetails($requestData['code']);
            $userType = $this->user->checkGoogleLoginExists($googleUserProfile->id);

            if (!$userType)
                SessionManagement::set_session_data('failed', true);

            if ($userType === 'Befriender') {
                SessionManagement::set_session_data('loggedIn', true);
                //SessionManagement::set_session_data('user_data', $userData);
                //if ($userData['user_type'] == 'Befriender')
                Application::$app->response->setRedirectUrl('/dashboard');
            }

            //return $this->render('users\googleSignUp', 'Manasa | Register', $profileDetails);
        }

    }

    public function register(Request $request)
    {
        if ($request->isGet()) {
            $this->googleSignUp = new GoogleSignUp('register');
            $authenticationUrl = $this->googleSignUp->createAuthenticationUrl("register");
            return $this->render('user\register', 'Manasa | Register', [ "auth_url" => $authenticationUrl ]);
        }
        $postData = $request->getBody();
        print_r($request->getBody());
        if ($this->validateInput->validateEmail($postData['email']) && $this->validateInput->validateUsername($postData['username'])) {
            if ($postData['usertype'] === 'Befriender' || $postData['usertype'] === 'Volunteer') {
                $postData['type'] = 'staff';
                $lastId = $this->user->register($postData);
                $postData['lastId'] = $lastId;
                $staff = new Staff();
                $cv_file = $request->get_file();
                $cv_file->upload_file();
                $postData['cv'] = $cv_file->getFileName();
                $staff->saveStaff($postData);
            } elseif ($postData['usertype'] === 'Normal' || $postData['usertype'] === 'Anonymous') {
                if ($postData['usertype'] === 'Anonymous') {
                    $postData['dateOfBirth'] = '2020-10-10';
                }
                $postData['type'] = 'caller';
                $lastId = $this->user->register($postData);
                $postData['lastId'] = $lastId;
                $caller = new Caller();
                $caller->saveCaller($postData);
            }
            //$this->users->sendRegistrationEmail($postData['username'], $postData['email']);
        }
        Application::$app->response->setRedirectUrl('/login');
    }

    public function registerGoogleUser(Request $request)
    {
        session_start();
        $requestData = $request->getBody();
        if ($request->isPost()) {
            $data = SessionManagement::get_session_data('googleAccountInfo');
            print_r($data);
            print_r($requestData);
            $data['username'] = $requestData['username'];
            $data['dateOfBirth'] = $requestData['dateOfBirth'];
            $data['gender'] = $requestData['gender'];
            if ($requestData['usertype'] === "Befriender" || $requestData['usertype'] === "Volunteer") {
                $data['type'] = 'staff';
                $lastId = $this->user->save($data);
                $caller = new Staff();
                $cv_file = $request->get_file();
                $cv_file->upload_file();
                $data['cv'] = $cv_file->getFileName();
                $caller->saveStaff([
                    "lastId" => $lastId,
                    "fname" => $data["firstname"],
                    "lname" => $data["lastname"],
                    "cv" => $data["cv"],
                    "usertype" => $requestData["usertype"]
                ]);
            }
            elseif ($requestData['usertype'] === "Normal" || $requestData['usertype'] === "Anonymous") {
                $data['type'] = 'caller';
                $lastId = $this->user->save($data);
                $caller = new Caller();
                $caller->saveCaller([
                    "id" => $lastId,
                    "fname" => $data["firstname"],
                    "lname" => $data["lastname"],
                    "type" => $requestData["usertype"]
                ]);
            }
            /*$lastId = $this->user->save($data);
            $caller = new Caller();
            $caller->saveCaller([
                "id" => $lastId,
                "fname" => $data["firstname"],
                "lname" => $data["lastname"],
                "type" => $requestData["usertype"]
            ]);*/
            Application::$app->response->setRedirectUrl('\login');
            //return $this->render('user\login', 'Manasa | Login');
        }
        if (array_key_exists('code', $requestData)){
            $this->googleSignUp = new GoogleSignUp('register');
            $googleUserProfile = $this->googleSignUp->getUserAccountDetails($requestData['code']);
            $profileDetails = [
                "google_id" => $googleUserProfile->id, "firstname" => explode(" ",$googleUserProfile->name, 2)[0],
                "lastname" => $googleUserProfile->familyName, "email" => $googleUserProfile->email, "gender" => $googleUserProfile->gender
            ];
            SessionManagement::set_session_data('googleAccountInfo', $profileDetails);
            $this->setLayout('reset');
            return $this->render('user\googleSignUp', 'Manasa | Register', $profileDetails);
        }

    }

    public function logout()
    {
        $this->user->logout();
        Application::$app->response->setRedirectUrl('/login');
    }

    public function resetPassword(Request $request)
    {
        $this->authenticatorModule = new AuthenticatorModule(Application::$app->database);
        if ($request->isPost()) {
            $data = $request->getBody();
            $count = Application::$app->databaseService->select("user",
                ['email'],
                ['email' => $data['email']], DatabaseService::FETCH_COUNT);
            if ($count !== 0)
                $this->authenticatorModule->generate_reset_entry($data['email']);
            return $this->render('user\resetEmailSent');
        }
        $this->setLayout('reset');
        return $this->render('user\enterResetEmail');
    }

    public function updatePassword(Request $request)
    {
        session_start();
        $this->authenticatorModule = new AuthenticatorModule(Application::$app->database);
        if ($request->isPost()){
            //Application::$app->auth->update_password($data['password'], $email);
            $data = $request->getBody();
            print_r($data);
            $email = Application::$app->databaseService->select('pr_token',
                ['email'],
                ['token' => SessionManagement::get_session_data('token')],
                DatabaseService::FETCH_ALL);
            $this->authenticatorModule->update_password($data['password'],
                $email[0]['email'],
                SessionManagement::get_session_data('token'));
            return $this->render('user\login', 'Manasa | Login');
        }
        $data = $request->getBody();
        $email = $this->authenticatorModule->check_token($data['token']);
        print_r($data);
        $this->setLayout('reset');
        if (gettype($email) === 'string') {
            SessionManagement::set_session_data('token', $data['token']);
            return $this->render('user/enterNewPassword');
        } else
            return $this->render('user/enterNewPassword');
    }

    public function checkExistingUsernameOrEmail (Request $request) {
        $jsonRequestData = $request->getJsonBody();
        if ($jsonRequestData['type'] === 'email')
            $validity = $this->validateInput->validateEmail($jsonRequestData['value']);

        if ($jsonRequestData['type'] === 'username')
            $validity = $this->validateInput->validateUsername($jsonRequestData['value']);
        Application::$app->response->setContentTypeJson();
        return json_encode([ "valid" => $validity ], JSON_NUMERIC_CHECK);
    }

}