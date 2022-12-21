

<html>
<head> 


<script src="jquery.main.js"></script>
<script>
function validate()
{
	if (document.getElementById("Date").value == "")
{
	document.getElementById("message").innerHTML= "Please Select Date, Day and Timeslot.(Incomplete Data!!!!)";
	return false;
}else if (document.getElementById("Day").value == "")
{
	document.getElementById("message").innerHTML= "Please Select Day and Timeslot.(Incomplete Data!!!!)";
	return false;
}else if (document.getElementById("STime").value == "")
{
	document.getElementById("message").innerHTML= "Please Select Timeslot.(Incomplete Data!!!!)";
	return false;
}else if (document.getElementById("ETime").value == "")
{
	document.getElementById("message").innerHTML= "Incomplete Data!!!!";
	return false;
} else 
{
	return true;
}
	
}



</script>
<script>
$(document).ready(function(){
    $('#Date').on('change', function(){
        var dateID = $(this).val();
        if(dateID){
            $.ajax({
                type:'POST',
                url:'Dependant_Drop_Down_list.php',
                data:'id='+dateID,
                success:function(html){
                    $('#Day').html(html);
                    $('#STime').html('<option value="">Select Day first</option>'); 
                }
            }); 
        }else{
            $('#Day').html('<option value="">Select the Date first</option>');
            $('#STime').html('<option value="">Select the Day first</option>');
			$('#ETime').html('<option value="">Select the Start Timing first</option>'); 
        }
    });
    
    $('#Day').on('change', function(){
        var DayID = $(this).val();
        if(DayID){
            $.ajax({
                type:'POST',
                url:'Dependant_Drop_Down_list.php',
                data:'did='+DayID,
                success:function(html){
                    $('#STime').html(html);
					$('#ETime').html('<option value="">Select the Start Timing First</option>'); 
                }
            }); 
        }else{
            $('#STime').html('<option value="">Select the Day first</option>');
			$('#ETime').html('<option value="">Select the Start Timing first</option>');
        }
    });
	
	 $('#STime').on('change', function(){
        var StimeID = $(this).val();
        if(StimeID){
            $.ajax({
                type:'POST',
                url:'Dependant_Drop_Down_list.php',
                data:'didi='+StimeID,
                success:function(html){
                    $('#ETime').html(html);
                }
            }); 
        }else{
            
			$('#ETime').html('<option value="">Select the Start Timing first</option>');
        }
    });
	
});
</script>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<form action = "Deleting_And_Updating_Database.php" method="post" onsubmit= "return validate()">
<h1> Hello 
<?php 
include 'Store_User_Pass.php';

echo $n;
?>
!!!!</h1>
<h2>Please Select Below the Laundry Schedule.</h2> 
<div class= "container"> 
<?php 
    // Include the database config file 
       include_once 'Managing_Database_Two.php'; 
     
    // Fetch all the available dates 
    $query = "SELECT * FROM dates WHERE DateC >= current_date()"; 
    $result = $conn->query($query); 
?>
<label>Choose the Date: </label><br>
<!-- Date dropdown -->
<select name = "Date" id="Date"> 
    <option value="">Select Date</option>
    <?php 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].'">'.$row['DateC'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Date not available</option>'; 
    } 
    ?>
</select>
<br>
<br>
<br>
<label>Select the Day: </label><br>
<!-- Day dropdown --> 
<select name = "Day" id="Day">
    <option value="">Select Date first</option>
</select>
<br>
<br>
<br>
<label>Choose the TimeSlot: </label><br>
<!-- StartTime dropdown -->
<select name = "STime" id="STime">
    <option value="">Select Day first</option>
</select>
<!-- EndTime dropdown -->
<select name = "ETime" id="ETime">
    <option value="">Select Start Timing first</option>
</select>

<br>
<h3 id= "message"></h3>
<input type="submit" name="submit" value="Submit"/>

</div>
 
</form>

<h1><a href="logout.php">Logout</a><h1>
</body>
</html>