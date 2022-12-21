
<?php
include 'db_conn.php';
include 'Store_User_Pass.php';

date_default_timezone_set("America/New_York");
$date   = new DateTime(); //this returns the current date time
$result = $date->format('Y-m-d'); //this returns the current date into string format.

//Checking the current date in the timeslots table
$sql = "SELECT Days, startTime, endTime FROM timeslots WHERE DateC ='$result'";
$result = $conn->query($sql);
//echo $result->num_rows;
if ($result->num_rows == 0) 
{
   require 'Managing_Database_One.php';
	//echo "Not found";
}


//Checking if the confirmation table has the username or not.
$sql = "SELECT * FROM confirmation WHERE username ='$u'";
$result = $conn->query($sql);
echo $result->num_rows;
if ($result->num_rows > 0) {
		header("Location: Confirmation.php"); // if the username is present, show the confirmation table data
	
	
	
}
else {         

	header("Location: Laundry_Schedule_Menu.php");  //If the username is not present then show laundry schedule menu.
	}









?>