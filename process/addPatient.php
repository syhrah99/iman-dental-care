<?php

	include('connection.php');

$NRIC = $_POST['NRIC'];
$fullname =  $_POST['fullname'];
$address =  $_POST['address'];
$age =  $_POST['age'];
$phonenum =  $_POST['phonenum'];
$fgender =  $_POST['fgender'];
$status =  $_POST['status'];
$email =  $_POST['email'];
$password =  $_POST['password'];

$sql = "INSERT INTO `patient`(`nric`, `p_name`, `p_phonenum`, `p_address`, `p_status`, `p_email`, `p_gender`, `p_age`, `password`) VALUES  ('$NRIC','$fullname', '$phonenum', '$address','$status' ,'$email','$fgender','$age','$password')";
$result= mysqli_query($conn, $sql);

if ($result)
{
	mysqli_commit($conn);
	print '<script>alert("One Record Has Been Added");</script>';
	print '<script>window.location.assign("../indexPatient.php");</script>';
}
else
{
	print '<script>alert("No Record Added");</script>';
	print '<script>window.location.assign("../registrationPatient.php");</script>';
}
mysqli_close($conn);

?>