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
<style>
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/dental-clinics.jpg);">
					<span class="login100-form-title-1">
						<h1>Iman DentalCare Management System<br>
                    Sign Up</h1>
					</span>
				</div>

				<form action="./process/addPatient.php" method="POST"  class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="IC Number is required">
						<span class="label-input100">IC Number</span>
						<input class="input100" type="text" name="NRIC" placeholder="Enter IC Number">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Full Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="fullname" placeholder="Enter Full Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Phone Number is required">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="number" name="phonenum" placeholder="Enter Phone Number">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" placeholder="Enter Address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Age is required">
						<span class="label-input100">Age</span>
						<input class="input100" type="text" name="age" placeholder="Enter Age">
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

                 	<div class="wrap-input100 validate-row m-b-26" data-validate = "Choose Marital Status" style=" margin-top: -5px; ">
                        <span class="label-input100">Marital Status</span>
                        <div class="input100 ">
                         <span class="focus-input100"></span>	
                            <select id="status" name="status" class="form-control ">
		                        <option selected value="Single " required>Single</option>
		                        <option value="Married ">Married</option>    
                    		</select>
                     	</div> 
                 	</div> 

                 	<div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						
						<input class="input100" type="password" id="password" name="password" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-b-18">
						<button class="login100-form-btn">
							Submit
						</button>
					</div>

					<div id="message">
					  <h3>Password must contain the following:</h3>
					  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
					  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					  <p id="number" class="invalid">A <b>number</b></p>
					  <p id="length" class="invalid">Minimum <b>6 characters</b></p>
					</div>
		
				</form>
			</div>
		</div>
	</div>
	
	<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
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