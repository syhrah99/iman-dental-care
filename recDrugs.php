<?php
session_start();
 //connection to the database
include('./process/connection.php'); 

    $presid = $_GET['prescription_id'];
    $member = $conn->query( "SELECT * from `prescription` where `prescription_id` = '$presid'");
    $mem = mysqli_fetch_assoc($member); 

?>
<!DOCTYPE html>
<head>
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./css/style.css" rel="stylesheet" /> -->
     <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<form method="POST" action="./process/addrecDrugs.php" role="form">
          <div class="modal-body">
                    <div class="form-group">
                        <label for="prescription_id">Prescription ID</label>
                        <input type="text" class="form-control" id="prescription_id" name="prescription_id" value="<?php echo $mem['prescription_id'];?>" readonly="true" />
                    </div>

                    <div class="form-group">
                        <label for="inputName ">Suggested Drugs </label>
                        <div class="col-sm-12" style="width: 180px;">
                        <select name="drugs_id" class="form-control" required>
                        <?php
                        include('./process/connection.php');
                        $resultSet = $conn->query("SELECT drugs_id,med_name FROM drugs WHERE quantity != '0'");

                        while($rows = $resultSet->fetch_assoc())
                        {
                            $drugs_id = $rows['drugs_id'];
                            $med_name = $rows['med_name'];
                            echo "<option value='$drugs_id'>$med_name</option>";
                        }
                        ?>
                    </select>
                    </div>
                </div>

                        
                             

                            <div class="form-group">
                        <label for="prescribe">Quantity</label>
                        <input type="number" class="form-control" placeholder="Quantity" name="quantity"  min="1" required>
                    </div>  
                       
                       <div class="form-group">
                        <label for="prescribe">Prescribe</label>
                        <input type="text" class="form-control" id="prescribe" placeholder="Prescribe" name="prescribe" />
                    </div>     

                   

                    <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="submit" />&nbsp;
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
            </div>
  </form>
<label for="reminder">To add more drugs,SUBMIT and make another request</label>
</body>
</html>