<?php
session_start();
 //connection to the database
include('./process/connection.php');

    $treatid = $_GET['treatment_id'];
    $member = $conn->query( "SELECT * from `treatment` where `treatment_id` = '$treatid'");
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
<form method="POST" action="./process/addPrescription.php" role="form">
          <div class="modal-body">
                    <div class="form-group">
                        <label for="treatment_id">Treatment ID</label>
                        <input type="text" class="form-control" id="treatment_id" name="treatment_id" value="<?php echo $mem['treatment_id'];?>" readonly="true" />
                    </div>
                       
                       
                       <div class="form-group">
                        <label for="requested_date">Date</label>
                        <input type="date" name="requested_date" min="<?php echo date('Y-m-d'); ?>" required>

                    </div>     

                    <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="submit" />&nbsp;
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
            </div>
  </form>

</body>
</html>