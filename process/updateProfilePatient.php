
<?php

session_start();
	
	if(isset($_SESSION["nric"])){
			$user = $_SESSION["nric"];
	}else{
		// header('Location: Index.php');
	}
	 include "connection.php";


if(isset($_POST['submit'])){
	$nric = $_POST['nric'];
$fullname =  $_POST['p_name'];
$address =  $_POST['p_address'];
$age =  $_POST['p_age'];
$phonenum =  $_POST['p_phonenum'];
$gender =  $_POST['p_gender'];
$status =  $_POST['p_status'];
$password =  $_POST['password'];
$email =  $_POST['p_email'];


// Create connectbetul

// Check connectbetul


if (!$conn) 
	{
		die("connecttion failed: " . mysqli_connect_error());
	}
	
	$sql1 = "UPDATE PATIENT SET nric='$nric', p_name='$fullname', p_address='$address', p_age='$age', p_phonenum='$phonenum', p_gender='$gender', p_status='$status' , password='$password' , p_email='$email' WHERE nric='$nric'";
	$run = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
	if($run){
			echo '<script language="javascript">';
			echo 'alert("Update Success");';
			echo 'window.location.href="../profilePatient.php";';
			echo '</script>';
	}
	else 
	{
		echo '<script language="javascript">';
		echo 'alert("Update Fail");';
		echo 'window.location.href="../profilePatient.php";';
		echo '</script>';
	}
	


}
?>
