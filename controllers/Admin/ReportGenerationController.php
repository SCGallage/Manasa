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

    public function volunteerReportForm(Request $request){

     $volunteerInfo = new User();
     $data = $request->getBody();
     $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                staff.cv,
                                staff.type AS 'role',
                                staff.state,
                                u.email,
                                u.gender,
                                u.username,
                                u.id
                                FROM staff
                                JOIN user u on staff.id = u.id WHERE staff.state='1' AND staff.type='volunteer'";

     $viewVolunteer = $volunteerInfo->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

     $params = [
         'viewVolunteer' => $viewVolunteer
     ];

//     print_r($params);
     return $this->render('Admin/Report_Form_Volunteer','Volunteer Report Generation',$params);
 }

    public function volunteerReportPDF(Request $request){

        if ($request->isPost()) {
            $userView = new staff();
            $volunteerInfo = new User();
            $data = $request->getBody();


//         user data
            $sqlStatement = "SELECT staff.fname,
                                staff.lname,
                                u.username
                                FROM staff
                                JOIN user u on staff.id = u.id
                                WHERE u.username LIKE '%$data[username]%'";

            $volunteer = $userView->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);

//         Report Data
            $sqlStatement = "SELECT 
                                v.id,
                                v.startDate,
                                v.name,
                                v.capacity,
                                v.location,
                                v.moderator
                                FROM staff
                                JOIN user u on staff.id = u.id
                                JOIN volunteer_participate vp on u.id = vp.volunteerId
                                JOIN volunteer_event v on vp.eventId = v.id
                                WHERE u.username LIKE '%$data[username]%'
                                  AND vp.volunteerId = staff.id
                                AND v.startDate BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";

            $viewVolunteer = $volunteerInfo->customSqlQuery($sqlStatement, DatabaseService::FETCH_ALL);
            $viewVolunteerCount = $volunteerInfo->customSqlQuery($sqlStatement, DatabaseService::FETCH_COUNT);


            // Column widths
         $w = array(40, 35, 40, 45);
         $pdf = new FPDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial','BU',16);

            // Set title and header
            $pdf->Image('./assets/img/icon.png',170,6,30);
            $pdf->SetFont('Arial','B',16);
            $pdf->Ln(5);
            $pdf->Cell(20,10,'Volunteer Report',0,1,'L');
            $pdf->Ln(5);

//         add horizontal line
            $pdf->SetLineWidth(0.8);
            $pdf->Line(10,28,200,28);
            $pdf->SetLineWidth(0);
            $pdf->Ln(5);

            $pdf->SetFont('Arial','B',11);
            foreach($volunteer as $req) {
                $pdf->Cell(55,0,'Volunteer Name :',0,'0','L');
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


//            Events Participated

            $pdf->SetFont('Arial','B',12);
            if ($viewVolunteerCount==0){
                $pdf->Cell(0,5,'No events participated for the duration',0,0,'C');
            }else {


                $pdf->Cell(0,0,'Participated Events',0,0);
                $pdf->Ln(5);

                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(23, 7, 'Event ID', 1, '0', 'C');
                $pdf->Cell(32, 7, 'Event Name', 1, '0', 'C');
                $pdf->Cell(23, 7, 'Capacity', 1, '0', 'C');
                $pdf->Cell(25, 7, 'Date', 1, '0', 'C');
                $pdf->Cell(60, 7, 'Location', 1, '0', 'C');
                $pdf->Cell(23, 7, 'Moderator', 1, '0', 'C');
                $pdf->Ln();

                $pdf->SetFont('Arial', '', 11);

                foreach ($viewVolunteer as $item) {
                    $cellWidth = 60;//wrapped cell width
                    $cellHeight = 5;//normal one-line cell height

                    //check whether the text is overflowing
                    if ($pdf->GetStringWidth($item['location']) < $cellWidth) {
                        //if not, then do nothing
                        $line = 1;
                    } else {
                        //if it is, then calculate the height needed for wrapped cell
                        //by splitting the text to fit the cell width
                        //then count how many lines are needed for the text to fit the cell

                        $textLength = strlen($item['location']);    //total text length
                        $errMargin = 10;        //cell width error margin, just in case
                        $startChar = 0;        //character start position for each line
                        $maxChar = 0;            //maximum character in a line, to be incremented later
                        $textArray = array();    //to hold the strings for each line
                        $tmpString = "";        //to hold the string for a line (temporary)

                        while ($startChar < $textLength) { //loop until end of text
                            //loop until maximum character reached
                            while (
                                $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                                ($startChar + $maxChar) < $textLength) {
                                $maxChar++;
                                $tmpString = substr($item['location'], $startChar, $maxChar);
                            }
                            //move startChar to next line
                            $startChar = $startChar + $maxChar;
                            //then add it into the array so we know how many line are needed
                            array_push($textArray, $tmpString);
                            //reset maxChar and tmpString
                            $maxChar = 0;
                            $tmpString = '';

                        }
                        //get number of line
                        $line = count($textArray);
                    }

                    //write the cells
                    $pdf->Cell(23, ($line * $cellHeight), $item['id'], 1, 0); //adapt height to number of lines
                    $pdf->Cell(32, ($line * $cellHeight), $item['name'], 1, 0); //adapt height to number of lines
                    $pdf->Cell(23, ($line * $cellHeight), $item['capacity'], 1, 0);
                    $pdf->Cell(25, ($line * $cellHeight), $item['startDate'], 1, 0);
//                $pdf->Cell(23,($line * $cellHeight),$item['moderator'],1,0);


                    //use MultiCell instead of Cell
                    //but first, because MultiCell is always treated as line ending, we need to
                    //manually set the xy position for the next cell to be next to it.
                    //remember the x and y position before writing the multicell
                    $xPos = $pdf->GetX();
                    $yPos = $pdf->GetY();
                    $pdf->MultiCell($cellWidth, $cellHeight, $item['location'], 1);

                    //return the position for next cell next to the multicell
                    //and offset the x with multicell width
                    $pdf->SetXY($xPos + $cellWidth, $yPos);

                    $pdf->Cell(23, ($line * $cellHeight), $item['moderator'], 1, 1); //adapt height to number of lines
                }
            }
         $pdf->Output();


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
         $data = $request->getBody();

         $sqlStatement = "SELECT supportgroup.type,
                                    COUNT(*) AS Count
                                    FROM supportgroup WHERE supportgroup.state = 1
                                    GROUP BY supportgroup.type";
         $SupportGroupTypes = $supportGroup->customSqlQuery($sqlStatement,DatabaseService::FETCH_ALL);
         $SupportGroupTypeCount = $supportGroup->customSqlQuery($sqlStatement,DatabaseService::FETCH_COUNT);

         $SupportGroupCount = $supportGroup->select('supportGroup','*',["state" => 1],DatabaseService::FETCH_COUNT);

         $sqlStatement1 = "SELECT count(*) AS Count
                                FROM session_report
                                WHERE session_report.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";

        $sessionCount = $sessionReport->customSqlQuery($sqlStatement1,DatabaseService::FETCH_ALL);

         $sqlStatement2 = "SELECT p.name AS problemName,
                               COUNT(*) AS Count
                        FROM session_report
                        JOIN problems p on p.id = session_report.problemType
                       WHERE session_report.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)
                        GROUP BY session_report.problemType";

         $sessionProblemCount = $sessionReport->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
         $sessionProblemAmount = $sessionReport->customSqlQuery($sqlStatement2,DatabaseService::FETCH_COUNT);

         $sqlStatement4 = "SELECT SUM(d.amount) AS Total FROM donate d WHERE d.date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
         $donations = $donate->customSqlQuery($sqlStatement4,DatabaseService::FETCH_ALL);

         $sqlStatement3 = "SELECT  COUNT(*) AS Count
                            FROM user
                            WHERE MONTH(user.registration_date)=MONTH(now())
                            AND YEAR(user.registration_date)=YEAR(now())
                            AND user.type='caller'";

         $newCallers = $userInfo->customSqlQuery($sqlStatement3,DatabaseService::FETCH_ALL);

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
         $pdf->Cell(20,5,'Overview Report',0,1,'L');
         $pdf->Ln(5);

         $pdf->SetFont('Arial','B',14);
         $pdf->Cell(0, 0, 'Duration : ' . $data['StartDate'] . ' - ' . $data['EndDate'], '');
         $pdf->Ln(10);

//         add horizontal line
         $pdf->SetLineWidth(0.8);
         $pdf->Line(10,31,200,31);
         $pdf->SetLineWidth(0);
         $pdf->Ln(5);


//report Data
//New Callers
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'New Callers :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         foreach($newCallers as $data){
         $pdf->Cell(32 ,0,$data['Count'],0,'0','L');}
         $pdf->Ln(5);

// Sessions
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'Sessions Conducted :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         foreach($sessionCount as $row){
         $pdf->Cell(32 ,0,$row['Count'],0,'0','L');}
         $pdf->Ln(5);

 // Donations
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'Donations Received :',0,'0','L');
         $pdf->SetFont('Arial','',11);
         foreach($donations as $row){
         $pdf->Cell(32 ,0,'Rs. '.$row['Total'],0,'0','L');}
         $pdf->Ln(5);

         // SupportGroups
         $pdf->SetFont('Arial','B',11);
         $pdf->Cell(60,0,'SUpport Groups :',0,'0','L');
         $pdf->SetFont('Arial','',11);
             $pdf->Cell(32 ,0,$SupportGroupCount,0,'0','L');
         $pdf->Ln(5);

//         if condition to display caller problems
         if ($sessionProblemAmount==0){
         }else{

//         Caller problem overview
             $pdf->SetFont('Arial','B',12);
             $pdf->Cell(0,10,'Caller Problem Overview',0,0,'L');
             $pdf->Ln(10);

             //         Report data
             $pdf->SetFont('Arial','',11);
             $w = array(32, 35, 40, 45);
             $header = array('problem Name','Count');
             $pdf->BasicTable($header,$sessionProblemCount);
             $pdf->SetFont('Arial','B',12);
         }
         $pdf->Ln(5);

//         Display Support groups
         if ($SupportGroupTypeCount==0){
         }else{

//         Caller problem overview
             $pdf->SetFont('Arial','B',12);
             $pdf->Cell(0,10,'Support Group Overview',0,0,'L');
             $pdf->Ln(10);

             //         Report data
             $pdf->SetFont('Arial','',11);
             $w = array(32, 35, 40, 45);
             $header = array('Support Group Type','Count');
             $pdf->BasicTable($header,$SupportGroupTypes);
         }

//pdf output
         $pdf->Output();
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

           $sqlStatement2 = "SELECT SUM(amount) AS Total FROM donate WHERE date BETWEEN CAST('$data[StartDate]' AS DATE) AND CAST('$data[EndDate]' AS DATE)";
           $totalDonation = $donate->customSqlQuery($sqlStatement2,DatabaseService::FETCH_ALL);
//           Create Pdf
            $pdf = new FPDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial','BU',16);

            // Set title and header
            $pdf->Image('./assets/img/icon.png',170,6,30);
            $pdf->SetFont('Arial','B',16);
            $pdf->Ln(5);
            $pdf->Cell(20,5,'Donation Report',0,1,'L');
            $pdf->Ln(5);

            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(0, 0, 'Duration : ' . $data['StartDate'] . ' - ' . $data['EndDate'], '');
            $pdf->Ln(10);

//         add horizontal line
            $pdf->SetLineWidth(0.8);
            $pdf->Line(10,31,200,31);
            $pdf->SetLineWidth(0);
            $pdf->Ln(5);

// Sessions
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40,0,'Total Donations :',0,'0','L');
            $pdf->SetFont('Arial','',12);
            foreach($totalDonation as $row){
                $pdf->Cell(32 ,0,'Rs.'.$row['Total'],0,'0','L');}
            $pdf->Ln(5);

            if ($donateDataCount==0){
                $pdf->Cell(0,10,'No donations made for the duration',0,0,'C');
            }else{

//         Donations for duration
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(0,10,'Donor Information',0,0,'L');
                $pdf->Ln(10);

                //         Report data
                $pdf->SetFont('Arial','',11);
                $w = array(32, 35, 40, 45);
                $header = array('Transaction ID','Email','Date','Amount (Rs.)');
                $pdf->BasicTable($header,$donateData);
                $pdf->SetFont('Arial','B',12);
            }
            $pdf->Ln(5);

            $pdf->Output();

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

