<?php
  //check for valid user
session_start();

include('./process/connection.php');
    
$result = $conn->query( "SELECT appointment.*, staff.staff_name, patient.p_name from `appointment` INNER JOIN `staff` ON `staff`.`staff_id`=`appointment`.`staff_id`  INNER JOIN `patient` ON `patient`.`nric` = `appointment`.`nric`");

mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Schedule List</title>
    
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
                <h4 class="modal-title" style="color: white;" id="memberModalLabel">Update Schedule Details</h4>
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
                <h4 class="modal-title" style="color: white;" id="memberModalLabel">Delete Schedule </h4>
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
          
            
                
                
        
        <div class="container">
             
            <div id="main">
            
                    <table class="container" style="width: 100%; margin: 0 auto;" id="myTable">
                        <thead>
                                <tr>
                                    <th scope="col" style="//width: 120px;" >Appointment ID</th>
                                    <th scope="col" style="//width: 380px;">Doctor Name</th>
                                    <th scope="col" style="//width: 380px;">Patient Name</th>
                                    <th scope="col" style="//width: 380px;">Date</th>
                                    <th scope="col" style="//width: 380px;">Time</th>
                                    <th scope="col" style="//width: 380px;">Description</th>
                                    <th scope="col" style="//width: 380px;">Status</th>
                                    <th scope="col" style="//width: 380px;">&nbsp;Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php
                                        
                                        while($mem = mysqli_fetch_array($result)):
                                        
                                           echo '<tr>';
                                              echo '<td>'.$mem['appointment_id'].'</td>';
                                              echo '<td>'.$mem['staff_name'].'</td>';
                                              echo '<td>'.$mem['p_name'].'</td>';
                                              echo '<td>'.$mem['app_date'].'</td>';
                                              echo '<td>'.$mem['app_time'].'</td>';
                                              echo '<td>'.$mem['description'].'</td>';
                                              echo '<td>'.$mem['app_status'].'</td>';

                                               echo '<td>
                                                       <a class="btn btn-small btn-primary"
                                                          data-toggle="modal"
                                                          data-target="#updateModal"
                                                          data-appointment_id="'.$mem['appointment_id'].'">Update</a> &nbsp;&nbsp;

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
          var recipient = button.data('appointment_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'appointment_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./process/updateAppCheck.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                        
                }
            });
    })
</script>

</body>
</html>