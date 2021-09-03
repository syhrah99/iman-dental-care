<?php
   //check for valid user 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Payment</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
   
	
<style>

.error {color: #FF0000;}

</style>
</head>

<body background="./img/background.jpg" style="background-repeat: no-repeat; background-attachment: fixed;height: 100%;">
<div id="container">
    <div id="main">
             <header>
                <?php include('./lib/navNurse.php'); ?>
            </header>

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
			
			 input[type=number], select, textarea {
			  width: 60%;
			  padding: 12px;
			  border: 1px solid #ccc;
			  border-radius: 4px;
			  resize: vertical;
			  color: black;
			}
			
			
			input[type=date], select, textarea {
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

			input[type=button] {
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

			.col-25 {
			  float: left;
			  width: 25%;
			  margin-top: 6px;
			}

			.col-75 {
			  float: left;
			  width: 60%;
			  margin-top: 6px;
			}
			
			.col-65 {
			  float: left;
			  width: 55%;
			  margin-top: 6px;
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
				width: 60%;
				margin-top: 0;
			  }
			}
            </style>

          	<<div style="width: 900px; background-color: #1E2021; color: white; border-radius: 30px 30px 30px 30px; margin:0 auto; margin-top: 80px; border-style: solid; margin-bottom: 10px; ">
            <div style="margin-bottom:20px; margin-top: 10px; "> 
			
			 <div style=" text-align:center; color: white; padding: 20px 0px 20px 0px; margin: 0 auto; border-radius: 15px 15px 15px 15px; margin-bottom: 20px; margin-top: 20px;">
				<p style = "font-family:ingrained;font-size:55px;font-style:bold;color:white;">
					Payment
				</p>
			<?php
				include('./process/connection.php');

				$invoice_id=$_POST["invoice_id"];
				$patient_ic=$_POST["patient_ic"];
				$debt_amount= $_POST["debt_amount"];
				
			
				
			?>
				  <!-- <div class="container"> -->
				  <form action="" method = "POST">
				  <div class="row">
					<div class="col-25">
					  <label for="invoice_ID">Invoice ID</label>
					</div>
					<div class="col-75">
					  <input type="text" id="invoice_id" value="<?php echo $invoice_id; ?>" name="invoice_id" placeholder="<?php echo $invoice_id; ?>" readonly>
					</div>
				  </div>
				 
				  <div class="row">
					<div class="col-25">
					  <label for="Patient_ic">Patient IC</label>
					</div>
					<div class="col-75">
					  <input type="text" id="patient_ic" value="<?php echo $patient_ic; ?>" name="patient_ic" placeholder="<?php echo $patient_ic; ?>" readonly>
					</div>
				  </div>
				  
				  <div class="row">
					<div class="col-25">
					  <label for="payment_date">Payment Date</label>
					</div>
					<div class="col-75">
					  <input type="date" id="payment_date" name="payment_date"  placeholder="<?php echo date('m-d-Y'); ?>" required>
					</div>
				  </div>
				  
				  	  <div class="row">
					<div class="col-25">
					  <label for="pay">Payment amount</label>
					</div>
					<div class="col-75">

					  <input type="number" id="payment_amount" name="payment_amount" max="<?php echo $debt_amount; ?>" pattern="^\d+(?:\.\d{1,2})?$" placeholder = "0.00" step="0.01" required>
					</div>
				  </div>
				  
				   <div class="row">
					<div class="col-25">
					  <label for="debt_amount">Total debt</label>
					</div>
					
					<div class="col-25">
					 <input type="hidden" id="debt_amount" value="<?php echo $debt_amount; ?>" name="debt_amount" >
					
					_______________________________________________________________________
					 RM <?php echo $debt_amount ?>
					_______________________________________________________________________
					
					</div>
				  </div>
				
				  
				  <div class="row">
					<div class="col-65">
						<input type="submit" value="submit" name="submit">
					</div>
				  </div>
				  </form>
				<!-- </div> -->
           
					<?php
					
							if(isset($_POST['submit'])){
								
										$numchars = rand(6,6); 
									  //This is the list from which id is generated.
									  $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
									  $random=''; 
									  //Do a random generation in a for loop
									  for($i=0; $i<$numchars;$i++)  { 
											$random.=$chars[rand(0,count($chars)-1)];  
										}

										function generateRandomString($length = 1) {
											$characters = 'Y';
											$charactersLength = strlen($characters);
											$randomString = '';
											for ($i = 0; $i < $length; $i++) {
												$randomString .= $characters[rand(0, $charactersLength - 1)];
											}
											return $randomString;
									  }
									
															$numchars = rand(6,6); 
									  //This is the list from which id is generated.
									  $chars =   explode(',','0,1,2,3,4,5,6,7,8,9'); 
									  $random=''; 
									  //Do a random generation in a for loop
									  for($i=0; $i<$numchars;$i++)  { 
											$random.=$chars[rand(0,count($chars)-1)];  
										}

										function generateRandomString2($length = 1) {
											$characters = 'R';
											$charactersLength = strlen($characters);
											$randomString = '';
											for ($i = 0; $i < $length; $i++) {
												$randomString .= $characters[rand(0, $charactersLength - 1)];
											}
											return $randomString;
									  }
									  
									  
									$payment_id = generateRandomString().$random;	
									$payment_receipt = generateRandomString2().$random;
								
									$payment_amount=$_POST['payment_amount'];
									$date = $_POST['payment_date'];
									$payment_status;
									
									$sql="select * from invoice where invoice_id ='$invoice_id'";
									$res=$conn->query($sql);	
											
										while($row = $res->fetch_assoc()) {
											
							
												$stmt = $conn->prepare($sql2="UPDATE invoice SET debt_amount = debt_amount-'$payment_amount'
																					WHERE  invoice_id = '$invoice_id'");
												$stmt->execute();
													
													$sql3="select * from invoice where invoice_id ='$invoice_id'";
													$res3=$conn->query($sql3);	
													
														while($row3= $res3->fetch_assoc()) {
															if($row3["debt_amount"] <= 0){
																$stmt4 = $conn->prepare($sql4="UPDATE invoice SET bill_status ='paid'
																					WHERE  invoice_id = '$invoice_id'");
																$stmt4->execute();
															}
														}
														
														
														$sql6="select * from invoice where invoice_id ='$invoice_id'";
														$res6=$conn->query($sql6);
														
														while($row6= $res6->fetch_assoc()) {
															$payment_status = $row6['bill_status'];
														}
														
														
														$stmt5 = $conn->prepare($sql5="INSERT into payment(payment_id,payment_receipt,nric,invoice_id,payment_date,payment_status,payment_amount)VALUES
																('$payment_id','$payment_receipt','$patient_ic','$invoice_id','$date','$payment_status',$payment_amount)");
														$stmt5->execute(); 
														
														echo "<script type='text/javascript'>alert('Payment successful')</script>";
														print '<script>window.location.assign("../ImanDC2/listPatient.php");</script>';
														
														?>
															<script type="text/javascript">
															window.history.go(-2);
															</script>
														<?php
												
								
										}
							}
					mysqli_close($conn);
					?>
            </div>
            </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            
    </div>
	</div>
</div>
</div>
</body>
</html>