<?php
    //connection to the database
 include('connection.php');

   $conn->query("SELECT * from drugs");
   $drugs_id = $_GET['drugs_id'];

   if(isset($_POST['submit'])){
        $drugs_id = $_POST['drugs_id'];
        $med_name = $_POST['med_name'];
        
        
            
        $sql= "Select * from drugs where drugs_id = '$drugs_id'";
        $res=$conn->query($sql);
        while($row=$res->fetch_assoc()){
             $conn->query("INSERT INTO archive_drugs VALUES ('".$row["drugs_id"]."','".$row["staff_id"]."','".$row["med_name"]."','".$row["quantity"]."','".$row["expiry_date"]."','".$row["price"]."')");
        }
        
        $conn->query("DELETE FROM `drugs_supply`  WHERE `drugs_id`='$drugs_id';"); 
        $conn->query("DELETE FROM `drugs`  WHERE `drugs_id`='$drugs_id';"); 
    
    
        header("location:../listDrugs.php");
   } 
    $members = $conn->query("SELECT * from drugs WHERE `drugs_id`='$drugs_id';");
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
<form method="POST" action="./process/deleteDrugs.php" role="form">
            <div class="modal-body">
                            <div class="form-group">
                                <h4 for="confirm">Are you sure want to delete this record ?</h4>
                            </div>

                            <input hidden type="text" class="form-control" id="drugs_id" name="drugs_id" value="<?php echo $mem['drugs_id'];?>" readonly="true" />

                            <div class="form-group">
                                <label for="med_name">Drugs name</label>
                                <input type="text" class="form-control" id="med_name" name="med_name" value="<?php echo $mem['med_name'];?>" readonly="true" />   
                            </div>

            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="submit" value="Yes" />&nbsp;
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
    </form>
</body>
</html>

