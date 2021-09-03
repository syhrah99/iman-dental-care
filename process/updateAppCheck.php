<?php
session_start();
 //connection to the database
include('connection.php');

$result = $conn->query( "SELECT appointment.*, staff.staff_name from `appointment`,`staff` where `appointment`.`staff_id` = `staff`.`staff_id`");
   $appid = $_GET['appointment_id'];

if (isset($_POST['submit'])) {
	$appid = $_POST['appointment_id'];
	$status = $_POST['status'];


       $conn->query("UPDATE `appointment` SET `app_status` = '$status' WHERE `appointment_id`='$appid'");
       
       header("location:../AppointmentCheck.php");
    }

    $member = $conn->query( "SELECT appointment.*, staff.staff_name from `appointment`,`staff` where `appointment`.`staff_id` = `staff`.`staff_id` and `appointment_id` = '$appid'");
    $mem = mysqli_fetch_assoc($member); 
mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<form method="POST" action="./process/updateAppCheck.php" role="form">
	        <div class="modal-body">
                    <div class="form-group">
                        <label for="appointment_id">Appointment ID</label>
                        <input type="text" class="form-control" id="appointment_id" name="appointment_id" value="<?php echo $mem['appointment_id'];?>" readonly="true" />
                    </div>

                    <div class="form-group">
                        <label for="description">Status</label>
                        <select id="app_status" name="status" class="form-control ">
                        <option selected value="<?php echo $mem['app_status'];?>" required>Current: <?php echo $mem['app_status'];?></option>
                        <option selected value="Approve">Approve</option>
                        <option value="Not Approve">Not Approve</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="status" name="status" value="<?php echo $mem['app_status'];?>" /> -->
                  
                    <div class="modal-footer">
		                <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                </div>
            </div>
	</form>
</body>
</html>
