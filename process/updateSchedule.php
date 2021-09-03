<?php
session_start();
 //connection to the database
include('connection.php');

$result = $conn->query( "SELECT * from schedule");
   $schedule_id = $_GET['schedule_id'];

if (isset($_POST['submit'])) {
	$schedule_id = $_POST['schedule_id'];
  //display old checkbox
  $uday=implode(",",$day);
  $utime=implode(",",$time);
  //insert new checkbox
  $fday = implode(',', (array)$_POST['day']);
  $ftime = implode(',', (array)$_POST['time']);

       $conn->query("UPDATE `schedule` SET `day` = '$fday', `s_time` = '$ftime'  WHERE `schedule_id`='$schedule_id'");
       
       header("location:../listSchedule.php");
    }

    $member = $conn->query( "SELECT * from schedule  WHERE `schedule_id`='$schedule_id'");
    $mem = mysqli_fetch_assoc($member); 

mysqli_close($conn);

?>
<!DOCTYPE html>

  <style>
    * {
      margin: 0;
      padding: 0;
  }

  .seat {
      float: left;
      display: block;
      margin: 10px;
      background: #9fa9a3;
      width: 100px;
      height: 50px;
  }

  label {
      display: block;
      position: relative;
      width: 100%;
      text-align: center;
      font-size: 14px;
      font-weight: bold;
      line-height: 3rem;
  }
 
  .seat-select {
      display: none;
  }

  .seat-select:checked+.seat {
      background: #F44336;
  }

  </style>

<head>
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<form method="POST" action="./process/updateSchedule.php" role="form">
	        <div class="modal-body">
                    <div class="form-group">
                        <label for="schedule_id">Schedule ID</label>
                        <input type="text" class="form-control" id="schedule_id" name="schedule_id" value="<?php echo $mem['schedule_id'];?>" readonly="true" />
                    </div>

                    <div class="form-group row" style="margin-left: 98px; margin-top: 40px;">
                        <label for="day" class="col-sm-3 col-form-label " style="margin-right: -2px; margin-top: 2px; ">Available Day</label>
                            <div class="col-sm-12 ">
                             <section id="seats">
                              <?php 
                              $chkbox=$mem['day'];
                              $day=explode(",",$chkbox);
                              ?>
                              <input  id="seat-1" class="seat-select" <?php if(in_array("Monday",$day)){echo "checked";}?>  type="checkbox" value="Monday" name="day[]"/>
                              <label for="seat-1" class="seat" >Monday</label>
                              <input  id="seat-2" class="seat-select" <?php if(in_array("Tuesday",$day)){echo "checked";}?>  type="checkbox" value="Tuesday" name="day[]"/>
                              <label for="seat-2" class="seat" >Tuesday</label>
                              <input  id="seat-3" class="seat-select" <?php if(in_array("Wednesday",$day)){echo "checked";}?>  type="checkbox" value="Wednesday" name="day[]"/>
                              <label for="seat-3" class="seat" >Wednesday</label>
                              <input  id="seat-4" class="seat-select" <?php if(in_array("Thursday",$day)){echo "checked";}?>  type="checkbox" value="Thursday" name="day[]"/>
                              <label for="seat-4" class="seat" >Thursday</label>
                              <br></br><br></br>
                              <input  id="seat-5" class="seat-select" <?php if(in_array("Friday",$day)){echo "checked";}?>  type="checkbox" value="Friday" name="day[]"/>
                              <label for="seat-5" class="seat" >Friday</label>
                              <input  id="seat-6" class="seat-select" <?php if(in_array("Saturday",$day)){echo "checked";}?>  type="checkbox" value="Saturday" name="day[]"/>
                              <label for="seat-6" class="seat" >Saturday</label>
                              <input  id="seat-7" class="seat-select" <?php if(in_array("Sunday",$day)){echo "checked";}?>  type="checkbox" value="Sunday" name="day[]"/>
                              <label for="seat-7" class="seat" >Sunday</label>
                                </section></div></div>

                        <div class="form-group row" style="margin-left: 98px; margin-top: 40px;">
                        <label for="time" class="col-sm-3 col-form-label " style="margin-right: -2px; margin-top: 2px; ">Available Time </label>
                            <div class="col-sm-12 ">
                             <section id="seats">
                              <?php 
                              $row=$mem['s_time'];
                              $time=explode(",",$row);
                              ?>
                              <input id="seat-8" class="seat-select" <?php if(in_array("10:00AM",$time)){echo "checked";}?>  
                              type="checkbox" value="10:00AM" name="time[]"/>
                              <label for="seat-8" class="seat" >10:00AM</label>
                              <input id="seat-9" class="seat-select" <?php if(in_array("10:30AM",$time)){echo "checked";}?>
                               type="checkbox" value="10:30AM" name="time[]"/>
                              <label for="seat-9" class="seat" >10:30AM</label>
                              <input id="seat-10" class="seat-select" <?php if(in_array("11:00AM",$time)){echo "checked";}?>
                              type="checkbox" value="11:00AM" name="time[]"/>
                              <label for="seat-10" class="seat" >11:00AM</label>
                              <input id="seat-11" class="seat-select" <?php if(in_array("11:30AM",$time)){echo "checked";}?>
                              type="checkbox" value="11:30AM" name="time[]"/>
                              <label for="seat-11" class="seat" >11:30AM</label>
                              <br></br><br></br>
                              <input id="seat-12" class="seat-select" <?php if(in_array("12:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="12:00PM" name="time[]"/>
                              <label for="seat-12" class="seat" >12:00PM</label>
                              <input id="seat-13" class="seat-select" <?php if(in_array("14:30PM",$time)){echo "checked";}?>
                              type="checkbox" value="14:30PM" name="time[]"/>
                              <label for="seat-13" class="seat" >14:30PM</label>
                              <input id="seat-14" class="seat-select" <?php if(in_array("15:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="15:00PM" name="time[]"/>
                              <label for="seat-14" class="seat" >15:00PM</label>
                              <input id="seat-15" class="seat-select" <?php if(in_array("15:30PM",$time)){echo "checked";}?>
                              type="checkbox" value="15:30PM" name="time[]"/>
                              <label for="seat-15" class="seat" >15:30PM</label>
                              <br></br><br></br>
                              <input id="seat-16" class="seat-select" <?php if(in_array("16:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="16:00PM" name="time[]"/>
                              <label for="seat-16" class="seat" >16:00PM</label>
                              <input id="seat-17" class="seat-select" <?php if(in_array("16:30PM",$time)){echo "checked";}?>
                              type="checkbox" value="16:30PM" name="time[]"/>
                              <label for="seat-17" class="seat" >16:30PM</label>
                              <input id="seat-18" class="seat-select" <?php if(in_array("17:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="17:00PM" name="time[]"/>
                              <label for="seat-18" class="seat" >17:00PM</label>
                              <input id="seat-19" class="seat-select" <?php if(in_array("17:30PM",$time)){echo "checked";}?>
                              type="checkbox" value="17:30PM" name="time[]"/>
                              <label for="seat-19" class="seat" >17:30PM</label>
                              <br></br><br></br>
                              <input id="seat-20" class="seat-select" <?php if(in_array("18:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="18:00PM" name="time[]"/>
                              <label for="seat-20" class="seat" >18:00PM</label>
                              <input id="seat-21" class="seat-select" <?php if(in_array("18:30PM",$time)){echo "checked";}?>
                              type="checkbox" value="18:30PM" name="time[]"/>
                              <label for="seat-21" class="seat" >18:30PM</label>
                              <input id="seat-22" class="seat-select" <?php if(in_array("20:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="20:00PM" name="time[]"/>
                              <label for="seat-22" class="seat" >20:00PM</label>
                              <input id="seat-23" class="seat-select" <?php if(in_array("20:30PM",$time)){echo "checked";}?>
                              type="checkbox" value="20:30PM" name="time[]"/>
                              <label for="seat-23" class="seat" >20:30PM</label>
                              <br></br><br></br>
                              <input id="seat-24" class="seat-select" <?php if(in_array("21:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="21:00PM" name="time[]"/>
                              <label for="seat-24" class="seat" >21:00PM</label>
                              <input id="seat-25" class="seat-select" <?php if(in_array("21:30PM",$time)){echo "checked";}?>
                              type="checkbox" value="21:30PM" name="time[]"/>
                              <label for="seat-25" class="seat" >21:30PM</label>
                              <input id="seat-26" class="seat-select" <?php if(in_array("22:00PM",$time)){echo "checked";}?>
                              type="checkbox" value="22:00PM" name="time[]"/>
                              <label for="seat-26" class="seat" >22:00PM</label>
                                </section></div></div>
                  
                    <div class="modal-footer">
		                <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                </div>
            </div>
	</form>
</body>
</html>
