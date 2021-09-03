<?php
session_start();

if(isset($_SESSION["staff_id"])){
    $staff_id = $_SESSION["staff_id"];
  }else{
    // header('Location: index.php');
  }
 //connection to the database
 include('./process/connection.php'); 

$result = $conn->query( "SELECT * from schedule WHERE staff_id = '$staff_id'");

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

<div class="limiter">
        <header>
            <?php include('./lib/navDoctor.php'); ?>
            </header>

            <!-- <div style="background-color: #1E2021; color: white; border-radius: 30px 30px 0px 0px; width: 85%; margin:0 auto; margin-top: 50px; border-style: solid; margin-bottom: 50px; ">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Patient Name..." title="Type in a name">
                </div> -->
        
        <div class="container">
            <div id="main">
            
                    <table class="container" style="width: 100%; margin: 0 auto;" id="myTable">
                        <thead>
                                <tr>
                                   <th scope="col" style="//width: 120px;" >Schedule ID</th>
                                    <th scope="col" style="//width: 380px;">Week Selection</th>
                                    <th scope="col" style="//width: 380px;">Day Available</th>
                                    <th scope="col" style="//width: 380px;">Time Available</th>
                                    <th scope="col" style="//width: 380px;"> Action</th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php
                                        
                                        while($mem = mysqli_fetch_array($result)):
                                        
                                           echo '<tr>';
                                              echo '<td>'.$mem['schedule_id'].'</td>';  
                                              echo '<td>'.$mem['week'].'</td>';
                                              echo '<td>'.$mem['day'].'</td>';
                                              echo '<td>'.$mem['s_time'].'</td>';

                                         echo '<td>
                                                       <a class="btn btn-small btn-primary"
                                                          data-toggle="modal"
                                                          data-target="#updateModal"
                                                          data-schedule_id="'.$mem['schedule_id'].'">Update</a> &nbsp;

                                                          <a class="btn btn-small btn-danger"
                                                          data-toggle="modal"
                                                          data-target="#deleteModal"
                                                          data-schedule_id="'.$mem['schedule_id'].'">Delete</a> &nbsp;

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



<!-- Trigger the update modal box -->
<script>
    $('#updateModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('schedule_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'schedule_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./process/updateSchedule.php",
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
          var recipient = button.data('schedule_id') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'schedule_id=' + recipient;

            $.ajax({
                type: "GET",
                url: "./process/deleteSchedule.php",
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