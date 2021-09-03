<?php

session_start();
if(isset($_SESSION['nric'])){
    }
    else {
        echo "<script type='text/javascript'>alert('Unverified user. Please login first !!')</script>";
        print '<script>window.location.assign("./indexPatient.php");</script>';
    }

include('./process/connection.php'); 

$result = $conn->query( "SELECT * from `treatment`");

    $sql= "SELECT * FROM patient WHERE nric = ".$_SESSION['nric']." limit 1 ";
    $result = $conn->query($sql);
    echo "</center>";

      while($row= $result->fetch_assoc()) {
        $nric = $row['nric'];
        $fullname =  $row['p_name'];
        $phonenum =  $row['p_phonenum'];
        $address =  $row['p_address'];
        $status =  $row['p_status'];
        $email =  $row['p_email'];
        $gender =  $row['p_gender'];
        $age =  $row['p_age'];
        $password =  $row['password'];
      }
mysqli_close($conn);
?>

<!DOCTYPE html>
<head>
   <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Profile Patient</title>
    
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
          /*padding: 15px 20px;*/
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
            <form action="./PatientUpdate.php" method="POST">
                    <div class="container">
                        <div id="main">
                            <div font colour="white">
                              <h2>Profile Patient</h2>
                            </div>


                              <label for="week"><b>IC Number</b></label>
                              <div class="input-container">
                                <i class="fa fa-id-card icon-new"></i>
                                
                            <input class="form-control" type="text" name="nric" placeholder="nric" value="<?php echo $nric; ?>" style="width: 650px;" readonly >
                              </div>

                              <label for="date"><b>Full Name</b></label>
                              <div class="input-container">
                                <i class="fa fa-user icon-new"></i>
                                <input class="form-control" type="text" name="fullname"  value="<?php echo $fullname; ?>" style="width: 650px;" readonly>
                              </div>

                            <label for="time"><b>Address</b></label>
                              <div class="input-container">
                                <i class="fa fa-address-book icon-new"></i>
                               <input class="form-control" type="text" name="address"value="<?php echo $address; ?>" style="width: 650px;" readonly>
                              </div>

                              <label for="time"><b>Email</b></label>
                              <div class="input-container">
                                <i class="fa fa-users icon-new"></i>
                               <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" style="width: 650px;" readonly>
                              </div>

                              <label for="time"><b>Age</b></label>
                              <div class="input-container">
                                <i class="fa fa-venus-mars icon-new"></i>
                                <input class="form-control" type="text" name="age"  value="<?php echo $age; ?>" style="width: 650px;" readonly>
                              </div>

                              <label for="time"><b>Gender</b></label>
                              <div class="input-container">
                                <i class="fa fa-mobile icon-new"></i>
                                
                                <input class="form-control" type="text" name="gender"  value="<?php echo $gender; ?>" style="width: 650px;" readonly>
                              </div>

                              <label for="time"><b>Phone Number</b></label>
                              <div class="input-container">
                                <i class="fa fa-users icon-new"></i>
                                <input class="form-control" type="text" name="phonenum" value="<?php echo $phonenum; ?>" style="width: 650px;">
                              </div>

                              <label for="time"><b>Marital Status</b></label>
                              <div class="input-container">
                                <i class="fa fa-key icon-new"></i>
                                <input class="form-control" type="text" name="status"  value="<?php echo $status; ?>" style="width: 650px;" readonly>
                              </div>

                               <label for="time"><b>Password</b></label>
                              <div class="input-container">
                                <i class="fa fa-key icon-new"></i>
                                <input class="form-control" type="text" name="password"  value="<?php echo $password; ?>" style="width: 650px;" readonly>
                              </div>
                              
                              
                                    <div class="form-group row " style="margin-left:120px; margin-right: 500px; margin-bottom: 20px; ">
                                        <button>
                                           <input class="btn btn-primary" type="submit" value ="Update">
                                        </button>
                                    </div>
                                
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

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript --> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>