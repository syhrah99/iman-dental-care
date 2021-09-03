<?php
session_start();

$presid =  $_POST['prescription_id'];
$drugsid=$_POST['drugs_id'];
$quantity = $_POST['quantity'];
$prescribe = $_POST['prescribe'];



// To open the database and make connection to server

include('connection.php');
// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO prescription_detail ( prescription_id, drugs_id, quantity, prescribe) 
 VALUES ('$presid', '$drugsid', '$quantity', '$prescribe')";

$result= mysqli_query($conn, $sql); //to keep results query into $result

// if success display message

if ($result)
{
	mysqli_commit($conn);
	
	print '<script>alert("One Record Has Been Added");</script>';
	print '<script>window.location.assign("../listPrescription.php");</script>';
	
}
else
 {
 	print '<script>alert("No Record Added. Please Retry!");</script>';
 	print '<script>window.location.assign("../listPrescription.php");</script>';
    }	 

mysqli_close($conn);
 
?>
