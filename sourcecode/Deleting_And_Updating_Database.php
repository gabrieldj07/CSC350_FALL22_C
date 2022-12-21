<?php 

  include 'Store_User_Pass.php';
    
	$Found = $_POST['ETime'];    // This is the Unique ID we are getting for the specific timeslot.
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mydb";
	$Date;
	$Day;
	$sTime;
	$ETime;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM timeslots WHERE Uid ='$Found'";   //Extracting the data from the timeslots where UniqueID is equal to FoundID.
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$Date = $row["DateC"];
	$Day = $row["Days"];
	$sTime= $row["startTime"];
	$ETime= $row["endTime"];
	  
	  //Inserting the data into confirmation database table.
		$stmt = $conn->prepare("INSERT INTO confirmation (username,Unitno, Name,DateC, Days, startTime, endTime) VALUES (?, ?, ?,?,?,?,?)");
		$stmt->bind_param("sssssss",$username,$Unitno,$Name, $DateC, $Days, $startTime, $endTime);

		// set parameters and execute
		    $username = $u;
			$Unitno = $ap;
			$Name = $n;
			$DateC = $Date;
			$Days = $Day;
			$startTime = $sTime;
			$endTime = $ETime;
			$stmt->execute();

$stmt->close();
    //echo "Date: " . $row["DateC"]. " - Day: " . $row["Days"]. " TimeSlot: " . $row["startTime"]. " - ".$row["endTime"]. "<br>";
  }
} else {
}
$sql1 = "DELETE FROM timeslots WHERE Uid ='$Found'";   //Deleting the row where the UniqueID is equal to FoundID 

$result1 = $conn->query($sql1);
$conn->close();

header("Location: Confirmation.php");
?>