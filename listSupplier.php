<?php
session_start();
    //connection to the database
   include('./process/connection.php');
    
$result = $conn->query(  "SELECT * from supplier");
mysqli_close($conn);
?>

<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Supplier List</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->  
   

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!--===============================================================================================-->
</head>

<body>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-info">
                <h4 class="modal-title" style="color: white;" id="memberModalLabel">Update Supplier Details</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div>
<!-- Update Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-danger">
                <h4 class="modal-title" style="color: white;" id="memberModalLabel">Delete Supplier </h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               
            </div>
            <div class="dash">

            </div>

        </div>
    </div>
</div>
<!-- Delete Modal -->
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
                                   
                                    <th scope="col" style="//width: 120px; color: white;" >Supplier ID</th>
                                    <th scope="col" style="//width: 380px;color: white;">Supplier Name</th>
                                    <th scope="col" style="//width: 380px;color: white;">Supplier Phone</th>
                                    <th scope="col" style="//width: 380px;color: white;">Supplier Address</th>
                                    <th scope="col" style="//width: 380px;color: white;">&emsp;&emsp;&emsp; Action</th>
                            
                                </tr>
                            </thead>
                            <tbody>

                               <?php
                                        
                                        while($mem = mysqli_fetch_array($result)):
                                        
                                              echo '<tr>';
                                              echo '<td>'.$mem['supplier_id'].'</td>';
                                              echo '<td>'.$mem['supplier_name'].'</td>';
                                              echo '<td>'.$mem['supplier_number'].'</td>';
                                              echo '<td>'.$mem['supplier_address'].'</td>';

                                               echo '<td>
                                                       <a class="btn btn-small btn-primary"
                                                          data-toggle="modal"
                                                          data-target="#updateModal"
                                                          data-supplier_id="'.$mem['supplier_id'].'">Update</a> &nbsp;

                                                          <a class="btn btn-small btn-danger"
                                                          data-toggle="modal"
                                                          data-target="#deleteModal"
                                                          data-supplier_id="'.$mem['supplier_id'].'">Delete</a> 

                                                    </td>';
                                        echo '</tr>';
                                        endwhile;
                                        /* free result set */
                                        $result->close();
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
          var recipient = button.data('supplier_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'supplier_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./process/updateSupplier.php",
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

<!-- Trigger the delete modal box -->
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('supplier_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'supplier_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./process/deleteSupplier.php",
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
<!--End Trigger the delete modal box -->

</body>
</html>