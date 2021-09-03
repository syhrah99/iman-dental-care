<?php
    //check for valid user
    SESSION_START();
    if(isset($_SESSION['nric'])){
    }
    else {
        echo "<script type='text/javascript'>alert('Unverified user. Please login first !!')</script>";
        print '<script>window.location.assign("./indexPatient.php");</script>';
    }
?>

<!DOCTYPE html>
<head>
   <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Appointment</title>
    
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
          width: 50%;
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
          width: 50%;
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
            <?php include('./lib/navPatient.php'); ?>
            </header>

            <!-- <div style="background-color: #1E2021; color: white; border-radius: 30px 30px 0px 0px; width: 85%; margin:0 auto; margin-top: 50px; border-style: solid; margin-bottom: 50px; ">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Patient Name..." title="Type in a name">
                </div> -->
            <form action="./process/addAppointment.php" method="POST">
                    <div class="container">
                        <div id="main">
                            <div font colour="white">
                              <h2>Patient Appointment</h2>
                            </div>


                              <label for="week"><b>Doctor</b></label>
                              <div class="input-container">
                                <i class="fa fa-user icon-new"></i>
                                <select name="fdoctor" class="form-control" style="width: 650px;" required>
                                    <?php
                                    include('./process/connection.php');
                                    $resultSet = $conn->query("SELECT staff_id,staff_name FROM staff WHERE role = 'Doctor'");

                                    while($rows = $resultSet->fetch_assoc())
                                    {
                                        $staff_id = $rows['staff_id'];
                                        $staff_name = $rows['staff_name'];
                                        echo "<option value='$staff_id'>$staff_name</option>";
                                    }
                                    mysqli_close($conn);

                                    ?>
                                    </select>
                              </div>

                              <label for="date"><b>Date</b></label>
                              <div class="input-container">
                                <i class="fa fa-calendar icon-new"></i>
                                <input class="col-sm-4 col-form-label " type="date" name="date" min="<?php $date = strtotime("+4 day");
                                    echo date('Y-m-d', $date); ?>" style="width: 650px;" required>
                              </div>

                            <label for="time"><b>Time</b></label>
                              <div class="input-container">
                                 <i class="fa fa-clock-o icon-new"></i>
                                <select id="ftime" name="ftime" class="form-control" style="width: 650px;" required>
                                        <option selected value="10:00AM">10:00 AM</option>
                                        <option value="10:30AM">10:30 AM</option>
                                        <option value="11:00AM">11:00 AM</option>
                                        <option value="11:30AM">11:30 AM</option>
                                        <option value="12:00PM">12:00 PM</option>
                                        <option value="12:30PM">12:30 PM</option>
                                        <option value="14:30PM">14:30 PM</option>
                                        <option value="15:00PM">15:00 PM</option>
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

                              <label for="time"><b>Reason</b></label>
                              <div class="input-container">
                                 <i class="fa fa-address-book icon-new"></i>
                                <input type="text " class="form-control " name="description" id="description" placeholder="Eg; Toothache... " style="width: 650px;" required>
                              </div>

                            
                              
                              
                                    <div class="form-group row " style="margin-left:120px; margin-right: 500px; margin-bottom: 20px; ">
                                    <input class="btn btn-primary" type="submit" value="Submit"> &ensp;&ensp;&ensp;
                                    <input class="btn btn-danger " type="reset" value="Reset ">
                                    </div>
                                
                        </div>
                    </div>
                
            </form>
</div>
                
         

    </body>
</html>