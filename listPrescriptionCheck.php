<?php
session_start();

include('./process/connection.php');  

$result = $conn->query( "SELECT * from prescription ");


?>
<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Prescription List</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!--===============================================================================================-->
</head>
<body>
<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 1080px!important;"></div>
    <div class="dash"></div>
</div>
<!-- Update Modal -->

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
<header>
            <?php include('./lib/headerstaff.php'); ?>
            </header>
<div class="limiter">
        <header>
            <?php include('./lib/navNurse.php'); ?>
            </header>

            <!-- <div style="background-color: #1E2021; color: white; border-radius: 30px 30px 0px 0px; width: 85%; margin:0 auto; margin-top: 50px; border-style: solid; margin-bottom: 50px; ">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Patient Name..." title="Type in a name">
                </div> -->
        
        <div class="container">
            <div id="main">
            
                    <table class="container" style="width: 100%; margin: 0 auto;" id="myTable">
                        <thead>
                                <tr>
                                   <th scope="col" style="//width: 120px;" >Prescription ID</th>
                                    <th scope="col" style="//width: 380px;">Treatment ID</th>
                                    <th scope="col" style="//width: 380px;">Requested Date</th>
                                    <th scope="col" style="//width: 380px;">Action</th> 
                                </tr>
                            </thead>
                            <tbody>

                              <?php
                                          
                                        
                                        while($mem = mysqli_fetch_array($result)):
                                        
                                           echo '<tr>';
                                              echo '<td>'.$mem['prescription_id'].'</td>';  
                                              echo '<td>'.$mem['treatment_id'].'</td>';
                                              echo '<td>'.$mem['requested_date'].'</td>';
                                              echo '<td>';
                                             
                                               
                                                $prescription_id= $mem['prescription_id'];
                                                $res2=$conn->query("select * from invoice where prescription_id ='$prescription_id'");
                                                if($res2->num_rows == 0){
                            
                                                    
                                                            echo '
                                                                <a class="btn btn-small btn-success"
                                                                  data-toggle="modal"
                                                                  data-target="#updateModal"
                                                                  data-prescription_id="'.$mem['prescription_id'].'">Create Invoice</a>

                                                            </td>';
                                                    
                                                    $res2->close();
                                                }
                                                else{
                                                            $row2=$res2->fetch_assoc();
                                                            echo '<a class="btn btn-small btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#deleteModal"
                                                                    data-invoice_id="'.$row2["invoice_id"].'">Delete Invoice</a>
                                                                                           ';
                                                    
                                                }
                                                
                                                echo '</tr>';
                                        endwhile;
                                        /* free result set */
                                        $result->close();
                                        
                if(isset($_POST['submit'])){
                
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
                                   ?>
                            </tbody>
                        </table>
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
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('prescription_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'prescription_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./confirmInvoice.php",
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
<!--End Trigger the update modal box -->

</body>
</html>