


<?php



$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

date_default_timezone_set("America/New_York");
$date   = new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Checking if the current date is available in the timeslots database
$sql = "SELECT Days, startTime, endTime FROM timeslots WHERE DateC ='$result'";
$result = $conn->query($sql);
//echo $result->num_rows;
//Checking if the date is available, and if the date is available we are not updating  any data in the timeslots, else we are creating creating a new 7 days schedule. 
if ($result->num_rows == 0) 
{
   require 'Managing_Database_One.php';
	//echo "Not found";
}

?>
