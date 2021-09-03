<?php
session_start();
 //connection to the database
 include('connection.php');

$result = $conn->query( "SELECT * from drugs ");
   $drugs_id = $_GET['drugs_id'];

if (isset($_POST['submit'])) {
	$drugs_id = $_POST['drugs_id'];
    $med_name = $_POST['med_name'];
	$quantity = $_POST['quantity'];
    $expiry_date = $_POST['expiry_date'];
    $price = $_POST['price'];


       $conn->query("UPDATE `drugs` SET `med_name` = '$med_name', `quantity` = '$quantity', `expiry_date` = '$expiry_date', `price` = '$price' WHERE drugs_id = '$drugs_id'");
       
       header("location:../listDrugs.php");
    }

    $member = $conn->query( "SELECT * from drugs  WHERE `drugs_id`='$drugs_id'");
    $mem = mysqli_fetch_assoc($member); 

mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<form method="POST" action="./process/updateDrugs.php" role="form">
	        <div class="modal-body">
                    <div class="form-group">
                        <input hidden type="text" class="form-control" id="drugs_id" name="drugs_id" value="<?php echo $mem['drugs_id'];?>" readonly="true" />
                    </div>

                    <div class="form-group">
                        <label for="med_name">Drug Name</label>
                        <input type="text" class="form-control" id="med_name" name="med_name" value="<?php echo $mem['med_name'];?>" />
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $mem['quantity'];?>" />
                    </div>

                    <div class="form-group">
                        <label for="expiry date">Expiry Date</label>
                        <input type="date" name="expiry_date" value="<?php echo $mem['expiry_date'];?>" min="<?php $date = strtotime("+4 day"); echo date('Y-m-d', $date); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $mem['price'];?>" />
                    </div>

                    <div class="modal-footer">
		                <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                </div>
            </div>
	</form>
</body>
</html>
