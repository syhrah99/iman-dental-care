<?php
	session_start();

?>
<!DOCTYPE html>
<html>
<head>

    <link rel="icon" href="img/dentist.png" type="image/gif" sizes="16x16">
    <title>Invoices</title>
    <!-- <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./css/style.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
                <h4 class="modal-title" style="color: white;" id="memberModalLabel">Delete Invoice</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div>
<!-- End Delete Modal -->

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
			}

			label {
			  padding: 12px 12px 12px 0;
			  display: inline-block;
			}

			input[type=submit] {
			  background-color: #4CAF50;
			  color: white;
			  padding: .375rem .75rem;
			  border: none;
			  border-radius: .25rem;
			  cursor: pointer;
			  float: right;
			  line-height: 1.5;
			}

			input[type=submit]:hover {
			  background-color: #45a049;
			}
			
				input[type=button] {
			  background-color: #B22222;
			  color: white;
			  padding: 2px 15px;
			  border: none;
			  border-radius: 4px;
			  cursor: pointer;
			  float: right;
			}

			input[type=button]:hover {
			  background-color: #8B0000;
			}


			.col-25 {
			  float: left;
			  width: 35%;
			  margin-top: 6px;
			}
			
			.col-65 {
			  float: left;
			  width: 100%;
			  margin-top: 1px;
			}

			.col-75 {
			  float: center;
			  width: 100%;
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
				width: 60%;
				margin-top: 0;
			  }
			}
            </style>
			
           
			
			<div style="width: 900px; background-color: #1E2021; color: white; border-radius: 30px 30px 30px 30px; margin:0 auto; margin-top: 80px; border-style: solid; margin-bottom: 10px; ">
            <div style="margin-bottom:20px; margin-top: 10px; "> 
			
			 <div style=" text-align:center; color: white; padding: 20px 0px 20px 0px; margin: 0 auto; border-radius: 15px 15px 15px 15px; margin-bottom: 20px; margin-top: 20px;">
				<p style = "font-family:ingrained;font-size:55px;font-style:bold;color:white;">
					Invoices
				</p>
	<?php
				
				include('./process/connection.php');
					
	/*			if(isset($_POST['submit'])){
				
				$search_value = $_POST["nric"];
				$invoice_id = $_POST["invoice_id"]; 
				
				$sql1="select * from payment where invoice_id = '$invoice_id'";
				$res1=$conn->query($sql1);
					
							
								if($row=$res1->fetch_assoc()){
									?><p style = "font-family:ingrained;font-size:60px;font-style:bold;color:white;"><?php
									echo "<script type='text/javascript'>alert('Patient has paid, this invoice cannot be deleted!')</script>";
									
								}
								
								else {
										$sql= "Select * from invoice WHERE invoice_id= '$invoice_id'";
										$res=$conn->query($sql);
										
										while($row=$res->fetch_assoc()){
											 $conn->query("INSERT INTO archive_invoice VALUES ('".$row["invoice_id"]."','".$row["prescription_id"]."','".$row["bill_date"]."','".$row["bill_status"]."','".$row["drugs_total_price"]."','".$row["debt_amount"]."') ");

										}
										
										$conn->query("DELETE FROM invoice WHERE invoice_id= '$invoice_id'"); 
										?><p style = "font-family:ingrained;font-size:60px;font-style:bold;color:white;"><?php
										echo "<script type='text/javascript'>alert('Deleted successfully!')</script>";
								}
				
					
				}
				
				else{
					$search_value=$_POST["search"];
				}*/
		
					$search_value=$_POST["search"];
					if(isset($_POST['search']) or isset($_POST['submit'])){
						$sql="select * from patient where nric = '$search_value'";
						$res=$conn->query($sql);
						
							if ($res->num_rows > 0) {
										?>
											<div class="row">
												<div class="col-75">
												  <label>
													<table class="table" style="text-align:center; color: white;" >
													
													

											 <?php
											  
												echo "<tr><th>ID</th><th>Name</th><th>Phone No</th><th>Address</th><th>Status</th><th>Email</th><th>Gender</th><th>Age";
												while($row=$res->fetch_assoc()){
													echo "<tr><td>".$row["nric"]."</td><td>".$row["p_name"]."</td><td>".$row["p_phonenum"]."</td><td>".$row["p_address"].
															"</td><td>".$row["p_status"]."</td><td>".$row["p_email"]."</td><td>".$row["p_gender"]."</td><td>".$row["p_age"];
												 
												}
											 ?>
													</table>
												  </label>
												</div>
											</div>
										<?php
									
								
												$sql2="select * from invoice where prescription_id IN
														( select prescription_id from prescription where treatment_id IN
																(select treatment_id from treatment where appointment_id IN
																		(select appointment_id from appointment where nric = '$search_value')
																)																		
														)";
														
												$res2=$conn->query($sql2);
												if ($res2->num_rows > 0) {
																	?>
																	<div class="row">
																		<div class="col-65">
																		 <label>
																			<table class="table" style="text-align:center; color: white;">
																	<?php	
																	
																	$defaultStatues = 'debt';
																	echo "<tr><th>Invoice ID</th><th> Status</th><th>Total</th><th>Debt</th><th>Action</th><th>";
																	while($row2=$res2->fetch_assoc()){
																		
																			if ($row2["debt_amount"] < 1 ){
																				
																				$row2["debt_amount"] = 0;
																				$stmt4 = $conn->prepare($sql4="UPDATE invoice SET debt_amount =0
																						WHERE  invoice_id = '".$row2["invoice_id"]."' ");
																				$stmt4->execute();
																				
																				$row2["bill_status"] = 'paid';
																				$stmt5 = $conn->prepare($sql5="UPDATE invoice SET bill_status = 'paid'
																						WHERE  invoice_id = '".$row2["invoice_id"]."' ");
																				$stmt5->execute();
																			}
																																	 
																			 echo "<tr><td>".$row2["invoice_id"]."</td><td>".$row2["bill_status"]."</td><td>".$row2["drugs_total_price"]." RM"."</td><td>".$row2["debt_amount"]."</td><td>".
																				'<form action ="payment.php" method ="POST"> 
																					<input type="hidden" value="'.$row2["invoice_id"].'" name="invoice_id">
																					<input type="hidden" value="'.$row2["drugs_total_price"].'" name="drugs_total_price">
																					<input type="hidden" value="'.$row2["debt_amount"].'" name="debt_amount">
																					<input type="hidden" value="'.$search_value.'" name="patient_ic">
																					<input type="hidden" value="'.$row2["prescription_id"].'" name="prescription_id">';
																					
																					
																						if( $row2['bill_status'] ==  $defaultStatues ){
																							echo '<input type="submit" value="   Pay   " name="pay" class="submit"/>';
																							echo '</form>'; 
																						}
																			
																				/*	echo '<td> <a class="btn btn-small btn-danger"
																							  data-toggle="modal"
																							  data-target="#deleteModal"
																							  data-invoice_id="'.$row2["invoice_id"].'">Delete</a>
																						   </td>';*/
																						
																			
																		 
																		}
																
																	?>
																		</table>
																	  </label>
																	</div>
																</div>
																<?php
												}
												
												else{
													?><p style = "font-family:ingrained;font-size:30px;font-style:bold;color:white;"><?php
													echo "This patient doesn't has invoices"; 
												}
											
									
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="./js/jquery-3.3.1.min.js "></script>
<script src="./js/bootstrap.min.js "></script>

<script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
</script>

<!-- Trigger the delete modal box -->
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('invoice_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'invoice_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./process/deleteInvoice.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>
</body>
</html>