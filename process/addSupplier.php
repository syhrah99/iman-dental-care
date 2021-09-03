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
$numchars = rand(5,5); 
  //This is the list from which id is generated.
  $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
  $random=''; 
  //Do a random generation in a for loop
  for($i=0; $i<$numchars;$i++)  { 
    $random.=$chars[rand(0,count($chars)-1)]; 
  } 

$supplierid = generateRandomString().$random;
$suppliername = $_POST['supplier_name'];
$suppliernumber = $_POST['supplier_number']; 
$supplieraddress = $_POST['supplier_address']; 

// transfer appointment details from  variable into appointment table
 $sql="INSERT INTO supplier ( supplier_id, supplier_name, supplier_number, supplier_address )
 VALUES ('$supplierid', '$suppliername', '$suppliernumber', '$supplieraddress' )";

$result= mysqli_query($conn, $sql); //to keep results query into $result

// if success display message

if ($result)
{
	mysqli_commit($conn);
	
	print '<script>alert("One Record Has Been Added");</script>';
	print '<script>window.location.assign("../listSupplier.php");</script>';
}
else
 {
 	print '<script>alert("No Record Added. Please Retry!");</script>';
 		print '<script>window.location.assign("../Supplier.php");</script>';
    }	 
mysqli_close($conn);


function generateRandomString($length = 1) {
    $characters = 'H';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
