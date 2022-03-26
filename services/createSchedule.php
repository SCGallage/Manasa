<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manasa_v3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM schedule ORDER BY scheduleId DESC LIMIT 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "<br> id: ". $row["id"]. " - Name: ". $row["startDate"]. " ";

        $addstartdate = date('Y-m-d', strtotime($row["startDate"]. ' + 14 days'));

        $addenddate = date('Y-m-d', strtotime($row["endDate"]. ' + 14 days'));


//
//
//        $period = new DatePeriod(
//            new DateTime($row["startDate"]),
//            new DateInterval('P1D'),
//            new DateTime($row["endDate"])
//
//
//        );



    }
} else {
    echo "0 results";
}

// Inserting in database
$q = mysqli_query($conn, "INSERT INTO schedule(startDate,endDate) VALUES ('$addstartdate','$addenddate')");

//$sql5 = "SELECT * FROM schedule ORDER BY scheduleId DESC LIMIT 1 ";
//$result5 = $conn->query($sql5);


//while($row6 = $result5->fetch_assoc()) {
//
//    $id = $row6["scheduleId"];
//
//}
//
//// Getting current date
//$date_time = date("Y-m-d");
//$sql1 = "SELECT * FROM schedule ORDER BY scheduleId DESC LIMIT 1";
//$result1 = $conn->query($sql1);
//
//$array = array();
//
//foreach ($period as $key => $value) {
//    $Store = $value->format('Y-m-d');
//    $array[] = $Store;
//}
//$endDate = $row['endDate'];
//array_push($array,$endDate);
//
//// print_r($array);
//
//for($i=0; $i<count($array);$i++){
//    mysqli_query($conn, "INSERT INTO shift(startTime,endTime,date,scheduleId,state,num_of_befrienders) VALUES ('08:00:00','12:00:00','$array[$i]','$id','0','0')");
//    mysqli_query($conn, "INSERT INTO shift(startTime,endTime,date,scheduleId,state,num_of_befrienders) VALUES ('13:00:00','17:00:00','$array[$i]','$id','0','0')");
//}


//$sql2 = "SELECT * FROM shift WHERE scheduleId=$id";
//$result2 = $conn->query($sql2);
//
//$array2 = array();
//
//foreach ($result2 as $key => $value2) {
//
//    $array2[] = $value2['shiftId'];
//}
//
//for($j=0; $j<count($array2);$j++){
//    // echo $array2[$j];
//    if($array2[$j]%2 == 1){
//        mysqli_query($conn, "INSERT INTO timeslot(startTime,endTime,shiftId,num_reservations) VALUES ('08:00:00','10:00:00','$array2[$j]','0')");
//
//        mysqli_query($conn, "INSERT INTO timeslot(startTime,endTime,shiftId,num_reservations) VALUES ('10:00:00','12:00:00','$array2[$j]','0')");
//    }else{
//        mysqli_query($conn, "INSERT INTO timeslot(startTime,endTime,shiftId,num_reservations) VALUES ('13:00:00','15:00:00','$array2[$j]','0')");
//
//        mysqli_query($conn, "INSERT INTO timeslot(startTime,endTime,shiftId,num_reservations) VALUES ('15:00:00','17:00:00','$array2[$j]','0')");
//    }
//}
//
//







$conn->close();
?>
