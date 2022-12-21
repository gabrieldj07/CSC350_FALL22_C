<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

$STime= array("00:00:00","02:00:00","04:00:00","06:00:00", "08:00:00","10:00:00","12:00:00","14:00:00","16:00:00","18:00:00","20:00:00","22:00:00",);
$ETime = array("01:59:59","03:59:59","05:59:59","07:59:59","09:59:59","11:59:59","13:59:59","15:59:59","17:59:59","19:59:59","21:59:59","23:59:59");
date_default_timezone_set("America/New_York");
$date = date("Y-m-d");
// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "TRUNCATE timeslots"; //Deleting all timeslots 

$result = $conn1->query($sql);

$sql = "TRUNCATE Daysname";  //Deleting all Days name
$result = $conn1->query($sql);

$sql = "TRUNCATE Dates";       //Deleting all Dates
$result = $conn1->query($sql);

$sql = "TRUNCATE confirmation"; //Deleting all  confirmations
$result = $conn1->query($sql);

    $start = date("l");
    $end= "Sunday";

   $days = date('w', strtotime($end)) - date('w', strtotime($start));
    $days += $days < 1 ? 7 : 0;
	
	
    //echo "days: ". $days . "<br>";
   $RDays = 7- $days;
   
   //Checking if the day is 7 then just store only  the sunday schedule in a database
if ($RDays == 0)
{
	$stmt = $conn1->prepare("INSERT INTO timeslots (DateC, Days, startTime, endTime, id) VALUES (?, ?, ?,?,?)");
$stmt->bind_param("ssssi", $DateC, $Days, $startTime, $endTime,$id);

   $startDate = date('Y-m-d');
 for ($x = 0; $x < 1 ; $x++) {
  
    for ($j = 0; $j< 12; $j++){
     $DateC = date("Y-m-d");
	 $Days = date("l");
	 $startTime= $STime[$j];
	 $endTime = $ETime[$j];
	 $id = 7;
	$stmt->execute();
	}
}
$stmt->close();	
$stmt = $conn1->prepare("INSERT INTO Daysname (DateC, Days, id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $DateC, $Days,$id);

   $startDate = date('Y-m-d');
 for ($x = 0; $x < 1; $x++) {
  
    
     $DateC = date("Y-m-d");
	 $Days = date("l");
	
	 $id = 7;
	$stmt->execute();
	
}
$stmt->close();

$stmt = $conn1->prepare("INSERT INTO dates (DateC, id) VALUES (?, ?)");
$stmt->bind_param("si", $DateC ,$id);

   $startDate = date('Y-m-d');
 for ($x = 0; $x <1; $x++) {
  
    
     $DateC = date("Y-m-d");
	 $id = 7;
	$stmt->execute();
	
}
$stmt->close();

}
 else    //Storing all the weekly available timeslots in the database.
 {
$stmt = $conn1->prepare("INSERT INTO timeslots (DateC, Days, startTime, endTime, id) VALUES (?, ?, ?,?,?)");
$stmt->bind_param("ssssi", $DateC, $Days, $startTime, $endTime,$id);

   $startDate = date('Y-m-d');
 for ($x = 0; $x <= $days; $x++) {
  
    for ($j = 0; $j< 12; $j++){
     $DateC = date("Y-m-d", strtotime("$startDate +$x day"));
	 $Days = date("l", strtotime("$startDate +$x day"));
	 $startTime= $STime[$j];
	 $endTime = $ETime[$j];
	 $id = $x + $RDays;
	$stmt->execute();
	}
}
$stmt->close();

$stmt = $conn1->prepare("INSERT INTO Daysname (DateC, Days, id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $DateC, $Days,$id);

   $startDate = date('Y-m-d');
 for ($x = 0; $x <= $days; $x++) {
  
    
     $DateC = date("Y-m-d", strtotime("$startDate +$x day"));
	 $Days = date("l", strtotime("$startDate +$x day"));
	
	 $id = $x + $RDays;
	$stmt->execute();
	
}
$stmt->close();

$stmt = $conn1->prepare("INSERT INTO dates (DateC, id) VALUES (?, ?)");
$stmt->bind_param("si", $DateC ,$id);

   $startDate = date('Y-m-d');
 for ($x = 0; $x <= $days; $x++) {
  
    
     $DateC = date("Y-m-d", strtotime("$startDate +$x day"));
	 $id = $x + $RDays;
	$stmt->execute();
	
}
$stmt->close();
 }
$conn1->close();
?>