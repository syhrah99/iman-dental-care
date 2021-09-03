<?php
session_start();
 //connection to the database
include('./process/connection.php');

    $appid = $_GET['appointment_id'];
    $member = $conn->query( "SELECT * from `appointment` where `appointment_id` = '$appid'");
    $mem = mysqli_fetch_assoc($member); 

mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
   <!--  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
</head>
<body>
<form method="POST" action="./process/addTreatment.php" role="form">
          <div class="w3-modal-content w3-animate-top w3-card-4">
                    <div class="form-group">
                        <label for="appointment_id">Appointment ID</label>
                        <input type="text" class="form-control" id="appointment_id" name="appointment_id" value="<?php echo $mem['appointment_id'];?>" readonly="true" />
                    </div>

                    <div class="form-group">
                        <label for="staff_id">Staff ID</label>
                        <input type="text" class="form-control" id="staff_id" name="staff_id" value="<?php echo $mem['staff_id'];?>" readonly="true" />
                    </div>

                    <div class="form-group">
                        <label for="treatment_type">Treatment Type</label>
                        <input type="text" class="form-control" id="treatment_type" name="treatment_type" />

                    <div class="form-group">
                        <label for="disease">Disease</label>
                        <input type="text" class="form-control" id="disease" name="disease" />
                  
                    <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="submit" />&nbsp;
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
            </div>
  </form>
</body>
</html>