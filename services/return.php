<?php
include 'vendor/autoload.php';
use Firebase\JWT\JWT;

$key = "8eQQA70VpXP0y0m7ZcgNgMU6vNaDmye3SvTI";
$payload = array(
    "iss" => "dwx4Y06jQTWeGgDAhyBaXg",
    "exp" => strtotime("21:21:21")
);

$jwt = JWT::encode($payload, $key);
echo $jwt;

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.zoom.us/v2/users?status=active&page_size=30&page_number=1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "authorization: Bearer $jwt",
        "content-type: application/json"
    ),
));

$response = curl_exec($curl);
echo $response;
//print_r($payload);