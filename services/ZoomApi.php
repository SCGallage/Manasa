<?php

namespace services;

use core\Model;
use Firebase\JWT\JWT;
//use ZoomApi\Database;

class ZoomApi
{

    const BASE_URL = 'https://api.zoom.us/v2/';
    const USER_ID = 'GftXV4V_Q-CVzEM7HB01bQ';
    const API_KEY = "dwx4Y06jQTWeGgDAhyBaXg";
    const API_SECRET = "8eQQA70VpXP0y0m7ZcgNgMU6vNaDmye3SvTI";


    /**
     * ZoomApi constructor.
     */
    public function __construct()
    {
        $this->PDO = new \PDO(
            'mysql:host=localhost;port=3306;dbname=manasa_db',
            'root',
            'root');
    }

    public static function createZoomToken(): string
    {

        $payload = array(
            "iss" => ZoomApi::API_KEY,
            "exp" => time() + 1000000
        );

        return JWT::encode($payload, ZoomApi::API_SECRET);

    }


    public static function authorize_token($options = [])
    {
        $data = ZoomApi::curl_request($options);
        $userid = $data['users']['id'];
        $fname = $data['users']['first_name'];
        $lname = $data['users']['last_name'];
        $email = $data['users']['email'];
        $type = $data['users']['type'];
        //$this->PDO->query("INSERT INTO zoom VALUES ('$userid', '$fname', '$lname', '$email', $type");
    }

    public static function createNewMeeting($options = [])
    {

        $json_data = json_encode($options);
        $response = ZoomApi::curl_request(array(
            CURLOPT_POSTFIELDS => $json_data,
            CURLOPT_HTTPHEADER => array('Content-Type:application/json',
                'Authorization:Bearer '.ZoomApi::createZoomToken()
            ),
            CURLOPT_RETURNTRANSFER => true
        ), 'users/'.ZoomApi::USER_ID.'/meetings');

        if ($response !== -1) {
            $meetingId = $response['id'];
            $topic = $response['topic'];
            $startTime = $response['start_time'];
            $createdTime = $response['created_at'];
            $joinUrl = $response['join_url'];
            $password = $response['password'];

            $sqlStatement = "INSERT INTO virtual_meeting 
                        VALUES ($meetingId, '$password', '$startTime', '$createdTime', '$joinUrl', '$topic')";
            echo $sqlStatement;
            return [
                "meetingId" => $meetingId,
                "topic" => $topic,
                "startTime" => $startTime,
                "password" => $password,
                "join_url" => $joinUrl,
                "created_at" => $response['created_at'],
                "duration" => $response['duration']
            ];
        }

        return $response;

    }

    public static function deleteMeeting(int $meetingId) {
        $response = ZoomApi::curl_request(array(
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => array(
                'Content-Type:application/json',
                'Authorization:Bearer '.ZoomApi::createZoomToken()
            ),
            CURLOPT_RETURNTRANSFER => true
        ), "/meetings/{$meetingId}");
    }

    public static function getMeetingDetails(int $meetingId) {
        $response = ZoomApi::curl_request(array(
            CURLOPT_HTTPHEADER => array(
                'Content-Type:application/json',
                'Authorization:Bearer '.ZoomApi::createZoomToken()
            ),
            CURLOPT_RETURNTRANSFER => true
        ), "/meetings/{$meetingId}");
        print_r($response);
    }

//    public static function delete_curl_request(string $url, string $requestType, array $options = []) {
//        $curl = curl_init(ZoomApi::BASE_URL.$url);
//        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
//        curl_setopt($curl)
//    }

    public static function curl_request($options = [], $url = '')
    {
        if ($url !== '') {
            $curl = curl_init(ZoomApi::BASE_URL.$url);
            //$curl = curl_init($url);
        }
        else
            $curl = curl_init();
        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            echo "cURL Error #: " . $err;
            return -1;
        } else {
            curl_close($curl);
            echo "reached";
            print_r(json_decode($response), true);
            return json_decode($response, true);
        }
    }
    
}