<?php  

SESSION_START();

include('connection.php');
 
if (isset($_POST['staff_name']) and isset($_POST['password'])){
	// Assigning POST values to variables.
	$staff_name = $_POST['staff_name'];
	$pwd = $_POST['password'];


	// CHECK FOR THE RECORD FROM TABLE

	$result=$conn->query("SELECT * FROM staff WHERE staff_name='$staff_name' and s_password='$pwd'");

		if($result->num_rows == 0){
		
			echo "<script type='text/javascript'>alert('ID or Password not match !!')</script>";
			print '<script>window.location.assign("../indexStaff.php");</script>';

			exit;
		}

	if($result->num_rows>0)
	{
		
		$user =$result->fetch_assoc();
				
				
					$_SESSION['staff_id']=$user['staff_id'];
					$_SESSION['staff_name']=$user['staff_name'];
					$_SESSION['logged_in']=true;
					

		if($user['role'] == 'Doctor')
		{
			echo'<script>alert("You are login successfully as '.$user['role'].'")</script>';
			print '<script>window.location.assign("../listAppointment.php");</script>';

		}


		else if($user['role'] == 'Admin')
		{
			
			echo'<script>alert("You are login successfully as '.$user['role'].'")</script>';
			// print '<script>window.location.assign("/workfile/CSMS/homePageNurse.php");</script>';

			print '<script>window.location.assign("../dashboardNurse2.php");</script>';

			
		}

	}
}
	
mysqli_close($conn);
?>