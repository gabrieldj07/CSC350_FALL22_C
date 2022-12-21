

<html> 
<head>
<link rel="stylesheet" type="text/css" href="stylz.css"> 

<body>
<form action = "">
<h1> Confirmed Schedule </h1> </head>


<?php
include 'Store_User_Pass.php';
$sname= "localhost";
$unmae= "root";
$password = "root";

$db_name = "mydb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

// extracting the data out from the confirmation table where the username is found.
$sql = "SELECT Name,Unitno, DateC,Days, TIME_FORMAT(startTime, '%h:%i %p') AS startTime, TIME_FORMAT(endTime, '%h:%i %p') AS endTime FROM confirmation WHERE username = '$u'" ;
$result = $conn->query($sql);

	if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo "<p><b> Name: </b> " . $row["Name"]. "</p>";  
   echo "<p><b> Apartment No: </b>" . $row["Unitno"]. "</p>";
   echo "<p><b> Selected Date: </b>" . $row["DateC"]. "</p>";
   echo "<p><b> Day: </b>" . $row["Days"]. "</p>";
   echo "<p><b> TimeSlot:</b> " . $row["startTime"]. " - ".$row["endTime"]. "</p>";
  }
} else {
  echo "0 results";
}


?>
<h2><a href="logout.php">Logout</a></h2>  
</form>

</body>

</html>