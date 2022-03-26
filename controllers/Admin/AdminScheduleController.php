<?php

namespace controllers\Admin;

use core\Controller;
use core\DatabaseService;
use core\Request;
use core\sessions\SessionManagement;
use DateInterval;
use DatePeriod;
use models\reserve;
use models\schedule;
use DateTime;
use models\shift;
use models\users\Staff;
use models\volunteerparticipants;

class AdminScheduleController extends Controller
{

    public function Schedule()
    {

        $scheduleData = new schedule();
        $sqlStatement1 = "select * from schedule where week(startDate)=week(now())";
        $scheduleInfo =  $scheduleData->customSqlQuery($sqlStatement1,DatabaseService::FETCH_ALL);



        foreach ($scheduleInfo as $data) {
        $period = new DatePeriod(
            new DateTime($data["startDate"]),
            new DateInterval('P1D'),
            new DateTime($data["endDate"])
        );}

//        Dates for the time duration
        $array = array();

        foreach ($period as $key => $value) {
            $Store = $value->format('Y-m-d');
            $array[] = $Store;
        }

        $endDate = $data['endDate'];
        array_push($array,$endDate);

//        Selecting morning shifts
        $sqlStatement2 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                            WHERE s.scheduleId = '$data[scheduleId]' AND startTime='08:00:00' AND shift.date BETWEEN s.startDate AND DATE_ADD(s.startDate , INTERVAL 6 DAY )";

        $morningShifts1 = $scheduleData->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);

        $sqlStatement3 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                        WHERE s.scheduleId = '$data[scheduleId]' AND startTime='08:00:00' AND shift.date BETWEEN DATE_ADD(s.startDate , INTERVAL 7 DAY ) AND s.endDate";
        $morningShifts2 = $scheduleData->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);

//        selecting evening shifts
        $sqlStatement4 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                        WHERE s.scheduleId = '$data[scheduleId]' AND startTime='13:00:00' AND shift.date BETWEEN s.startDate AND DATE_ADD(s.startDate , INTERVAL 6 DAY )";

        $eveningShifts1 = $scheduleData->customSqlQuery($sqlStatement4,DatabaseService::FETCH_ALL);

        $sqlStatement5 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                        WHERE s.scheduleId = '$data[scheduleId]' AND startTime='13:00:00' AND shift.date BETWEEN DATE_ADD(s.startDate , INTERVAL 7 DAY ) AND s.endDate";
        $eveningShifts2 = $scheduleData->customSqlQuery($sqlStatement5,DatabaseService::FETCH_ALL);

        $params = [
            'array' => $array,
            'morningShifts1' => $morningShifts1,
            'morningShifts2' => $morningShifts2,
            'eveningShifts1' => $eveningShifts1,
            'eveningShifts2' => $eveningShifts2,
            'scheduleInfo' => $scheduleInfo
        ];

        return $this->render('Admin/Schedule', 'Schedule',$params);

    }

    public function UpcomingSchedule()
    {

        $scheduleData = new schedule();
        $sqlStatement = "SELECT * FROM schedule ORDER BY scheduleId DESC LIMIT 1";
        $scheduleInfo = $scheduleData->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);


        foreach ($scheduleInfo as $data) {
            $period = new DatePeriod(
                new DateTime($data["startDate"]),
                new DateInterval('P1D'),
                new DateTime($data["endDate"])
            );}

//        Dates for the time duration
        $array = array();

        foreach ($period as $key => $value) {
            $Store = $value->format('Y-m-d');
            $array[] = $Store;
        }

        $endDate = $data['endDate'];
        array_push($array,$endDate);

//        Selecting morning shifts
        $sqlStatement2 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                            WHERE s.scheduleId = '$data[scheduleId]' AND startTime='08:00:00' AND shift.date BETWEEN s.startDate AND DATE_ADD(s.startDate , INTERVAL 6 DAY )";

        $morningShifts1 = $scheduleData->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);

        $sqlStatement3 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                        WHERE s.scheduleId = '$data[scheduleId]' AND startTime='08:00:00' AND shift.date BETWEEN DATE_ADD(s.startDate , INTERVAL 7 DAY ) AND s.endDate";
        $morningShifts2 = $scheduleData->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);

//        selecting evening shifts
        $sqlStatement4 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                        WHERE s.scheduleId = '$data[scheduleId]' AND startTime='13:00:00' AND shift.date BETWEEN s.startDate AND DATE_ADD(s.startDate , INTERVAL 6 DAY )";

        $eveningShifts1 = $scheduleData->customSqlQuery($sqlStatement4,DatabaseService::FETCH_ALL);

        $sqlStatement5 = "SELECT shift.* FROM shift JOIN schedule s on s.scheduleId = shift.scheduleId
                        WHERE s.scheduleId = '$data[scheduleId]' AND startTime='13:00:00' AND shift.date BETWEEN DATE_ADD(s.startDate , INTERVAL 7 DAY ) AND s.endDate";
        $eveningShifts2 = $scheduleData->customSqlQuery($sqlStatement5,DatabaseService::FETCH_ALL);

        $params = [
            'array' => $array,
            'morningShifts1' => $morningShifts1,
            'morningShifts2' => $morningShifts2,
            'eveningShifts1' => $eveningShifts1,
            'eveningShifts2' => $eveningShifts2,
            'scheduleInfo' => $scheduleInfo
        ];

        return $this->render('Admin/ScheduleUpcoming', 'Upcoming Schedule',$params);

    }

    public function FixSchedule(Request $request)
    {

        $shift = new shift();
        $data = $request->getBody();
        $sqlStatement = "SELECT shift.* FROM shift WHERE scheduleId='$data[scheduleId]' AND num_of_befrienders<5";
        $emptySlots = $shift->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $emptySlotsCount = $shift->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);

        $params = [
            'emptySlots' => $emptySlots,
            'emptySlotsCount' => $emptySlotsCount,
            'data' => $data
        ];
        return $this->render('Admin/ScheduleUpdate', 'Fix Schedule',$params);

    }

    public function selectSchedule(Request $request){

        $data = $request->getBody();

        $shift = new shift();
        $shiftData = $shift->select('shift','*',['shiftId' => $data["id"]],DatabaseService::FETCH_ALL);

        $befrienderData = new reserve();
        $sqlStatement = "SELECT r.*, s.fname, s.lname FROM reserve r left join staff s on s.id = r.befrienderId WHERE r.shiftId='$data[id]'";
        $befrienderParticipate = $befrienderData->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
        $befrienderParticipateCount = $befrienderData->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);


//        setting shift id to session
        SessionManagement::set_session_data('shiftID',$data['id']);

        $availableBefrienderData = new Staff();
        $sqlStatement2 = "select s.* from staff s where s.type = 'befriender' AND s.state = 1
                          AND s.id not in (SELECT r.befrienderId FROM reserve r left join staff s on s.id = r.befrienderId WHERE r.shiftId= '$data[id]')
                            AND s.id not in (SELECT s.id FROM reserve r left join staff s on s.id = r.befrienderId JOIN shift s2 on s2.shiftId = r.shiftId
                            WHERE s2.scheduleId= $data[scheduleId] GROUP BY r.befrienderId having COUNT(r.befrienderId) >= 4);";
        $availableBefriender = $availableBefrienderData->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);

        $params =[
            'befrienderParticipate' => $befrienderParticipate,
            'befrienderParticipateCount' => $befrienderParticipateCount,
            'availableBefriender' => $availableBefriender,
            'data' => $data,
            'shiftData' => $shiftData,
        ];
        return $this->render('Admin/ScheduleSelect','Select Participants',$params);
    }

    public function removeBefriender(Request $request)
    {
        if ($request->isGet()) {
            $deleteReq = new reserve();
            $data = $request->getBody();
            $removeBefriender = $deleteReq->executeStoredProcedure("call removeBefriender(".$data['id'].",".$data['shiftId'].")");
            header("location:/admin/ScheduleSelect?id=".SessionManagement::get_session_data('shiftID')."&scheduleId=".$data['scheduleId']);

        }
    }

    public function assignBefriender(Request $request){
        if ($request->isPost()) {
            $data = $request->getBody();
            print_r($data);
            $assignSchedule = new schedule();
            $AssignBefriender = $assignSchedule->executeStoredProcedure("call assignBefriender(".$data['befrienderId'].",".$data['shiftId'].")");
            header("location:/admin/ScheduleSelect?id=".SessionManagement::get_session_data('shiftID')."&scheduleId=".$data['scheduleId']); // redirects to user requests page

        }
    }

    public function closeSlot(Request $request){
        if ($request->isPost()) {
            $shiftData = new shift();
            $data = $request->getBody();

            $closeSlot = $shiftData->update('shift', ["state" => '1'], ["shiftId" => $data["shiftId"]]);
            header("location:/admin/ScheduleSelect?id=".SessionManagement::get_session_data('shiftID')."&scheduleId=".$data['scheduleId']);
        }

    }

    public function openSlot(Request $request){
        if ($request->isPost()) {
            $shiftData = new shift();
            $data = $request->getBody();

            $closeSlot = $shiftData->update('shift', ["state" => '0'], ["shiftId" => $data["shiftId"]]);
            header("location:/admin/ScheduleSelect?id=".SessionManagement::get_session_data('shiftID')."&scheduleId=".$data['scheduleId']);
        }

    }

    public function lockSchedule(Request $request){
        if ($request->isPost()) {
            $scheduleData = new schedule();
            $data = $request->getBody();

            $scheduleData->update('schedule', ["state" => '1'], ["scheduleId" => $data["scheduleId"]]);
            header("location:/admin/Schedule");
        }

    }

    public function unlockSchedule(Request $request){
        if ($request->isPost()) {
            $scheduleData = new schedule();
            $data = $request->getBody();

            $scheduleData->update('schedule', ["state" => '0'], ["scheduleId" => $data["scheduleId"]]);
            header("location:/admin/Schedule");
        }

    }

    public function lockUpcomingSchedule(Request $request){
        if ($request->isPost()) {
            $scheduleData = new schedule();
            $data = $request->getBody();

            $scheduleData->update('schedule', ["state" => '1'], ["scheduleId" => $data["scheduleId"]]);
            header("location:/admin/upcomingSchedule");
        }

    }

    public function unlockUpcomingSchedule(Request $request){
        if ($request->isPost()) {
            $scheduleData = new schedule();
            $data = $request->getBody();

            $scheduleData->update('schedule', ["state" => '0'], ["scheduleId" => $data["scheduleId"]]);
            header("location:/admin/upcomingSchedule");
        }

    }

//    public function createSchedule(Request $request)
//    {
//        if ($request->isPost()){
//            $createSchedule = new schedule();
//            $data = $request->getBody();
//
//            $from_date =$data['startDate'];
//            $to_date =$data['endDate'];
////            $startDate =$data['startDate'];
//
//            $from_date = new DateTime($from_date);
//            $to_date = new DateTime($to_date);
//
//
//            $save = $createSchedule->save($data);
//
////            get schedule ID
//            $scheduleId = $createSchedule->select('schedule','scheduleId',["startDate" => $startDate],DatabaseService::FETCH_ALL);
////            Creating shifts
//
//            print_r($scheduleId);
//            $createShift = new shift();
//
//            if ($save){
//                for ($date = $from_date; $date <= $to_date; $date->modify('+1 day')) {
////                    echo $date->format('l') . "\n";
//                    $saveDate = $date->format('Y-m-d');
//
//                    for ($i=1; $i<= 2; $i++) {
//                        if ($i == 1) {
//                            $sqlStatement = "INSERT INTO shift (date,startTime,endTime) VALUE ('$saveDate',080000,120000);";
//                            $createShift->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
//                        }else{
//                            $sqlStatement = "INSERT INTO shift (date,startTime,endTime) VALUE ('$saveDate',130000,170000);";
//                            $createShift->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
//                        }
//                    }
//                }
//            }
//
//        }
//
//        return $this->render('Admin/ScheduleCreate', 'Create Schedule');
//
//    }


}