<?php
    //connection to the database
include('connection.php');

   $conn->query("SELECT * from schedule");
   $schedule_id = $_GET['schedule_id'];

   if(isset($_POST['submit'])){
        $schedule_id = $_POST['schedule_id'];
        
            $sql= "Select * from schedule WHERE schedule_id= '$schedule_id'";
            $res=$conn->query($sql);
                while($row=$res->fetch_assoc()){
                    $conn->query("INSERT INTO archive_schedule VALUES ('".$row["schedule_id"]."','".$row["staff_id"]."','".$row["week"]."','".$row["day"]."','".$row["s_time"]."')");
                }
                                        
        $conn->query("DELETE FROM `schedule`  WHERE `schedule_id`='$schedule_id';"); 
    
        header("location:../listSchedule.php");
   } 
    $members = $conn->query("SELECT * from schedule WHERE schedule_id= '$schedule_id'");
    $mem = mysqli_fetch_assoc($members);

?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./css/style.css" rel="stylesheet" />
</head>
<body>
<form method="POST" action="./process/deleteSchedule.php" role="form">
            <div class="modal-body">
                            <div class="form-group">
                                <h4 for="confirm">Are you sure want to delete this record ?</h4>
                            </div>
                            <div class="form-group">
                                <label for="schedule_id">Schedule ID</label>
                                <input type="text" class="form-control" id="schedule_id" name="schedule_id" value="<?php echo $mem['schedule_id'];?>" readonly="true" />   
                            </div>

            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="submit" value="Yes" />&nbsp;
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
    </form>
</body>
</html>
