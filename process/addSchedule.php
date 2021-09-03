<?php
session_start();

// Transfer Appointment Details From appointment.php into variables

		if(isset($_SESSION["staff_id"])){
		$staff_id = $_SESSION["staff_id"];
		}else{
		// header('Location: index.php');
		}

// To open the database and make connection to server

include('connection.php');

// $date = new DateTime();
// $ts = $date->getTimestamp();

$schedule_id = $_POST['schedule_id'];
// generateRandomString().$ts;
$staff_id = $_SESSION["staff_id"];
$week = $_POST['week'];
$day = implode(',', (array)$_POST['day']);
$time = implode(',', (array)$_POST['time']);
// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO schedule ( schedule_id,staff_id, week, day, s_time ) 
 VALUES ('$schedule_id', '$staff_id', '$week','$day', '$time');";

$result= mysqli_query($conn, $sql); //to keep results query into $result

// if success display message

if ($result)
{
	mysqli_commit($conn);
	
	print '<script>alert("One Record Has Been Added");</script>';
	print '<script>window.location.assign("../Schedule2.php");</script>';	
}
else
 {
 	print '<script>alert("No Record Added. Please Retry!");</script>';
	print '<script>window.location.assign("../Schedule2.php");</script>';
    }	 

mysqli_close($conn);


// function generateRandomString($length = 1) {
//     $characters = 'D';
//     $charactersLength = strlen($characters);
//     $randomString = '';
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString;
// }

?>