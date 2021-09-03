<?php
session_start();

		if(isset($_SESSION["staff_id"])){
		$staff_id = $_SESSION["staff_id"];
		}else{
		// header('Location: index.php');
		}

$numchars = rand(5,5); 
  //This is the list from which id is generated.
  $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
  $random=''; 
  //Do a random generation in a for loop
  for($i=0; $i<$numchars;$i++)  { 
    $random.=$chars[rand(0,count($chars)-1)]; 
  } 

$treatid = generateRandomString().$random;
$appid =  $_POST['appointment_id'];
$staff_id = $_SESSION["staff_id"];
$treattype = $_POST['treatment_type'];
$disease = $_POST['disease'];


// To open the database and make connection to server

 include('connection.php');

// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO treatment ( treatment_id, appointment_id, staff_id, treatment_type, disease) 
 VALUES ('$treatid', '$appid', '$staff_id', '$treattype', '$disease')";

$result= mysqli_query($conn, $sql); //to keep results query into $result

// if success display message

if ($result)
{
	mysqli_commit($conn);
	
	print '<script>alert("One Record Has Been Added");</script>';
	print '<script>window.location.assign("../listTreatment.php");</script>';
	
}
else
 {
 	print '<script>alert("No Record Added. Please Retry!");</script>';
  print '<script>window.location.assign("../listAppointment.php");</script>';
    }	 

mysqli_close($conn);

function generateRandomString($length = 1) {
    $characters = 'T';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
