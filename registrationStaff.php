<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iman DentalCare</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/dental-clinics.jpg);">
					<span class="login100-form-title-1">
						<h1>Iman DentalCare Management System<br>
                    SIGN UP</h1>
					</span>
				</div>

				<form action="./process/addStaffRegis.php" method="POST"  class="login100-form validate-form">

					<div class="wrap-input100 validate-row m-b-26" data-validate = "Choose Role" style=" margin-top: -5px; ">
                        <span class="label-input100">Role</span>
                        <div class="input100 ">
                         <span class="focus-input100"></span>	
                            <select id="role" name="role" class="form-control ">
		                        <option selected value="Doctor" required>Doctor</option>
		                        <option value="Nurse ">Nurse</option>    
                    		</select>
                     	</div> 
                 	</div> 

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="fullname" placeholder="Enter full name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" placeholder="Enter address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Age is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="age" placeholder="Enter age">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Phone Num is required">
						<span class="label-input100">Phone No.</span>
						<input class="input100" type="text" name="phonenum" placeholder="Enter Phone Num">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-row m-b-26" data-validate = "Choose Gender" style=" margin-top: -5px; ">
                        <span class="label-input100">Gender</span>
                        <div class="input100 ">
                         <span class="focus-input100"></span>	
                            <select id="fgender" name="fgender" class="form-control ">
		                        <option selected value="M " required>Male</option>
		                        <option value="F ">Female</option>    
                    		</select>
                     	</div> 
                 	</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn"><a href="./indexStaff.php">
						<button class="login100-form-btn"> Submit </button>
					</div>

					<center>
					<div class="container-login100-form-btn">
					<button  class="login100-form-btn" type="button" name="back" class="btn">Back</button></a></td>
					</center>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>