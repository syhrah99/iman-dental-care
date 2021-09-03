<?php
session_start();
 //connection to the database
include('./process/connection.php');

$result = $conn->query( "SELECT * from `staff`");
   $staff_id = $_SESSION['staff_id'];

    $member = $conn->query( "SELECT * from `staff` where `staff_id` = '$staff_id'");
    $mem = mysqli_fetch_assoc($member); 

mysqli_close($conn);
?>

<!DOCTYPE html>
<head>
   <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Profile Nurse</title>
    
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
            <?php include('./lib/navNurse.php'); ?>
            </header>

            <!-- <div style="background-color: #1E2021; color: white; border-radius: 30px 30px 0px 0px; width: 85%; margin:0 auto; margin-top: 50px; border-style: solid; margin-bottom: 50px; ">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Patient Name..." title="Type in a name">
                </div> -->
              
            <form action="./process/updateProfileNurse.php" method="POST">
                    <div class="container">
                        <div id="main">
                            <div font colour="white">
                              <h2>Profile Nurse</h2>
                            </div>

                             
                                 <label for="staff_id"><b>Staff ID</b></label>
                                 <div class="input-container">
                                <i class="fa fa-id-card icon-new"></i>
                                <input class="form-control" type="text" name="staff_id" placeholder="staff_id" value="<?php echo $mem['staff_id']; ?>"  style="width: 650px;" readonly >
                              </div>
                           

                              <label for="staff_name"><b>Full Name</b></label>
                              <div class="input-container">
                                <i class="fa fa-user icon-new"></i>
                                <input class="form-control" type="text" name="staff_name"  value="<?php echo $mem['staff_name']; ?>" style="width: 650px;" > 
                              </div>

                            <label for="staff_address"><b>Address</b></label>
                              <div class="input-container">
                                <i class="fa fa-address-book icon-new"></i>
                               <input class="form-control" type="text" name="staff_address"value="<?php echo $mem['staff_address']; ?>"  style="width: 650px;" >
                              </div>

                              <label for="staff_age"><b>Age</b></label>
                              <div class="input-container">
                                <i class="fa fa-users icon-new"></i>
                                <input class="form-control" type="number" name="staff_age"  value="<?php echo $mem['staff_age']; ?>"  style="width: 650px;">
                              </div>

                              <label for="staff_gender"><b>Gender</b></label>
                              <div class="input-container">
                                <i class="fa fa-venus-mars icon-new"></i>
                                <select class="form-control" id="staff_gender" name="staff_gender" value="<?php echo $mem['staff_gender']; ?>"  style="width: 650px;">
                                  <option selected value="M">Male</option>
                                   <option value="F">Female</option>
                                  </select>
                              </div>

                              <label for="staff_phonenum"><b>Phone Number</b></label>
                              <div class="input-container">
                                <i class="fa fa-mobile icon-new"></i>
                                <input class="form-control" type="number" name="staff_phonenum" value="<?php echo $mem['staff_phonenum']; ?>"  style="width: 650px;" >
                              </div>

                              <label for="role"><b>Role</b></label>
                              <div class="input-container">
                                <i class="fa fa-users icon-new"></i>
                                <input class="form-control" type="text" name="role"  value="<?php echo $mem['role']; ?>"  style="width: 650px;">
                              </div>

                              <label for="time"><b>Password</b></label>
                              <div class="input-container">
                                <i class="fa fa-key icon-new"></i>
                                <input class="form-control" type="text" name="s_password"  value="<?php echo $mem['s_password']; ?>"  style="width: 650px;" readonly>
                              </div>
                              
                                    <div class="form-group row " style="margin-left:370px; margin-right: -10px; margin-bottom: 50px; ">
                                        <button>
                                           <input class="btn btn-primary" type="submit" name="submit" value ="submit">
                                        </button>
                                    </div>
                                
                        </div>
                    </div>
                
            </form>
</div>
                
          
        
</body>
</html>