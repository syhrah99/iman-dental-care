<?php
   //check for valid user 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	 <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">

<style>

.error {color: #FF0000;}

</style>
</head>

<body>


<div id="container">
    <div id="main">

            <style>
              img {
              display: block;
              margin-left: auto;
              margin-right: auto;
              }
           

            <style>
            h2 {
            font-family:DK Crayon Crumble;
            font-size:28px; color:white;
            margin-top:-50px
            }
		

			  input[type=text], select, textarea {
			  width: 60%;
			  padding: 12px;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  resize: vertical;
			  color: black;
			}

			label {
			  padding: 12px 12px 12px 0;
			  display: inline-block;
			}

			input[type=submit] {
			  background-color: #4CAF50;
			  color: white;
			  padding: 12px 20px;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			  float: right;
			}

			input[type=submit]:hover {
			  background-color: #45a049;
			}

			 /* Add styles to the form container */
			.form-container {
			  max-width: 1000px;
			  padding: 10px;
			  background-color: black;
			} 

			.col-25 {
			  float: left;
			  width: 20%;
			  margin-top: 1px;
			}

			.col-75 {
			  float: left;
			  width: 60%;
			  margin-top: 1px;
			}
			
			.col-65 {
			  float: left;
			  width: 56%;
			  margin-top: 6px;
			  margin-bottom: 10px;
			}

			/* Clear floats after the columns */
			.row:after {
			  content: "";
			  display: table;
			  clear: both
			}
			<!--Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other -->
			@media screen and (max-width: 600px) {
			  .col-25, .col-75, input[type=submit] {
				width: 50%;
				margin-top: 0;
			  }
			}
            </style>

           	<div style="width: 800px; background-color: #1E2021; color: white; border-radius: 30px 30px 30px 30px; margin:0 auto; margin-top: 80px; border-style: solid; margin-bottom: 30px; ">
            <div style="margin-bottom:20px; margin-top: 30px; "> 
			
			 <div style=" text-align:center; color: white; padding: 20px 0px 20px 0px; margin: 0 auto; border-radius: 15px 15px 15px 15px; margin-bottom: 30px; margin-top: 30px;">
				<p style = "font-family:ingrained;font-size:65px;font-style:bold;color:white;">
					
				</p>
			<?php

				$prescriptionID=$_GET['prescription_id'];
				$total_price=0;
							
				include('./process/connection.php');

			?>
							
					<div class="form-container">
				  <form action="./process/addInvoice2.php"  method="POST" >
				  <div class="row">
					<div class="col-25">
					  <label for="prescription_id">prescription ID</label>
					</div>
					<div class="col-75">
					  <input type="text" name="prescription_id"  value="<?php echo $prescriptionID?>" placeholder="<?php echo $prescriptionID?>" readonly>
					</div>
				  </div>
				 
				  <div class="row">
					<div class="col-25">
					  <label for="patient_ic">Patient</label>
					</div>
					<div class="col-75">
						<table class="table" style="text-align:center; color: black;">
							<?php 
							$sql2="select * from patient where nric = 
								( select nric from appointment where appointment_id = 
										(select appointment_id from treatment where treatment_id =
											(select treatment_id from prescription where prescription_id= '$prescriptionID') 
										)
								)";
								
							$res2=$conn->query($sql2);
							echo "<h3>"."<tr><th>ID</th><th>Name";
							
								while($row=$res2->fetch_assoc())
								{
									echo "<tr><td>".$row["nric"]."</td><td>". $row["p_name"]."</td>";
								}
							?>
						</table>
					</div>
				  </div>
				  
				 
				  <div class="row">
					<div class="col-25">
					  <label for="drugs_id">Drugs</label>
					</div>
					<div class="col-75">
						<table class="table" style="text-align:center; color: white;">
							<?php 
							
							echo "<h3>"."<tr><th>ID</th><th>Name</th><th>quantity</th><th>price</th>";
							$sqlD="select * from prescription_detail where prescription_id = '$prescriptionID'";
							$resD=$conn->query($sqlD);
					
							
								while($row=$resD->fetch_assoc()){
									$drugs_id = $row["drugs_id"];
									
									$sql= "select * from drugs where drugs_id = '$drugs_id' ";
									$res=$conn->query($sql);
										
										while($row1=$res->fetch_assoc())
										{
											$total_price=$total_price+ ($row1["price"] * $row["quantity"] );
											echo "<tr><td>".$row1["drugs_id"]."</td><td>". $row1["med_name"]."</td><td>". $row["quantity"]."</td><td>"." RM ".$row1["price"]."</h3>"."</td>";
										}
								}
							
							mysqli_close($conn);
							?>
						</table>
					</div>
				  </div>
				  
				  <div class="row">
					<div class="col-25">
					  <label for="bill_date">Invoice Date</label>
					</div>
					<div class="col-25">
					<?php echo date("m-d-Y") ?>
					</div>
				  </div>
				  
				  	  <div class="row">
					<div class="col-25">
					  <label for="drugs_total_price">Drugs Total Price</label>
					</div>
					
					<div class="col-75">
					_______________________________________________________________________
					   RM <?php echo $total_price ?>
					_______________________________________________________________________
					
					</div>
				  </div>
				  	
						<input type="hidden" name="drugs_total_price"  value=" <?php echo $total_price; ?>">
				  
				  <div class="row">
					<div class="col-75">
						<input type="submit" value="Confirm" name = "Confirm" >
					</div>
				  </div>
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </form>
				</div>
		
		   
			</div>
           </div>

            
    </div>
	</div>
</div>
</div>


</body>
</html>