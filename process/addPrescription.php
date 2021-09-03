<?php
session_start();

$numchars = rand(6,6); 
  //This is the list from which id is generated.
  $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
  $random=''; 
  //Do a random generation in a for loop
  for($i=0; $i<$numchars;$i++)  { 
    $random.=$chars[rand(0,count($chars)-1)];  
    }

    function generateRandomString($length = 1) {
    $characters = 'P';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

$presid = generateRandomString().$random;
$treatid =  $_POST['treatment_id'];
$requested_date=$_POST['requested_date'];


include('connection.php');

// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO prescription ( prescription_id, treatment_id, requested_date) 
 VALUES ('$presid', '$treatid', '$requested_date')";

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
  print '<script>window.location.assign("../listTreatment.php");</script>';

    }  
mysqli_close($conn);
 
?>