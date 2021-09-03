<?php
session_start();

// Transfer Appointment Details From appointment.php into variables

		if(isset($_SESSION["nric"])){
		$nric = $_SESSION["nric"];
		}else{
		// header('Location: index.php');
		}
		include('connection.php');

$date = new DateTime();
$ts = $date->getTimestamp();

$appid = generateRandomString().$ts;
$nric = $_SESSION["nric"];
$doctor = $_POST['fdoctor'];
$cdate =$_POST['date'];
$ctime =$_POST['ftime'];
$cdescription =$_POST['description'];
$status = Requested;

// To open the database and make connection to server

 

// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO appointment ( appointment_id, nric, staff_id, app_date, app_time , description, app_status) 
 VALUES ('$appid', '$nric', '$doctor', '$cdate', '$ctime', '$cdescription', '$status')";

$result= mysqli_query($conn, $sql); //to keep results query into $result

// if success display message

if ($result)
{
	mysqli_commit($conn);
	
	print '<script>alert("One Record Has Been Added");</script>';
	print '<script>window.location.assign("../AppointmentHistory.php");</script>';
	
}
else
 {
 	print '<script>alert("No Record Added. Please Retry!");</script>';
 	print '<script>window.location.assign("../Appointment.php");</script>';

    }	 

mysqli_close($conn);

function generateRandomString($length = 1) {
    $characters = 'A';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>