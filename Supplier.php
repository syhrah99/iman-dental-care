<?php
    //check for valid user
    SESSION_START();
    if(isset($_SESSION['staff_id'])){
    }
    else {
        echo "<script type='text/javascript'>alert('Unverified user. Please login first !!')</script>";
        print '<script>window.location.assign("./indexStaff.php");</script>';
    }
    
?>
<!DOCTYPE html>
<head>
   <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Supplier</title>
    
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
            <form action="./process/addSupplier.php" method="POST">
                    <div class="container">
                        <div id="main">
                            <div font colour="white">
                              <h2>Supplier</h2>
                            </div>


                              <label for="week"><b>Supplier Name</b></label>
                              <div class="input-container">
                                <i class="fa fa-user icon-new"></i>
                                <input type="text " class="form-control " name="supplier_name" id="supplier_name" placeholder="Supplier Name" style="width: 650px;" required>
                              </div>

                              <label for="date"><b>Phone Number</b></label>
                              <div class="input-container">
                                <i class="fa fa-phone icon-new"></i>
                                <input type="number" class="form-control " name="supplier_number" id="supplier_number" placeholder="Phone Number" style="width: 650px;" required>
                              </div>

                            <label for="time"><b>Address</b></label>
                              <div class="input-container">
                                 <i class="fa fa-address-book icon-new"></i>
                                <input type="text " class="form-control " name="supplier_address" id="supplier_address" placeholder="Address" style="width: 650px;" required>
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