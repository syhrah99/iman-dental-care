<?php
   //check for valid user 
session_start();
?>
<!DOCTYPE html>
<head>
   <link rel="icon" href="img/dentist.png" type="image/gif" sizes="16x16">
    <title>Schedule</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->  
    

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}

        .input-container {
          display: -ms-flexbox; /* IE10 */
          display: flex;
          width: 100%;
          margin-bottom: 15px;
        }

        .icon-new {
          padding: 10px;
          background-color: #35455D;
          color: white;
          min-width: 50px;
          text-align: center;
        }

        .input-field {
          width: 100%;
          padding: 10px;
          outline: none;
        }

        .input-field:focus {
          border: 2px solid dodgerblue;
        }

        /* Set a style for the submit button */
        .btn {
          background-color: #33ab5c;
          color: white;
          padding: 15px 20px;
          border: none;
          cursor: pointer;
          width: 100%;
          opacity: 0.9;
          display:inline-block;
          margin-right:5px;
        }

        .btn:hover {
          opacity: 1;
        }
</style>
<!--===============================================================================================-->
</head>

<body>



<div class="limiter">
        <header>
            <?php include('./lib/navDoctor.php'); ?>
            </header>

            <!-- <div style="background-color: #1E2021; color: white; border-radius: 30px 30px 0px 0px; width: 85%; margin:0 auto; margin-top: 50px; border-style: solid; margin-bottom: 50px; ">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Patient Name..." title="Type in a name">
                </div> -->
            <form action="./process/addSchedule.php" method="POST">
                    <div class="container">
                        <div id="main">
                            <div font colour="white">
                              <h2>Add Dentist Schedule</h2>
                            </div>

                              <label for="week"><b>Week</b></label>
                              <div class="input-container">
                                <i class="fa fa-calendar icon-new"></i>
                                <input class="input-field" type="week" placeholder="week" name="week" style="width: 650px;">
                              </div>

                              <label for="date"><b>Available Date</b></label>
                              <div class="input-container">
                                <i class="fa fa-calendar icon-new"></i>
                                <input class="input-field" type="date" placeholder="day" name="day" style="width: 650px;">
                              </div>

                            <label for="time"><b>Available Time</b></label>
                              <div class="input-container">
                                <i class="fa fa-clock-o icon-new"></i>
                                <input class="input-field" type="time" placeholder="time" name="time" style="width: 650px;">
                              </div>
                              
                              

                              <center>
                                        <div class="form-group row " style="margin-left:120px; margin-right: 500px; margin-bottom: 20px; ">
                                        <input class="btn btn-primary" type="submit" value="Submit"> &ensp;&ensp;&ensp;
                                        <input class="btn btn-danger " type="reset" value="Reset ">
                                        </div>
                                </center>
                        </div>
                    </div>
                
            </form>
</div>
                
            <!-- </div>
        </div> -->


        <script>
            $('#datetimepicker1').datepicker({
                startDate: date,
                format: "yyyy-mm-dd",
                autoclose: true
            });
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    </body>
</html>