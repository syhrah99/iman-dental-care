<?php
   //check for valid user 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	
	
<style>

.error {color: #FF0000;}

</style>
</head>

<body>


<div id="container">
    <div id="main">
            <style>
            h2 {
            font-family:DK Crayon Crumble;
            font-size:28px; color:white;
            margin-top:-50px
            }
		
			/* Add styles to the form container */
			.form-container {
			  max-width: 1000px;
			  padding: 10px;
			  background-color: black;
			} 

			  input[type=text], select, textarea {
			  width: 40%;
			  padding: 10px;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  resize: vertical;
			}

			label {
			  padding: 1px 1px 1px 0;
			  display: inline-block;
			}

			input[type=submit] {
			  background-color: #4CAF50;
			  color: white;
			  padding: 5px 10px;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			  float: right;
			}

			input[type=submit]:hover {
			  background-color: #45a049;
			}

			.col-25 {
			  float: left;
			  width: 20%;
			  margin-top: 2px;
			}

			.col-75 {
			  float: left;
			  width: 60%;
			  margin-top: 1px;
			}
			
			.col-85 {
			  float: left;
			  width: 99%;
			  margin-top: 1px;
			}
			
			.col-65 {
			  float: center;
			  width: 65%;
			  margin-top: 1px;
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

            <div style="width: 800px; background-color: #1E2021; color: white; border-radius: 30px 30px 30px 30px; margin:0 auto; margin-top: 80px; border-style: solid; margin-bottom: 20px; ">
            <div style="margin-bottom:20px; margin-top: 30px; "> 
			
			 <div style=" text-align:center; color: white; padding: 20px 0px 20px 0px; margin: 0 auto; border-radius: 15px 15px 15px 15px; margin-bottom: 30px; margin-top: 30px;">
				<p style = "font-family:ingrained;font-size:65px;font-style:bold;color:white;">
					
				</p>
			<?php

					$prescriptionID;
					$total_price=0;
				
					
					
					include('./process/connection.php');
				
					
					$paymentid=$_GET['payment_id'];
					$sql2="select * from payment where payment_id = '$paymentid'";
				
						$res2=$conn->query($sql2);
						if ($res2->num_rows > 0) {
							
							while($row = $res2->fetch_assoc()) {							

			?>
						
											
								<div class="form-container">
								  <form action="./PaymentReceipt.php"  method="POST">
								  <div class="row">
									<div class="col-25">
									  <label for="payment_id">payment ID</label>
									</div>
									<div class="col-25">
									  <?php echo $row["payment_id"];?>
									</div>
								  </div>
								  
								  <div class="row">
									<div class="col-25">
									  <label for="payment_receipt">Receipt No</label>
									</div>
									<div class="col-25">
									  <?php echo $row["payment_receipt"];?>
									</div>
								  </div>
								 
								  <div class="row">
									<div class="col-25">
									  <label for="drugs_id">Patient IC</label>
									</div>
									<div class="col-25">
										<table class="table" style="text-align:center; color: white;">
											<?php 
											
											$sql3="select * from patient where 	nric = '". $row['nric']. "' ";
											$res3=$conn->query($sql3);
											
												while($row2=$res3->fetch_assoc())
												{
													echo $row2["nric"];
													?>
														</table>
															</div>
														  </div>
														  
														   <div class="row">
															<div class="col-25">
															  <label for="drugs_id">Patient Name</label>
															</div>
															<div class="col-25">
														<table class="table" style="text-align:center; color: white;">
													<?php 
														
														echo $row2["p_name"];
															
													?>
														</table>
															</div>
														  </div>
														  
													<?php
												
												}
											
											?>
										
								  <div class="row">
									<div class="col-25">
									  <label for="drugs_id">Drugs</label>
									</div>
									<div class="col-75">
										<table class="table" style="text-align:center; color: white;">
											<?php 
											
											$drugs = array();
											
											$sql4="select * from invoice where invoice_id = '". $row['invoice_id']."' ";
											$res4=$conn->query($sql4);
											
												while($row4=$res4->fetch_assoc())
												{
													$sql8="select * from treatment where treatment_id IN 
															(select treatment_id from prescription where prescription_id = '". $row4['prescription_id']."')";
													$res8=$conn->query($sql8);
													
													while($row8=$res8->fetch_assoc()){
														$staff_id= $row8['staff_id'];
													}
													
													
													$sql5="select * from prescription_detail where prescription_id = '". $row4['prescription_id']."' ";
													$res5=$conn->query($sql5);
											
											
													echo "<h3>"."<tr><th>ID</th><th>Name</th><th>quantity</th><th>price</th>";
													while($row5=$res5->fetch_assoc())
													{
														$sql6= "select * from drugs where drugs_id = '".$row5['drugs_id']."' ";
														$res6=$conn->query($sql6);
														
														while($row6=$res6->fetch_assoc())
														{
															$total_price=$total_price+ ($row6["price"] * $row5["quantity"] );
															echo "<tr><td>".$row6["drugs_id"]."</td><td>". $row6["med_name"]."</td><td>".$row5["quantity"]."</td><td>".$row6["price"]." RM"."</h3>"."</td>";
															
													
														}
														
													}
												}
												
												$sql7="select * from patient where 	nric = '". $row['nric']. "' ";
													$res7=$conn->query($sql7);
											
												$row7=$res7->fetch_assoc();
												
													

													
										
											?>
										</table>
									</div>
								  </div>
								  
									  <div class="row">
									<div class="col-25">
									  <label for="drugs_total_price">Drugs Total Price</label>
									</div>
									
									<div class="col-25">
									  <?php echo $total_price ." RM "?>
									</div>
								  </div>
								  
								    <div class="row">
									<div class="col-25">
									  <label for="payment_date">Payment Date</label>
									</div>
									<div class="col-25">
									<?php echo $row['payment_date']; ?>
									</div>
								  </div>
								  
								    <div class="row">
									<div class="col-25">
									  <label for="payment_amount">Payment amount</label>
									</div>
									
									<div class="col-25">
									________________________________________________________________________
									  <?php echo $row['payment_amount'] ." RM "?>
									________________________________________________________________________
									
									</div>
								  </div>
								  
								   <div class="row">
									<div class="col-25">
									  <label for="payment_status">Payment status</label>
									</div>
									<div class="col-25">
										<?php echo  $row['payment_status']; ?>
									</div>
								  </div>
								  
									  <div class="row">
										<div class="col-65">
											<input type="submit" value="Back" name = "Confirm" >
								</form>	
										 
								<form action="./Print.php"  method="POST">
									 <div class="row">
										<div class="col-65">
											<input type="hidden" value="<?php echo $row['invoice_id'];?>" name = "invoice_id" >
											<input type="hidden" value="<?php echo $row["payment_id"];?>" name = "payment_id" >
											<input type="hidden" value="<?php echo $row7["nric"];?>" name = "nric" >
											<input type="hidden" value="<?php echo $row7["p_name"];?>" name = "p_name" >
											<input type="hidden" value="<?php echo $total_price;?>" name = "total_price" >
											<input type="hidden" value="<?php echo $row['payment_date'];?>" name = "payment_date" >
											<input type="hidden" value="<?php echo $row['payment_amount'];?>" name = "payment_amount" >
											<input type="hidden" value="<?php echo $row['payment_status'];?>" name = "payment_status" >
											<input type="hidden" value="<?php echo $staff_id;?>" name = "staff_id" >
											<input type="hidden" value="<?php echo $row["payment_receipt"];?>" name = "payment_receipt" >
											
											<input type="submit" value="Print" name = "Print" >
										</div>
									</div>
								</form>	
								
								<script type="text/javascript" src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
									<script type="text/javascript">
									$("#print").click(function(){
									 var id = $("#id").val();
									 $.redirect("Print.php",{ id_sales: id ,duplicate:0},'POST','_blank'); 
									})
									</script>
									  
										</div>
									  </div>
								
									  
									  
								</div>
									
								<?php
		
							
							}
							
							
							
						}
						
				mysqli_close($conn);
				
				?>
				
           
			</div>
			</div>

          </div>
          </div>  
    </div>
</div>

<!-- homepage -->

</body>
</html>