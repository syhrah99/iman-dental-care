<?php

	include('connection.php');

// $numchars = rand(3,3); 
//   //This is the list from which id is generated.
//   $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
//   $random=''; 
//   //Do a random generation in a for loop
//   for($i=0; $i<$numchars;$i++)  { 
//     $random.=$chars[rand(0,count($chars)-1)]; 
//   } 

$id = $_POST['staff_id'];
// generateRandomString().$random;
$role =  $_POST['role'];
$fullname =  $_POST['fullname'];
$address =  $_POST['address'];
$age =  $_POST['age'];
$phonenum =  $_POST['phonenum'];
$fgender =  $_POST['fgender'];
$password =  $_POST['password'];

$sql = "INSERT INTO staff (staff_id,staff_name,staff_address, staff_age,staff_phonenum, staff_gender, role , s_password) VALUES ('$id','$fullname', '$address', '$age' ,'$phonenum','$fgender','$role','$password')";
$result= mysqli_query($conn, $sql);

if ($result)
{
	mysqli_commit($conn);
	
	print '<script>alert("One Record Has Been Added");</script>';
	print '<script>window.location.assign("../indexStaff.php");</script>';
	
}
else
 {
 	print '<script>alert("No Record Added. Please Retry!");</script>';
  print '<script>window.location.assign("../registrationStaff.php");</script>';
    }	 

mysqli_close($conn);

// function generateRandomString($length = 1) {
//     $characters = 'S';
//     $charactersLength = strlen($characters);
//     $randomString = '';
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString; 
//  }

?>