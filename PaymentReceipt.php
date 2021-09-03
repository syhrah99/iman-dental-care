<?php
session_start();
if(isset($_SESSION["nric"])){
		$nric = $_SESSION["nric"];
		}else{
		// header('Location: index.php');
		}
 //connection to the database
include('./process/connection.php');

$result = $conn->query( "SELECT * from payment where nric = '$nric' ");

mysqli_close($conn);
?>

<!DOCTYPE html>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
                <h4 class="modal-title" style="color: white;" id="memberModalLabel"> </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div>

<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Receipt</title>
     <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
</head>
<body>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="box-dialog">
        <div class="box-content">
               
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div>
<!-- Update Modal -->

<div id="container">
        <div id="main">
             <header>
            <?php include('./lib/navPatient.php'); ?>
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
			
			 <div style=" text-align:center; color: white; padding: 20px 0px 20px 0px; margin: 0 auto; border-radius: 15px 15px 15px 15px; margin-bottom: 20px; margin-top: 20px;">
				<p style = "font-family:ingrained;font-size:55px;font-style:bold;color:white;">
					Receipts
				</p>
              
			<?php


					include('./process/connection.php');

					$prescriptionID;
					$total_price=0;
					
				if(!isset($_POST['Receipt'])){

						$sql1="select * from payment where 	nric = '$nric'";
						
						$res1=$conn->query($sql1);
						if ($res1->num_rows > 0) {
							?>
								<div class="row">
									<div class="col-85">
										<label>
											<table class="table" style="text-align:center; color: white;">
							<?php	
							echo "<tr><th>payment ID</th><th>Status</th><th>Total</th><th>";
							while($row1=$res1->fetch_assoc()){
								
								 echo "<tr><td>".$row1["payment_id"]."</td><td>".$row1["payment_status"]."</td><td>".$row1["payment_amount"]." RM"."</td><td>".
																				
									' <a class="btn btn-small btn-success"
									 data-toggle="modal"
									 data-target="#updateModal"
									data-payment_id="'.$row1["payment_id"].'">Receipt</a>';
																				 
																				
								
							}
							  
                              /* free result set */
                              $res1->close();
							?>
											</table>
										</label>
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


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Table search update -->
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
<!-- Table search update -->

<!-- Trigger the update modal box -->
<script>
    $('#updateModal').on('show.bs.modal', function (event) {
          var submit = $(event.relatedTarget) // Button that triggered the modal
          var recipient = submit.data('payment_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'payment_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./receipt.php",
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
<!--End Trigger the update modal box -->
</body>
</html>