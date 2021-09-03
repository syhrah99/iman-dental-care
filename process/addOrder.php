<?php
session_start();

// Transfer Appointment Details From appointment.php into variables

    if(isset($_SESSION["staff_id"])){
    $staff_id = $_SESSION["staff_id"];
    }else{
    // header('Location: index.php');
    }
    include('connection.php');

// To open the database and make connection to server
// $numchars = rand(5,5); 
//   //This is the list from which id is generated.
//   $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
//   $random=''; 
//   //Do a random generation in a for loop
//   for($i=0; $i<$numchars;$i++)  { 
//     $random.=$chars[rand(0,count($chars)-1)]; 
//   } 

$order_id = $_POST['order_id']; 
$drugs_id = $_POST['drugs_id']; 
$supplier_id = $_POST['supplier_id']; 
$available_quantity = $_POST['available_quantity'];
$delivery_date = $_POST['delivery_date']; 
$delivery_time = $_POST['delivery_time']; 

// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO drugs_supply ( order_id, drugs_id, supplier_id, available_quantity , delivery_date, delivery_time)
 VALUES ('$order_id', '$drugs_id', '$supplier_id', '$available_quantity',  '$delivery_date','$delivery_time')";

$result= mysqli_query($conn, $sql); //to keep results query into $result

// if success display message

if ($result)
{
  $stmt = $conn->prepare($sql4="UPDATE drugs SET quantity = quantity + '$available_quantity'
                  WHERE  drugs_id = '$drugs_id' ");
  $stmt->execute();
  
  mysqli_commit($conn);
  
  print '<script>alert("One Record Has Been Added");</script>';
  print '<script>window.location.assign("../listOrder.php");</script>';
}
else
 {
  print '<script>alert("No Record Added. Please Retry!");</script>';
 
    }  
mysqli_close($conn);


// function generateRandomString($length = 1) {
//     $characters = 'R';
//     $charactersLength = strlen($characters);
//     $randomString = '';
//     for ($i = 0; $i < $length; $i++) {
//         $randomString .= $characters[rand(0, $charactersLength - 1)];
//     }
//     return $randomString;
// }

?>
