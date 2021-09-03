<?php
session_start();
 //connection to the database
include('connection.php');

$nric = $_SESSION["nric"];
$result = $conn->query( "SELECT appointment.*, staff.staff_name from `appointment`,`staff` where `appointment`.`staff_id` = `staff`.`staff_id` and `nric` = '$nric'");
   $appid = $_GET['appointment_id'];

if (isset($_POST['submit'])) {
	$appid = $_POST['appointment_id'];
	$nric = $_SESSION["nric"];
	$doctor = $_POST['fdoctor'];
	$cdate =$_POST['date'];
	$ctime =$_POST['ftime'];
	$cdescription =$_POST['description'];
	$status = $_POST['status'];


       $conn->query("UPDATE `appointment` SET `app_date` = '$cdate', `app_time` = '$ctime',  `description` = '$cdescription' WHERE `appointment_id`='$appid'");
       
       header("location:../AppointmentHistory.php");
    }

    $member = $conn->query( "SELECT appointment.*, staff.staff_name from `appointment`,`staff` where `appointment`.`staff_id` = `staff`.`staff_id` and `appointment_id` = '$appid'");
    $mem = mysqli_fetch_assoc($member); 

mysqli_close($conn);
?>
<!DOCTYPE html>
<head>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<form method="POST" action="./process/updateAppHistory.php" role="form">
	        <div class="modal-body">
                    <div class="form-group">
                        <label for="appointment_id">Appointment ID</label>
                        <input type="text" class="form-control" id="appointment_id" name="appointment_id" value="<?php echo $mem['appointment_id'];?>" readonly="true" />
                    </div>
                    <div class="form-group">
                                <label for="fdoctor">Doctor Name</label>
                                <input type="text" class="form-control" id="fdoctor" name="fdoctor" value="<?php echo $mem['staff_name'];?>" readonly="true" /> 
                    </div>

                    <div class="form-group">
                        <label for="Date ">Date </label>
                            <input type="date" class="form-control" name="date" value="<?php echo $mem['app_date'];?>" min="<?php $date = strtotime("+4 day");
                            echo date('Y-m-d', $date); ?>" >
                        </div>


                    <div class="form-group">
                                <label for="time">Time</label>
                                <div class="col-auto my-1 ">
                                    <select id="time" name="ftime" class="form-control ">
                                    <option selected value="<?php echo $mem['app_time'];?>" required>Current: <?php echo $mem['app_time'];?></option>
                                        <option selected value="10:00AM">10:00 AM</option>
				                        <option value="10:30AM">10:30 AM</option>
				                        <option value="11:00AM">11:00 AM</option>
				                        <option value="11:30AM">11:30 AM</option>
				                        <option value="12:00PM">12:00 PM</option>
				                        <option value="12:30PM">12:30 PM</option>
				                        <option value="14:30PM">14:30 PM</option>
				                        <option value="15:30PM">15:30 PM</option>
				                        <option value="16:00PM">16:00 PM</option>
				                        <option value="16:30PM">16:30 PM</option>
				                        <option value="17:00PM">17:00 PM</option>
				                        <option value="17:30PM">17:30 PM</option>
				                        <option value="18:00PM">18:00 PM</option>
				                        <option value="20:00PM">20:00 PM</option>
				                        <option value="20:30PM">20:30 PM</option>
				                        <option value="21:00PM">21:00 PM</option>
				                        <option value="21:00PM">21:30 PM</option>
				                        <option value="22:00PM">22:00 PM</option>
                				</select>
                                </div> 
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $mem['description'];?>" />
                  
                    <div class="modal-footer">
		                <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                </div>
            </div>
	</form>
</body>
</html>
