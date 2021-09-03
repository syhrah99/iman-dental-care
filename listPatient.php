<?php
  //check for valid user
session_start();

  include('./process/connection.php');
    
$result = $conn->query( "SELECT * from `patient` ");

mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Patient List</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->  
   

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">

<!--===============================================================================================-->
</head>
<body>

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
                                   <th scope="col" style="//width: 120px;" >IC Number</th>
                                    <th scope="col" style="//width: 380px;">Name</th>
                                    <th scope="col" style="//width: 380px;">Phone Number</th>
                                    <th scope="col" style="//width: 380px;">Address</th>
                                    <th scope="col" style="//width: 380px;">Gender</th>
                                    <th scope="col" style="//width: 380px;">Age</th>
                                    <th scope="col" style="//width: 380px;">Status</th>
                                    <th scope="col" style="//width: 380px;">Email</th>
                                    <th scope="col" style="//width: 380px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                        
                                        while($mem = mysqli_fetch_array($result)):
                                        
                                           echo '<tr>';
                                              echo '<td>'.$mem['nric'].'</td>';
                                              echo '<td>'.$mem['p_name'].'</td>';
                                              echo '<td>'.$mem['p_phonenum'].'</td>';
                                              echo '<td>'.$mem['p_address'].'</td>';
                                              echo '<td>'.$mem['p_gender'].'</td>';
                                              echo '<td>'.$mem['p_age'].'</td>';
                                              echo '<td>'.$mem['p_status'].'</td>';
                                              echo '<td>'.$mem['p_email'].'</td>';

                                              echo '<td>
                                              
                                                    <form action ="invoices.php" method ="POST" >  
                                                         <input type="hidden" id="Patient_ic" name="search" value = "'.$mem['nric'].'">
                                                         <input type="submit" value="Invoices List" class="btn btn-small btn-success" >
                                                    </form>

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
<!-- Trigger the view modal box -->
<script>
    $('#updateModal').on('show.bs.modal', function (event) {
          var submit = $(event.relatedTarget) // Button that triggered the modal
          var recipient = submit.data('patient_ic') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'patient_ic=' + recipient;

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
<!--End Trigger the view modal box -->

</body>
</html>