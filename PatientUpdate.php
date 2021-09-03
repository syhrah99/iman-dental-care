<?php

session_start();
  
  if(isset($_SESSION["nric"])){
      $user = $_SESSION["nric"];
  }else{
    // header('Location: Index.php');
  }
   include "./process/connection.php";

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
              <?php

               $result = $conn->query( "SELECT * from `patient`");
               $nric = $_SESSION['nric'];

                $sql = mysqli_query($conn, "SELECT * FROM patient WHERE nric = '$nric'");
                $row = mysqli_fetch_array($sql);
              ?>
            <form action="./process/updateProfilePatient.php" method="POST">
                    <div class="container">
                        <div id="main">
                            <div font colour="white">
                              <h2>Profile Patient</h2>
                            </div>

                             
                              <label for="week"><b>IC Number</b></label>
                              <div class="input-container">
                                <i class="fa fa-id-card icon-new"></i>
                                
                            <input class="form-control" type="text" name="nric" placeholder="nric" value="<?php echo $row['nric']; ?>" style="width: 650px;"  >
                              </div>

                              <label for="date"><b>Full Name</b></label>
                              <div class="input-container">
                                <i class="fa fa-user icon-new"></i>
                                <input class="form-control" type="text" name="p_name"  value="<?php echo $row['p_name']; ?>" style="width: 650px;" >
                              </div>

                            <label for="time"><b>Address</b></label>
                              <div class="input-container">
                                <i class="fa fa-address-book icon-new"></i>
                               <input class="form-control" type="text" name="p_address"value="<?php echo $row['p_address']; ?>" style="width: 650px;" >
                              </div>

                              <label for="time"><b>Email</b></label>
                              <div class="input-container">
                                <i class="fa fa-users icon-new"></i>
                               <input class="form-control" type="text" name="p_email" value="<?php echo$row['p_email']; ?>" style="width: 650px;" >
                              </div>

                              <label for="time"><b>Age</b></label>
                              <div class="input-container">
                                <i class="fa fa-venus-mars icon-new"></i>
                                <input class="form-control" type="text" name="p_age"  value="<?php echo $row['p_age']; ?>" style="width: 650px;" >
                              </div>

                              <label for="time"><b>Gender</b></label>
                              <div class="input-container">
                                <i class="fa fa-mobile icon-new"></i>
                               
                                <select class="form-control" id="p_gender" name="p_gender" value="<?php echo $row['p_gender']; ?>"  style="width: 650px;">
                                  <option selected value="M">Male</option>
                                   <option value="F">Female</option>
                                  </select>
                              </div>

                              <label for="time"><b>Phone Number</b></label>
                              <div class="input-container">
                                <i class="fa fa-users icon-new"></i>
                                <input class="form-control" type="text" name="p_phonenum" value="<?php echo $row['p_phonenum']; ?>" style="width: 650px;">
                              </div>

                              <label for="time"><b>Marital Status</b></label>
                              <div class="input-container">
                                <i class="fa fa-key icon-new"></i>
                                <select class="form-control" id="p_status" name="p_status" value="<?php echo $row['p_status']; ?>"  style="width: 650px;">
                                  <option selected value="Single">Single</option>
                                   <option value="Married">Married</option>
                                   <option value="Divorced">Divorced</option>
                                  </select>
                              </div>

                               <label for="time"><b>Password</b></label>
                              <div class="input-container">
                                <i class="fa fa-key icon-new"></i>
                                <input class="form-control" type="text" name="password"  value="<?php echo $row['password']; ?>" style="width: 650px;" >
                              </div>
                              
                                    <div class="form-group row " style="margin-left:120px; margin-right: 500px; margin-bottom: 50px; ">
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