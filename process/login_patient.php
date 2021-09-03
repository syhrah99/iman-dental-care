<?php  

SESSION_START();

include('connection.php');

if (isset($_POST['nric']) and isset($_POST['password'])){
	
// Assigning POST values to variables.
$nric = $_POST['nric'];
$password = $_POST['password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `patient` WHERE nric='$nric' and password='$password'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified !!";

$user =$result->fetch_assoc();

$_SESSION['p_name']=$user['p_name'];
$_SESSION['nric'] = $nric;
echo "<script type='text/javascript'>alert('Login Successful !')</script>";
print '<script>window.location.assign("../Appointment.php");</script>';

}else{
//echo "Invalid Login Credentials !!";
echo "<script type='text/javascript'>alert('Invalid IC or password !')</script>";
print '<script>window.location.assign("../indexPatient.php");</script>';

}
}

 mysqli_close($conn);
?>