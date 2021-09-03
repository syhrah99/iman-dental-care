<?php
session_start();      
      
      
if(isset($_POST['Confirm'])){
$numchars = rand(6,6); 
//This is the list from which id is generated.
$chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
$random=''; 
//Do a random generation in a for loop
for($i=0; $i<$numchars;$i++)  { 
$random.=$chars[rand(0,count($chars)-1)];  
}

function generateRandomString($length = 1) {
$characters = 'I';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;
}

$invoice_id = generateRandomString().$random; 
$presid=$_POST['prescription_id'];
$drugs_total_price = $_POST['drugs_total_price'];
$bill_status=debt;
$date = date('Y-m-d H:i:s');
$debt_amount = $_POST['drugs_total_price'];   


include('connection.php');


$stmt = $conn->prepare($sql3="INSERT into invoice ( invoice_id, prescription_id ,bill_date ,bill_status ,drugs_total_price ,debt_amount)VALUES
        ('$invoice_id','$presid','$date','$bill_status','$drugs_total_price','$debt_amount') ");

if($stmt->execute()){

$sqlD="select * from prescription_detail where prescription_id = '$presid'";
$resD=$conn->query($sqlD);


  while($row=$resD->fetch_assoc()){
    $drugs_id = $row["drugs_id"];
    
    $sql= "select * from drugs where drugs_id = '$drugs_id' ";
    $res=$conn->query($sql);
      
      while($row1=$res->fetch_assoc())
      {
        $stmt4 = $conn->prepare($sql4="UPDATE drugs SET quantity = quantity - '".$row["quantity"]."'
                    WHERE  drugs_id = '".$row1["drugs_id"]."' ");
        $stmt4->execute();
      }
  }
mysqli_close($conn);  
?><p style = "font-family:ingrained;font-size:30px;font-style:bold;color:white;"><?php
echo "<script type='text/javascript'>alert('An invoice created successfully')</script>";
print '<script>window.location.assign("../listPatient.php");</script>';
}

} 
?>