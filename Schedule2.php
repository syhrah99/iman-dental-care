<?php
   //check for valid user 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">


     

    <title>Add Schedule</title>

    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    
       


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


</head>
<body>

<div class="limiter">
        <header>
            <?php include('./lib/navDoctor.php'); ?>
            </header>
                 <form action="./process/addSchedule.php" method="POST">
                     <div id="main">
                    <div style="width: 850px; background-color: #1E2021; color: white; border-radius: 30px 30px 30px 30px; margin:0 auto; margin-top: 100px; border-style: solid; margin-bottom: 50px; ">
                    <div style="margin-bottom:60px; margin-top: 30px; ">
                        <div>
                            <h1 style="text-align:center; ">Dentist Schedule</h1>
                        </div>
                    </div>

                         <div class="form-group row" style="margin-left: 98px; margin-top: -8px;">
                        <label for="week" class="col-sm-3 col-form-label " style="margin-right: -2px; margin-top: 2px; ">Week Selection</label>
                        <input id="week" type="week" name="week" style="color: black;" min="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <div class="form-group row" style="margin-left: 98px; margin-top: 40px;">
                        <label for=" " class="col-sm-3 col-form-label " style="margin-right: -2px; margin-top: 2px; ">Available Day</label>
                            
                            <div class="col-sm-12 ">
                             <section id="seats">
                              <input id="seat-1" class="seat-select" type="checkbox" value="Monday" name="day[]"/>
                              <label for="seat-1" class="seat" >Monday</label>
                              <input id="seat-2" class="seat-select" type="checkbox" value="Tuesday" name="day[]" />
                              <label for="seat-2" class="seat">Tuesday</label>
                              <input id="seat-3" class="seat-select" type="checkbox" value="Wednesday" name="day[]"  />
                              <label for="seat-3" class="seat">Wednesday</label>
                              <input id="seat-4" class="seat-select" type="checkbox" value="Thursday" name="day[]" />
                              <label for="seat-4" class="seat">Thursday</label>
                              <br></br><br></br>
                              <input id="seat-5" class="seat-select" type="checkbox" value="Friday" name="day[]" />
                              <label for="seat-5" class="seat">Friday</label>
                              <input id="seat-6" class="seat-select" type="checkbox" value="Saturday" name="day[]"  />
                              <label for="seat-6" class="seat">Saturday</label>
                             <!--  <input id="seat-7" class="seat-select" type="checkbox" value="Sunday" name="day[]" />
                              <label for="seat-7" class="seat">Sunday</label> -->
                                </section></div>
                            </div>

                        <div class="form-group row" style="margin-left: 98px; margin-top: 40px;">
                        <label for=" " class="col-sm-3 col-form-label " style="margin-right: -2px; margin-top: 2px; ">Available Time </label>
                            <div class="col-sm-12 ">
                             <section id="seats">
                              <input id="seat-8" class="seat-select" type="checkbox" value="10:00AM" name="time[]"/>
                              <label for="seat-8" class="seat" >10:00AM</label>
                              <input id="seat-9" class="seat-select" type="checkbox" value="10:30AM" name="time[]"/>
                              <label for="seat-9" class="seat" >10:30AM</label>
                              <input id="seat-10" class="seat-select" type="checkbox" value="11:00AM" name="time[]"/>
                              <label for="seat-10" class="seat" >11:00AM</label>
                              <input id="seat-11" class="seat-select" type="checkbox" value="11:30AM" name="time[]"/>
                              <label for="seat-11" class="seat" >11:30AM</label>
                              <br></br><br></br>
                              <input id="seat-12" class="seat-select" type="checkbox" value="12:00PM" name="time[]"/>
                              <label for="seat-12" class="seat" >12:00PM</label>
                              <input id="seat-13" class="seat-select" type="checkbox" value="14:30PM" name="time[]"/>
                              <label for="seat-13" class="seat" >14:30PM</label>
                              <input id="seat-14" class="seat-select" type="checkbox" value="15:00PM" name="time[]"/>
                              <label for="seat-14" class="seat" >15:00PM</label>
                              <input id="seat-15" class="seat-select" type="checkbox" value="15:30PM" name="time[]"/>
                              <label for="seat-15" class="seat" >15:30PM</label>
                              <br></br><br></br>
                              <input id="seat-16" class="seat-select" type="checkbox" value="16:00PM" name="time[]"/>
                              <label for="seat-16" class="seat" >16:00PM</label>
                              <input id="seat-17" class="seat-select" type="checkbox" value="16:30PM" name="time[]"/>
                              <label for="seat-17" class="seat" >16:30PM</label>
                              <input id="seat-18" class="seat-select" type="checkbox" value="17:00PM" name="time[]"/>
                              <label for="seat-18" class="seat" >17:00PM</label>
                              <input id="seat-19" class="seat-select" type="checkbox" value="17:30PM" name="time[]"/>
                              <label for="seat-19" class="seat" >17:30PM</label>
                              <br></br><br></br>
                              <input id="seat-20" class="seat-select" type="checkbox" value="18:00PM" name="time[]"/>
                              <label for="seat-20" class="seat" >18:00PM</label>
                              <input id="seat-21" class="seat-select" type="checkbox" value="18:30PM" name="time[]"/>
                              <label for="seat-21" class="seat" >18:30PM</label>
                              <input id="seat-22" class="seat-select" type="checkbox" value="20:00PM" name="time[]"/>
                              <label for="seat-22" class="seat" >20:00PM</label>
                              <input id="seat-23" class="seat-select" type="checkbox" value="20:30PM" name="time[]"/>
                              <label for="seat-23" class="seat" >20:30PM</label>
                              <br></br><br></br>
                              
                                </section></div></div>

                    
                    <center>
                    <div class="form-group row " style="margin-left:325px; margin-right: -10px; margin-top: 50px; margin-bottom: 50px; ">
                        <input class="btn btn-primary" type="submit" value="Submit"> &ensp;&ensp;&ensp;
                        <input class="btn btn-danger " type="reset" value="Reset ">
                    </div>
                </center>
                </div>
            </form>
            
        </div>
                     </div>
                </form>
</div>

 

</script>



</body>
</html>
