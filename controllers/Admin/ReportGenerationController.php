<?php

namespace controllers\Admin;

use core\Controller;
use core\DatabaseService;
use core\Request;
use core\Model;
use models\donate;
use models\session_report;
use models\users\staff;
use models\supportgroup\supportGroup;
use models\users\User;
use models\volEvents;
use  core\setasign\fpdf\FPDF;


class ReportGenerationController extends Controller
{

    public function getAllVolEvent($startDate, $endDate){
        $volunteerEvent = new volEvents();
        $sqlStatement3 = "SELECT id From volunteer_event WHERE startDate BETWEEN CAST('$startDate' AS DATE) AND CAST('$endDate' AS DATE)";
        $allVolEvents = $volunteerEvent->customSqlQuery($sqlStatement3,DatabaseService::FETCH_COUNT);
        return $allVolEvents;

    }

    public function getAllExclusivelEvent($startDate, $endDate){
        $volunteerEvent = new volEvents();
        $sqlStatement3 = "SELECT id From volunteer_event WHERE startDate BETWEEN CAST('$startDate' AS DATE) AND CAST('$endDate' AS DATE) AND volunteer_event.type = 1";
        $allVolEvents = $volunteerEvent->customSqlQuery($sqlStatement3,DatabaseService::FETCH_COUNT);
        return $allVolEvents;

    }

    public function getTotalDonationDuration($startDate, $endDate): int|bool|array
    {
        $donate = new donate();
        $sqlStatement2 = "SELECT SUM(amount) AS Total FROM donate WHERE date BETWEEN CAST('$startDate' AS DATE) AND CAST('$endDate' AS DATE)";
        return $donate->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
    }

    public function getTotalDonationForLastYearDuration($startDate, $endDate): int|bool|array
    {
        $donate = new donate();
        $sqlStatement2 = "SELECT SUM(amount) AS Total FROM donate WHERE date BETWEEN DATE_SUB(CAST('$startDate' AS DATE),INTERVAL 1 year)
                                                  AND DATE_SUB(CAST('$endDate' AS DATE),INTERVAL 1 year)";
        return $donate->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
    }

    public function getTotalDonationYear(){
        $donate = new donate();
        $sqlStatement2 = "SELECT  SUM(amount) AS Total FROM donate WHERE YEAR(date) = YEAR(now())";
        return $donate->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
    }

    public function getTotalDonationLastYear(){
        $donate = new donate();
        $sqlStatement2 = "SELECT  SUM(amount) AS Total FROM donate WHERE YEAR(date) = YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR ));";
        return $donate->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
    }

    public function getCurrentYearCumulativeDonations(){
        $donate = new donate();
        $sqlStatement2 = "SELECT MONTHNAME(date) AS Month , SUM(amount) AS Total FROM donate WHERE YEAR(date)=YEAR(now()) GROUP BY MONTH(date)";
        return $donate->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
    }

    public function getLastYearCumulativeDonations(){
        $donate = new donate();
        $sqlStatement2 = "select MONTHNAME(date) AS Month, SUM(amount) AS Total
                                from donate where YEAR(date) = YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR ))
                                GROUP BY MONTH(date)";
        return $donate->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
    }


    public function volunteerReportForm(Request $request){

        if ($request->isPost()){
            $data = $request->getBody();
            $volunteer = new Staff();
            $volunteerEvent = new volEvents();
            $volunteerEvent->overrideTableName('volunteer_event');

            $sqlStatement = "SELECT ve.*, s2.fname as modFname, s2.lname as modLname
                           FROM volunteer_participate JOIN volunteer_event ve on ve.id = volunteer_participate.eventId
                           JOIN staff s on s.id = volunteer_participate.volunteerId
                           JOIN staff s2 on s2.id = ve.moderator
                           WHERE volunteer_participate.volunteerId = '$data[id]' AND ve.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND volunteer_participate.state = 1 ORDER BY ve.startDate DESC;";

            $viewVolunteerParticipate = $volunteerEvent->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
            $viewVolunteerParticipateCount = $volunteerEvent->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);

            $sqlStatement2 = "SELECT s.fname, s.lname, u.email, u.gender, u.profile_pic FROM staff s join user u on s.id = u.id where s.id ='$data[id]'";
            $volunteerData = $volunteer->customSqlQuery($sqlStatement2, DatabaseService::FETCH_ALL);

            $allVolEvents = $this->getAllVolEvent($data['StartDate'],$data['EndDate']);

            $sqlStatement4 = "SELECT id From volunteer_event WHERE startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND volunteer_event.type = 0";
            $allExclusiveVolEvents = $volunteerEvent->customSqlQuery($sqlStatement4,DatabaseService::FETCH_COUNT);

            $sqlStatement5 = "SELECT id FROM volunteer_participate JOIN volunteer_event ve on ve.id = volunteer_participate.eventId
                                WHERE volunteer_participate.volunteerId = '$data[id]' AND ve.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) 
                                AND volunteer_participate.state = 1 AND ve.type = 0";
            $ExclusiveEventsParticipated = $volunteerEvent->customSqlQuery($sqlStatement5,DatabaseService::FETCH_COUNT);

            $sqlStatement6 = "SELECT id From volunteer_event WHERE startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND volunteer_event.type = 1";
            $allopenVolEvents = $volunteerEvent->customSqlQuery($sqlStatement6,DatabaseService::FETCH_COUNT);

            $sqlStatement7 = "SELECT id FROM volunteer_participate JOIN volunteer_event ve on ve.id = volunteer_participate.eventId
                                WHERE volunteer_participate.volunteerId = '$data[id]' AND ve.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) 
                                AND volunteer_participate.state = 1 AND ve.type = 1";
            $openEventsParticipated = $volunteerEvent->customSqlQuery($sqlStatement7,DatabaseService::FETCH_COUNT);

            $sqlStatement8 = "SELECT COUNT(vp.volunteerId)/COUNT(*) AS Average FROM volunteer_event
                                    inner join volunteer_participate vp on volunteer_event.id = vp.eventId
                                    WHERE volunteer_event.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
            $avgParticipation = $volunteerEvent->customSqlQuery($sqlStatement8,DatabaseService::FETCH_ALL);

            $sqlStatement9 = "SELECT COUNT(volunteer_participate.volunteerId) AS highest FROM volunteer_participate
                                join volunteer_event ve on volunteer_participate.eventId = ve.id 
                                WHERE ve.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)
                                GROUP BY volunteer_participate.volunteerId ORDER BY highest DESC  LIMIT 1";
            $HighestParticipation = $volunteerEvent->customSqlQuery($sqlStatement9,DatabaseService::FETCH_ALL);

            $params = [
                'viewVolunteerParticipate' => $viewVolunteerParticipate,
                'viewVolunteerParticipateCount' => $viewVolunteerParticipateCount,
                'volunteerData' => $volunteerData,
                'data' => $data,
                'allVolEvents' => $allVolEvents,
                'allExclusiveVolEvents' => $allExclusiveVolEvents,
                'ExclusiveEventsParticipated' => $ExclusiveEventsParticipated,
                'allopenVolEvents' => $allopenVolEvents,
                'openEventsParticipated' => $openEventsParticipated,
                'avgParticipation' => $avgParticipation,
                'HighestParticipation' => $HighestParticipation
            ];
            $this->setLayout('reportLayout');
            return $this->render('Admin/Report_volunteer','Volunteer Report',$params);
        }else{
     $volunteerInfo = new User();
     $data = $request->getBody();
     $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                staff.id
                                FROM staff WHERE staff.state='1' AND staff.type='volunteer'";

     $viewVolunteer = $volunteerInfo->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

     $params = [
         'viewVolunteer' => $viewVolunteer
     ];

//     print_r($params);
     return $this->render('Admin/Report_Form_Volunteer','Volunteer Report Generation',$params);

        }
    }



    public function overviewReportForm(Request $request){

     if ($request->isPost()) {
//         $userView = new volEvents();
         $userView = new staff();
         $userInfo = new User();
         $supportGroup = new supportGroup();
         $sessionReport = new session_report();
         $donate = new donate();
         $volunteerEvent = new volEvents();
         $data = $request->getBody();

         $sqlStatement = "SELECT supportgroup.type,
                                    COUNT(*) AS Count
                                    FROM supportgroup WHERE supportgroup.state = 1
                                    GROUP BY supportgroup.type";
         $SupportGroupTypes = $supportGroup->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
         $SupportGroupTypeCount = $supportGroup->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);

         $SupportGroupCount = $supportGroup->select('supportGroup','*',["state" => 1],DatabaseService::FETCH_COUNT);

//Session problems-------------------------------------------------------------------------------------
         $sqlStatement2 = "SELECT p.name AS problemName,
                                   COUNT(*) AS Count
                            FROM session_report
                                     JOIN problems p on p.id = session_report.problemType
                                    JOIN meeting m on m.id = session_report.meetingId
                            JOIN timeslot t on t.timeslotId = m.timeslotId
                            JOIN shift s on s.shiftId = t.shiftId
                            WHERE s.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)
                            GROUP BY session_report.problemType";

         $sessionProblemCount = $sessionReport->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
         $sessionProblemAmount = $sessionReport->customSqlQuery($sqlStatement2,DatabaseService::FETCH_COUNT);
//-----------------------------------------------------------------------------------------------------
         $sqlStatement4 = "SELECT SUM(d.amount) AS Total FROM donate d WHERE d.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
         $donations = $donate->customSqlQuery($sqlStatement4,DatabaseService::FETCH_ALL);
//-New callers-------------------------------------------------------------------------------------------------------------------------------
         $sqlStatement3 = "SELECT  COUNT(*) AS Count
                            FROM user
                            WHERE user.registration_date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND user.type = 'caller'";

         $newCallers = $userInfo->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);
//--New Volunteers--------------------------------------------------------------------------------------------------------------
         $sqlStatement3 = "SELECT  COUNT(*) AS Count
                            FROM user inner join staff s on user.id = s.id
                            WHERE user.registration_date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND s.type = 'Volunteer'";

         $newvolunteers = $userInfo->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);

//--New befrienders---------------------------------------------------------------------------------------------------------------
         $sqlStatement3 = "SELECT  COUNT(*) AS Count
                            FROM user inner join staff s on user.id = s.id
                            WHERE user.registration_date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND s.type = 'Befriender'";

         $newbefrienders = $userInfo->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);
//---Total meetings for the duration---------------------------------------------------------------------------------------------------------
         $sqlStatement3 = "SELECT meeting.*,s.date
                                FROM meeting
                                         JOIN timeslot t on meeting.timeslotId = t.timeslotId
                                         JOIN shift s on s.shiftId = t.shiftId
                                WHERE s.date  BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";

         $meetingsForDuration = $userInfo->customSqlQuery($sqlStatement3,DatabaseService::FETCH_COUNT);

//--Total befreinders handling Meetings for duration------------------------------------------------------------------------------------------------------
         $sqlStatement3 = "SELECT COUNT(meeting.befrienderId) AS COUNT
                                    FROM meeting
                                             JOIN timeslot t on meeting.timeslotId = t.timeslotId
                                             JOIN shift s on s.shiftId = t.shiftId
                                    WHERE s.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)
                                    GROUP BY meeting.befrienderId";

         $numBefrienderForAllMeeting = $userInfo->customSqlQuery($sqlStatement3,DatabaseService::FETCH_COUNT);

// Meeting types of the duration-----------------------------------------------------------
         $sqlStatement12 ="SELECT COUNT(meeting.id) AS Count, meeting_type
                    FROM meeting
                    JOIN timeslot t on meeting.timeslotId = t.timeslotId
                    JOIN shift s on s.shiftId = t.shiftId
                    WHERE s.date  BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) group by meeting_type;";

         $meetingTypes = $userInfo->customSqlQuery($sqlStatement12,DatabaseService::FETCH_ALL);
         $meetingTypesCount = $userInfo->customSqlQuery($sqlStatement12,DatabaseService::FETCH_COUNT);

// Donations-------------------------------------------------------------------------------------------------------------
         $totalDonationsDuration = $this->getTotalDonationDuration($data['StartDate'],$data['EndDate']);
         $totalDonationLastYearDuration = $this->getTotalDonationForLastYearDuration($data['StartDate'],$data['EndDate']);
         $totalDonationsCurrentYear = $this->getTotalDonationYear();
         $totalDonationsLastYear = $this->getTotalDonationLastYear();
         $currentYearCumulativeDonation = $this->getCurrentYearCumulativeDonations();
         $lastYearCumulativeDonation = $this->getLastYearCumulativeDonations();


//-----Volunteer-------------------------------------------------------------------------------------------
         $allVolEvents = $this->getAllVolEvent($data['StartDate'],$data['EndDate']);

         $sqlStatement6 = "SELECT id From volunteer_event WHERE startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND volunteer_event.type = 0";
         $allExclusiveVolEvents = $volunteerEvent->customSqlQuery($sqlStatement6,DatabaseService::FETCH_COUNT);


         $sqlStatement7 = "SELECT id From volunteer_event WHERE startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) AND volunteer_event.type = 1";
         $allopenVolEvents = $volunteerEvent->customSqlQuery($sqlStatement7,DatabaseService::FETCH_COUNT);

         $sqlStatement8 = "SELECT COUNT(vp.volunteerId)/COUNT(*) AS Average FROM volunteer_event
                                    inner join volunteer_participate vp on volunteer_event.id = vp.eventId
                                    WHERE volunteer_event.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
         $avgParticipation = $volunteerEvent->customSqlQuery($sqlStatement8,DatabaseService::FETCH_ALL);

         $sqlStatement9 = "SELECT COUNT(volunteer_participate.volunteerId) AS highest FROM volunteer_participate
                                join volunteer_event ve on volunteer_participate.eventId = ve.id 
                                WHERE ve.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)
                                GROUP BY volunteer_participate.volunteerId ORDER BY highest DESC  LIMIT 1";

         $HighestParticipation = $volunteerEvent->customSqlQuery($sqlStatement9,DatabaseService::FETCH_ALL);

         $sqlStatement10 = "SELECT ve.*, s.fname as modFname, s.lname as modLname FROM volunteer_event ve join staff s on s.id = ve.moderator
                            WHERE ve.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) ORDER BY ve.startDate DESC;";

         $volEvents = $volunteerEvent->customSqlQuery($sqlStatement10, DatabaseService::FETCH_ALL);

         $sqlStatement11 = "SELECT type, COUNT(volunteer_event.type) AS Data FROM volunteer_event       
                            WHERE startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE) GROUP BY type";
         $volEventGraphData = $volunteerEvent->customSqlQuery($sqlStatement11, DatabaseService::FETCH_ALL);


         $params = [
             'data' => $data,
             'allVolEvents' => $allVolEvents,
             'allExclusiveVolEvents' => $allExclusiveVolEvents,
             'allopenVolEvents' => $allopenVolEvents,
             'avgParticipation' => $avgParticipation,
             'HighestParticipation' => $HighestParticipation,
             'volEvents' => $volEvents,
             'volEventGraphData' => $volEventGraphData,
             'newCallers' => $newCallers,
             'newvolunteers' => $newvolunteers,
             'newbefrienders' => $newbefrienders,
             'meetingsForDuration' => $meetingsForDuration,
             'numBefrienderForAllMeeting' => $numBefrienderForAllMeeting,
             'sessionProblemAmount' => $sessionProblemAmount,
             'sessionProblemCount' => $sessionProblemCount,
             'totalDonationsDuration' => $totalDonationsDuration,
             'totalDonationLastYearDuration' => $totalDonationLastYearDuration,
             'totalDonationsCurrentYear' => $totalDonationsCurrentYear,
             'totalDonationsLastYear' => $totalDonationsLastYear,
             'currentYearCumulativeDonation' => $currentYearCumulativeDonation,
             'lastYearCumulativeDonation' => $lastYearCumulativeDonation,
             'meetingTypes' => $meetingTypes,
             'meetingTypesCount' => $meetingTypesCount

         ];

         $this->setLayout('reportLayout');
         return $this->render('Admin/Report_overview', 'Overview Report',$params);

     }
     return $this->render('Admin/Report_Form_Overview', 'Generate Overview Reports');
 }



    public function befrienderReportForm(Request $request){

     if ($request->isPost()) {

         $userView = new staff();
         $data = $request->getBody();

         //         user data
         $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                staff.type AS 'role',
                                staff.state,
                                staff.id AS 'StaffID',
                                u.email,
                                u.gender,
                                u.username,
                                u.id AS 'UserID'
                                FROM staff
                                JOIN user u on staff.id = u.id
                                WHERE u.username LIKE '%$data[username]%'";

         $Befriender = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

         $sqlStatement = "SELECT staff.fname,
                               staff.lname,
                               staff.type AS 'role',
                               staff.state,
                               u.email,
                               u.gender,
                               u.username,
                               u.id,
                                sr.befrienderId,
                                sr.date
                                FROM staff
                                JOIN user u on staff.id = u.id
                                JOIN session_report sr on staff.id = sr.befrienderId    
                                WHERE u.username LIKE '%$data[username]%' 
                                AND sr.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
         $SessionReports = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);

         $sqlStatement = "SELECT s.shiftId,
                                s.date,
                                s.startTime,
                                s.endTime
                                FROM staff
                                JOIN user u on staff.id = u.id
                                JOIN reserve r on staff.id = r.befrienderId
                                JOIN shift s on r.shiftId = s.shiftId
                                WHERE u.username LIKE '%$data[username]%' 
                                AND s.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
         $Shifts = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
         $ShiftCount = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);

         $sqlStatement = "SELECT s2.name,
                                s2.type
                                FROM staff
                                JOIN user u on staff.id = u.id
                                JOIN supportgroup s2 on staff.id = s2.facilitator
                                WHERE u.username LIKE '%$data[username]%'
                                AND s2.facilitator LIKE staff.id";
         $SG_Facilitator = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
         $SG_Facilitator_Count = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);

         $sqlStatement = "SELECT s2.name,
                                s2.type
                                FROM staff
                                JOIN user u on staff.id = u.id
                                JOIN supportgroup s2 on staff.id = s2.co_facilitator
                                WHERE u.username LIKE '%$data[username]%'
                                AND s2.co_facilitator LIKE staff.id";
         $SG_CoFacilitator = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
         $SG_CoFacilitator_Count = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);


// PDF creation
//         Page initialization
         $pdf = new FPDF();
         $pdf->AliasNbPages();
         $pdf->AddPage();
         $pdf->SetFont('Arial','BU',16);

         // Set title and header
         $pdf->Image('./assets/img/icon.png',170,6,30);
         $pdf->SetFont('Arial','B',16);
         $pdf->Ln(5);
         $pdf->Cell(20,10,'Befriender Report',0,1,'L');
         $pdf->Ln(5);

//         add horizontal line
         $pdf->SetLineWidth(0.8);
         $pdf->Line(10,28,200,28);
         $pdf->SetLineWidth(0);
         $pdf->Ln(5);

         $pdf->SetFont('Arial','B',11);
         foreach($Befriender as $req) {
             $pdf->Cell(55,0,'Befriender Name :',0,'0','L');
             $pdf->SetFont('Arial','',11);
             $pdf->Cell(32 ,0,$req['fname'].' '.$req['lname'],0,'0','L');
             $pdf->Ln(5);
             $pdf->SetFont('Arial','B',11);
             $pdf->Cell(55,0,'User Name :',0,'0','L');
             $pdf->SetFont('Arial','',11);
             $pdf->Cell(32 ,0,$req['username'],0,'0','L');
             $pdf->Ln(5);
         }
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(55,0,'Duration :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         $pdf->Cell(32 ,0,$data['StartDate'].' - '.$data['EndDate'],0,'0','L');
         $pdf->Ln(10);

         //         add horizontal line
         $pdf->SetLineWidth(0.8);
         $pdf->Line(10,50,200,50);
         $pdf->SetLineWidth(0);
         $pdf->Ln(5);


//report Data
//Session reports count for the duration
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'Session Reports :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         $pdf->Cell(32 ,0,$SessionReports,0,'0','L');
         $pdf->Ln(5);

// set font and display shifts count and shifts worked for the duration
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'Shifts worked :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         $pdf->Cell(32 ,0,$ShiftCount,0,'0','L');
         $pdf->Ln(5);

         // set font and display support group facilitations
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'Facilitating Support Groups :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         $pdf->Cell(32 ,0,$SG_Facilitator_Count,0,'0','L');
         $pdf->Ln(5);

         // set font and display support group co facilitations
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'Facilitating Support Groups :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         $pdf->Cell(32 ,0,$SG_CoFacilitator_Count,0,'0','L');
         $pdf->Ln(5);



//         if condition to display shifts and no shifts
         if ($ShiftCount==0){
         }else{

//         shifts worked title
             $pdf->SetFont('Arial','B',12);
             $pdf->Cell(0,10,'Shifts worked for the duration',0,0,'L');
             $pdf->Ln(10);

             //         Report data
             $pdf->SetFont('Arial','',11);
             $w = array(32, 35, 40, 45);
             $header = array('Shift ID','Shift Date', 'Start Time', 'End Time');
             $pdf->BasicTable($header,$Shifts);
             $pdf->SetFont('Arial','B',12);
             }

//         support group title and facilitation and co-facilitation
         $pdf->Ln(5);
         //         if condition to display no sg
         if ($SG_Facilitator_Count==0){
         }else{

//         shifts worked title
             $pdf->SetFont('Arial','B',12);
             $pdf->Cell(0,10,'Facilitating Support Groups',0,0,'L');
             $pdf->Ln(10);

             //         Report data
             $pdf->SetFont('Arial','',11);
             $w = array(32, 35, 40, 45);
             $header = array('Support Group Name','Support Group Type');
             $pdf->BasicTable($header,$SG_Facilitator);
             $pdf->SetFont('Arial','B',12);
         }

//         support group title and facilitation and co-facilitation
         $pdf->Ln(5);
         //         if condition to display no sg
         if ($SG_CoFacilitator_Count==0){
         }else{

//         shifts worked title
             $pdf->SetFont('Arial','B',12);
             $pdf->Cell(0,10,'Facilitating Support Groups',0,0,'L');
             $pdf->Ln(10);

             //         Report data
             $pdf->SetFont('Arial','',11);
             $w = array(32, 35, 40, 45);
             $header = array('Support Group Name','Support Group Type');
             $pdf->BasicTable($header,$SG_CoFacilitator);
             $pdf->SetFont('Arial','B',12);
         }

//pdf output
         $pdf->Output();
     }


     $befrienderInfo = new User();
     $data = $request->getBody();
     $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                staff.type AS 'role',
                                staff.state,
                                u.username,
                                u.id
                                FROM staff
                                JOIN user u on staff.id = u.id WHERE staff.state='1' AND staff.type='befriender'";

     $viewBefriender = $befrienderInfo->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

     $params = [
         'viewBefriender' => $viewBefriender
     ];
     return $this->render('Admin/Report_Form_Befriender','Befriender Report Generation', $params);
 }

    public function donationReportForm(Request $request){
        if ($request->isPost()){
            $data = $request->getBody();
           $donate = new donate();
           $sqlStatement = "SELECT * FROM donate WHERE date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
           $donateData = $donate->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
           $donateDataCount = $donate->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);


            $totalDonationsDuration = $this->getTotalDonationDuration($data['StartDate'],$data['EndDate']);
            $totalDonationLastYearDuration = $this->getTotalDonationForLastYearDuration($data['StartDate'],$data['EndDate']);
            $totalDonationsCurrentYear = $this->getTotalDonationYear();
            $totalDonationsLastYear = $this->getTotalDonationLastYear();
            $currentYearCumulativeDonation = $this->getCurrentYearCumulativeDonations();
            $lastYearCumulativeDonation = $this->getLastYearCumulativeDonations();

            $params = [
                'data' => $data,
                'totalDonationsDuration' => $totalDonationsDuration,
                'totalDonationLastYearDuration' => $totalDonationLastYearDuration,
                'totalDonationsCurrentYear' => $totalDonationsCurrentYear,
                'totalDonationsLastYear' => $totalDonationsLastYear,
                'currentYearCumulativeDonation' => $currentYearCumulativeDonation,
                'lastYearCumulativeDonation' => $lastYearCumulativeDonation,
                'donateData' => $donateData
            ];

            $this->setLayout('reportLayout');
            return $this->render('Admin/Report_donation','Donation Report Generation',$params);

        }

     return $this->render('Admin/Report_Form_Donations','Donation Report Generation');
 }



    public function volParticipateReport(Request $request){
        $volunteer = new Staff();
         $data = $request->getBody();


         $sqlStatement = "SELECT s.fname AS fname, s.lname AS lname, u.email AS email, u.gender AS gender
                            FROM staff s JOIN user u ON s.id = u.id
                            JOIN volunteer_participate vp ON s.id = vp.volunteerId
                            JOIN volunteer_event ve ON vp.eventId = ve.id WHERE ve.id = $data[id] AND vp.state=1";

         $volunteerData = $volunteer->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
        $volunteerDataCount = $volunteer->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);
//create pdf
        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','BU',16);

        // Set title and header
        $pdf->Image('./assets/img/icon.png',170,6,30);
        $pdf->SetFont('Arial','B',16);
        $pdf->Ln(5);
        $pdf->Cell(20,5,'Volunteer Participant Report',0,1,'L');
        $pdf->Ln(5);

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0, 0, $data['name'], '');
        $pdf->Ln(10);

//         add horizontal line
        $pdf->SetLineWidth(0.8);
        $pdf->Line(10,31,200,31);
        $pdf->SetLineWidth(0);
        $pdf->Ln(5);


        if ($volunteerDataCount==0){
        }else{
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,10,'Participating Volunteers',0,0,'L');
            $pdf->Ln(10);

            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(50,7,'Participant Name',1,'0','C');
            $pdf->Cell(60 ,7,'Email Address',1,'0','C');
            $pdf->Cell(50 ,7,'Gender',1,'0','C');
            $pdf->Ln();
            $pdf->SetFont('Arial','',11);
            foreach($volunteerData as $row)
            {
                $pdf->Cell(50,6,$row['fname'].' '.$row['lname'],'LTRB');
                $pdf->Cell(60,6,$row['email'],'LTRB');
                if ($row['gender']=='M'){
                    $pdf->Cell(50,6,'Male','LTRB');
                }elseif ($row['gender']=='F'){
                    $pdf->Cell(50,6,'Female','LTRB');
                }else{
                    $pdf->Cell(50,6,'Rather not say','LTRB');
                }

                $pdf->Ln(10);
            }
        }

        $pdf->Output();

     }


    public function testPDF(Request $request){
     if($request->isPost()){
       $volunteerInfo = new staff();
       $data = $request->getBody();
       $volData = $volunteerInfo->select('staff','*',['id'=> $data['id']],DatabaseService::FETCH_ALL);
//       Create pdf
         $pdf = new FPDF();
         $pdf->AddPage();
         $pdf->SetFont('Arial','B','16');


         $pdf->Cell(0,10,'Volunteer Report',0,0,'C');
         $pdf->Ln(10);

         //         Report data
         $pdf->SetFont('Arial','B',14);
         $w = array(32, 35, 40, 45);
         foreach($volData as $req) {
             $pdf->Cell(0, 10, 'Volunteer Name : '.$req['fname'].' '.$req['lname'], '');
             $pdf->Ln(7);
         }
         $pdf->AddPage();

//			chart properties
//position - top left corner - position of the chart
         $chartX=10;
         $chartY=10;

//dimension
         $chartWidth=150;
         $chartHeight=100;

//padding
         $chartTopPadding=10;
         $chartLeftPadding=20;
         $chartBottomPadding=20;
         $chartRightPadding=5;

//chart box
         $chartBoxX=$chartX+$chartLeftPadding;
         $chartBoxY=$chartY+$chartTopPadding;
         $chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
         $chartBoxHeight=$chartHeight-$chartBottomPadding-$chartTopPadding;

//bar width
         $barWidth=10;

//chart data
         $data=Array(
             'hello'=>[
                 'color'=>[255,0,0],
                 'value'=>100],
             'ipsum'=>[
                 'color'=>[255,255,0],
                 'value'=>300],
             'dolor'=>[
                 'color'=>[50,0,255],
                 'value'=>150],
             'sit'=>[
                 'color'=>[255,0,255],
                 'value'=>50],
             'amet'=>[
                 'color'=>[0,255,0],
                 'value'=>240]
         );

//$dataMax
         $dataMax=0;
         foreach($data as $item){
             if($item['value']>$dataMax)$dataMax=$item['value'];
         }

//data step
         $dataStep=50;

//set font, line width and color
         $pdf->SetFont('Arial','',9);
         $pdf->SetLineWidth(0.2); //width of all the lines in the chart
         $pdf->SetDrawColor(0); //all the lines are set to black, uses rgb

//chart boundary
         $pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);

//vertical axis line
         $pdf->Line(
             $chartBoxX ,
             $chartBoxY ,
             $chartBoxX ,
             ($chartBoxY+$chartBoxHeight)
         );
//horizontal axis line
         $pdf->Line(
             $chartBoxX-2 ,
             ($chartBoxY+$chartBoxHeight) ,
             $chartBoxX+($chartBoxWidth) ,
             ($chartBoxY+$chartBoxHeight)
         );

///vertical axis
//calculate chart's y axis scale unit
         $yAxisUnits=$chartBoxHeight/$dataMax;

//draw the vertical (y) axis labels
         for($i=0 ; $i<=$dataMax ; $i+=$dataStep){
             //y position
             $yAxisPos=$chartBoxY+($yAxisUnits*$i);
             //draw y axis line
             $pdf->Line(
                 $chartBoxX-2 ,
                 $yAxisPos ,
                 $chartBoxX ,
                 $yAxisPos
             );
             //set cell position for y axis labels
             $pdf->SetXY($chartBoxX-$chartLeftPadding , $yAxisPos-2);
             //$pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i , 1);---------------
             $pdf->Cell($chartLeftPadding-4 , 5 , $dataMax-$i, 0 , 0 , 'R');
         }

///horizontal axis
//set cells position
         $pdf->SetXY($chartBoxX , $chartBoxY+$chartBoxHeight);

//cell's width
         $xLabelWidth=$chartBoxWidth / count($data);

//$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');-------------
//loop horizontal axis and draw the bar
         $barXPos=0;
         foreach($data as $itemName=>$item){
             //print the label
             //$pdf->Cell($xLabelWidth , 5 , $itemName , 1 , 0 , 'C');--------------
             $pdf->Cell($xLabelWidth , 5 , $itemName , 0 , 0 , 'C');

             ///drawing the bar
             //bar color
             $pdf->SetFillColor($item['color'][0],$item['color'][1],$item['color'][2]);
             //bar height
             $barHeight=$yAxisUnits*$item['value'];
             //bar x position
             $barX=($xLabelWidth/2)+($xLabelWidth*$barXPos);
             $barX=$barX-($barWidth/2);
             $barX=$barX+$chartBoxX;
             //bar y position
             $barY=$chartBoxHeight-$barHeight;
             $barY=$barY+$chartBoxY;
             //draw the bar
             $pdf->Rect($barX,$barY,$barWidth,$barHeight,'DF');
             //increase x position (next series)
             $barXPos++;
         }

//axis labels
         $pdf->SetFont('Arial','B',12);
         $pdf->SetXY($chartX,$chartY);
         $pdf->Cell(100,10,"Amount",0);
         $pdf->SetXY(($chartWidth/2)-50+$chartX,$chartY+$chartHeight-($chartBottomPadding/2));
         $pdf->Cell(100,5,"Series",0,0,'C');
         $pdf->Output();

     }
     $volunteer = new Staff();
     $data = $request->getBody();
     $volInfo = $volunteer->select('staff','*',['type' => 'volunteer'],DatabaseService::FETCH_ALL);
     $params =[
         'volInfo' => $volInfo
     ];
     return $this->render('Admin/testForm', 'test',$params);
    }
}

