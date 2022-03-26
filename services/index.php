<?php
require_once './autoload.php';
use services\VirtualMeeting;
use services\ZoomApi;

require '../vendor/autoload.php';

//$url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;
//$url = "http://localhost:8080/return.php";
$url = "https://api.zoom.us/v2/users/GftXV4V_Q-CVzEM7HB01bQ/meetings";
/*$data = array(
    "topic" => "New API Test",
    "type" => 2,
    "pre_schedule" => false,
    "start_time" => "2021-09-25T11:54:17.469Z",
    "duration" => 90,
    "timezone" => "Asia/Colombo",
    "password" => 12345,
    "agenda" => "Testing the zoom api"
);
$zoomApi = new ZoomApi();
$result = $zoomApi->createNewMeeting($data);*/
$virtualMeeting = new VirtualMeeting();
//try {
//    $virtualMeeting->setMeetingOptions('The annual meeting', '2021-12-29', '12:00:00', 90, 'Small meeting regarding work.');
//} catch (Exception $e) {
//}
//
//$virtualMeeting->createMeeting();
//$virtualMeeting->deleteMeeting();
$virtualMeeting->getMeetingDetails(79976591670);
//$zoomApi->createZoomToken();
/*$json_data = json_encode($data);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6ImR3eDRZMDZqUVRXZUdnREFoeUJhWGciLCJleHAiOjE2MzEyODAwMjYsImlhdCI6MTYzMTE5MzYyNn0.FAaYhfXNUtRNgJzgxooEGGciPmrdYTxGNq_wO80RznI'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);

curl_close($curl);*/
/*print_r($result);
echo "<pre>$result</pre>";
 echo $url;*/