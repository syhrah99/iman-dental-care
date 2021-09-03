<?php
session_start();
 //connection to the database
 include('connection.php');

$result = $conn->query( "SELECT * from supplier ");
   $supplier_id = $_GET['supplier_id'];

if (isset($_POST['submit'])) {
	$supplier_id = $_POST['supplier_id'];
    $supplier_name = $_POST['supplier_name'];
	$supplier_number = $_POST['supplier_number'];
    $supplier_address = $_POST['supplier_address'];
    $register = $_POST['register'];


       $conn->query("UPDATE `supplier` SET `supplier_name` = '$supplier_name', `supplier_number` = '$supplier_number', `supplier_address` = '$supplier_address', `register` = '$register' WHERE supplier_id = '$supplier_id'");
       
       header("location:../listSupplier.php");
    }

    $member = $conn->query( "SELECT * from supplier  WHERE `supplier_id`='$supplier_id'");
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
<form method="POST" action="./process/updateSupplier.php" role="form">
	        <div class="modal-body">
                    <div class="form-group">
                        <input hidden type="text" class="form-control" id="supplier_id" name="supplier_id" value="<?php echo $mem['supplier_id'];?>" readonly="true" >
                    </div>

                    <div class="form-group">
                        <label for="supplier_name">Supplier Name</label>
                        <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="<?php echo $mem['supplier_name'];?>" />
                    </div>

                    <div class="form-group">
                        <label for="supplier_number">Supplier number</label>
                        <input type="text" class="form-control" id="supplier_number" name="supplier_number" value="<?php echo $mem['supplier_number'];?>" />
                    </div>

                    <div class="form-group">
                        <label for="expiry date">Address</label>
                        <input type="text" class="form-control" id="supplier_address" name="supplier_address" value="<?php echo $mem['supplier_address'];?>" />
                    </div>

                    <div class="form-group">
                        <label for="register">register</label>
                        <input type="text" class="form-control" id="register" name="register" value="<?php echo $mem['register'];?>" readonly>
                    </div>

                    <div class="modal-footer">
		                <input type="submit" class="btn btn-primary" name="submit" value="Update" />&nbsp;
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                </div>
            </div>
	</form>
</body>
</html>
