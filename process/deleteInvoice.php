<?php
    //connection to the database
include('connection.php');
	  
	$invoice_id = $_GET['invoice_id'];
    $conn->query("SELECT invoice_id from invoice where invoice_id = '$invoice_id' ");
   
   
    $members = $conn->query("SELECT * from invoice where invoice_id = '$invoice_id' ");
    $mem = mysqli_fetch_assoc($members);


		$sql2="select * from patient where nric = 
								( select nric from appointment where appointment_id = 
										(select appointment_id from treatment where treatment_id =
											(select treatment_id from prescription where prescription_id= 
												(select prescription_id from invoice where invoice_id = '$invoice_id')
											)
										)
								)";
		$res2=$conn->query($sql2);
					
							
			if($row=$res2->fetch_assoc()){
				$search_value = $row["nric"];
			}
									
									
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./css/style.css" rel="stylesheet" />
</head>
<body>
<form method="POST" action="./listPrescriptionCheck.php" role="form">
	        <div class="modal-body">
                            <div class="form-group">
                                <h4 for="confirm">Are you sure want to delete this record ?</h4>
                            </div>
                            <div class="form-group">
                                <label for="invoice_id">Invoice ID</label>
                                <input type="text" class="form-control" id="invoice_id" name="invoice_id" value="<?php echo $mem['invoice_id'];?>" readonly="true" />   
                            </div>

            </div>
                            <div class="modal-footer">
		                    	<input type="submit" class="btn btn-primary" name="submit" value="Yes" />&nbsp;
		                    	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
	                    	</div>
	</form>
</body>
</html>
