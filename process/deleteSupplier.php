<?php
    //connection to the database
 include('connection.php');

   $conn->query("SELECT * from supplier");
   $supplier_id = $_GET['supplier_id'];

   if(isset($_POST['submit'])){
        $supplier_id = $_POST['supplier_id'];
        $supplier_name = $_POST['supplier_name'];
        
        
            
        $sql= "Select * from supplier where supplier_id = '$supplier_id'";
        $res=$conn->query($sql);
        while($row=$res->fetch_assoc()){
             $conn->query("INSERT INTO archive_supplier VALUES ('".$row["supplier_id"]."','".$row["staff_id"]."','".$row["supplier_name"]."','".$row["supplier_number"]."','".$row["supplier_address"]."','".$row["register"]."')");
        }
        
        $conn->query("DELETE FROM `supplier_supply`  WHERE `supplier_id`='$supplier_id';"); 
        $conn->query("DELETE FROM `supplier`  WHERE `supplier_id`='$supplier_id';"); 
    
    
        header("location:../listSupplier.php");
   } 
    $members = $conn->query("SELECT * from supplier WHERE `supplier_id`='$supplier_id';");
    $mem = mysqli_fetch_assoc($members);

mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./css/style.css" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<form method="POST" action="./process/deleteSupplier.php" role="form">
            <div class="modal-body">
                            <div class="form-group">
                                <h4 for="confirm">Are you sure want to delete this record ?</h4>
                            </div>

                            <input hidden type="text" class="form-control" id="supplier_id" name="supplier_id" value="<?php echo $mem['supplier_id'];?>" readonly="true" />

                            <div class="form-group">
                                <label for="supplier_name">Supplier name</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name" value="<?php echo $mem['supplier_name'];?>" readonly="true" />   
                            </div>

            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="submit" value="Yes" />&nbsp;
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
    </form>
</body>
</html>

