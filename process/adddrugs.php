<?php
session_start();

// Transfer Appointment Details From appointment.php into variables

    if(isset($_SESSION["staff_id"])){
    $staff_id = $_SESSION["staff_id"];
    }else{
    // header('Location: index.php');
    }
    include('connection.php');

$numchars = rand(4,4); 
  //This is the list from which id is generated.
  $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
  $random=''; 
  //Do a random generation in a for loop
  for($i=0; $i<$numchars;$i++)  { 
    $random.=$chars[rand(0,count($chars)-1)]; 
  } 


$drgid = generateRandomString().$random;
$staff_id = $_SESSION["staff_id"];
$medname = $_POST['med_name'];
$quantity = $_POST['quantity'];
$expdate =$_POST['expiry_date'];
$price =$_POST['price'];

// To open the database and make connection to server

// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO drugs ( drugs_id, staff_id, med_name, quantity, expiry_date , price) 
 VALUES ('$drgid', '$staff_id', '$medname', '$quantity', '$expdate' , '$price')";

$result= mysqli_query($conn, $sql); //to keep results query into $result

// if success display message

if ($result)
{
  mysqli_commit($conn);
  
  print '<script>alert("One Record Has Been Added");</script>';
  print '<script>window.location.assign("../listDrugs.php");</script>';
  
}
else
 {
  print '<script>alert("No Record Added. Please Retry!");</script>';
   print '<script>window.location.assign("../Drugs.php");</script>';
    }  
mysqli_close($conn);


function generateRandomString($length = 1) {
    $characters = 'Z';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>