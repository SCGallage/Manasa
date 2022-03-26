<?php

namespace controllers;

use core\Request;
use models\users\User;
use util\CommonConstants;

class DonateController extends \core\Controller
{
    public function loadDonateForm(): array|bool|string
    {
        if(isset($_SESSION[CommonConstants::SESSION_LOGGED_IN]) && !empty($_SESSION[CommonConstants::SESSION_LOGGED_IN])) {
            //load Call now function for Caller
            $this->setLayout('caller/callerFunction');
        } else {
            //load Call now function for Visitor
            $this->setLayout('user/visitorFunction');
        }

        return $this->render('user/donate/donateForm', 'Donate Form');
    }

    public function saveDonation(Request $request)
    {
        $requestBody = $request->getBody();
        $merchant_id         = $requestBody['merchant_id'];
        $order_id             = $requestBody['order_id'];
        $payhere_amount     = $requestBody['payhere_amount'];
        $payhere_currency    = $requestBody['payhere_currency'];
        $status_code         = $requestBody['status_code'];
        $md5sig                = $requestBody['md5sig'];

        $merchant_secret = '8m4NJ5D6mLZ4Eud0AZrRjT8Qkz2eVhR1W8LQxWSphSvQ';

        $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            //TODO: Update your database as payment success
            $user = new User();
            //set timezone
            date_default_timezone_set("Asia/Colombo");
            $today = date("Y-m-d");
            $requestBody['date'] = $today;
            $user->saveDonation($requestBody);
        }
    }

    public function failedDonation(): array|bool|string
    {
        $params = [
            'title' => "Donation Failed.",
            'message' => 'Donation failed. Please try again.',
            'messageType' => CommonConstants::MESSAGE_TYPE_ERROR,
            'link' => '/loadDonateForm',
            'linkType' => CommonConstants::LINK_TYPE_GET,
        ];

        $this->setLayout('caller/callerFunction');
        return $this->render('components/errorMessage', 'Manasa',$params);
    }
}