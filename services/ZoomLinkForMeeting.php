<?php

use services\VirtualMeeting;

require_once dirname(__FILE__).'/autoload.php';
require_once __DIR__.'/../core/vendor/autoload.php';
require_once '/mnt/d/Projects/Manasa/services/ZoomApi.php';
require_once '/mnt/d/Projects/Manasa/services/VirtualMeeting.php';
/*use core\DotEnv;

$dotenv = new DotEnv(dirname(__DIR__).'\.env');
$dotenv->load();
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];*/

//$virtualMeeting = new VirtualMeeting();
//try {
//    /*$virtualMeeting->setMeetingOptions("Annual Meeting", "2022-04-01", "12:00:00", 50);
//    $virtualMeeting->createMeeting();*/
//    $virtualMeeting->getMeetingDetails(74493268793);
//} catch (Exception $e) {
//}

$pdo = new \PDO("mysql:host=172.19.80.1;port=3306;dbname=manasa_db",
    "wsl_root",
    "password");
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
$statement = $pdo->query("select * from vmeet_temp where state = 0", \PDO::FETCH_ASSOC);
$virtualMeetings = $statement->fetchAll();
//print_r($virtualMeetings);

if (!empty($virtualMeetings)) {
    foreach ($virtualMeetings as $virtualMeeting) {
        $pdo->query("update vmeet_temp set state = 1 where meetingId = {$virtualMeeting['meetingId']}")->execute();
        $meeting = $pdo->query("select meeting.id, timeslot.startTime, timeslot.endTime, shift.date
            from meeting, timeslot, shift
            where meeting.timeslotId = timeslot.timeslotId and shift.shiftId = timeslot.shiftId and  meeting.id = {$virtualMeeting['meetingId']}")->fetch(PDO::FETCH_ASSOC);
        $vMeeting = new VirtualMeeting();
        try {
            $vMeeting->setMeetingOptions("Meeting ID: ".$meeting['id'], $meeting['date'], $meeting['startTime'], 120);
            $meetingDetails = $vMeeting->createMeeting();
            $sqlStatement = "INSERT INTO virtual_meeting 
                        VALUES ({$meetingDetails['meetingId']}, '{$meetingDetails['password']}', '{$meetingDetails['startTime']}', 
                                '{$meetingDetails['created_at']}', {$meetingDetails['duration']}, '{$meetingDetails['join_url']}', '{$meetingDetails['topic']}')";
            $pdo->query($sqlStatement)->execute();
            //$virtualMeeting->getMeetingDetails(74493268793);
        } catch (Exception $e) {
        }
        $pdo->query("update meeting set virtual_meeting = {$meetingDetails['meetingId']} where id = {$virtualMeeting['meetingId']}");
    }
}
/*$file = dirname(__FILE__) . '/output.txt';
foreach ($virtualMeetings as $virtualMeeting) {
    $data = "Virtual meeting for " . $virtualMeeting["meetingId"] . " and state " . $virtualMeeting["state"] . "\n";
    file_put_contents($file, $data, FILE_APPEND);
}*/

