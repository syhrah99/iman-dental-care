<?php
require 'connection.php';
 session_start();
 if (isset($_SESSION['staff_id'])) {

if (isset($_POST['submit'])){
    $staff_id = $_POST['staff_id'];
				$staff_name =  $_POST['staff_name'];
				$staff_address =  $_POST['staff_address'];
				$staff_age =  $_POST['staff_age'];
				$staff_phonenum =  $_POST['staff_phonenum'];
				$staff_gender =  $_POST['staff_gender'];
				$role =  $_POST['role'];
				$s_password =  $_POST['s_password'];


//update phone number & address
$query=( "UPDATE staff SET staff_name='$staff_name',staff_address='$staff_address',staff_age='$staff_age',staff_phonenum='$staff_phonenum',staff_gender='$staff_gender',role='$role',s_password= '$s_password' WHERE staff_id = '$staff_id'; ");


$query_run=mysqli_query($conn,$query);
// fetch back from db
// $sql=("SELECT * FROM staff WHERE  staff_id='$_SESSION[staff_id]';");
// $result=mysqli_query($conn,$sql);
// $_SESSION=mysqli_fetch_array($result);

if ($query_run){
        echo "<script>alert('Update Success!')</script";
        header ("refresh:0;url=../profileNurse.php");
}
else{
        echo "<script>alert('Update Failed!')</script";
        header ("refresh:0;url=../profileNurse.php");
}
// mysqli_close($con);
}
}

?>
