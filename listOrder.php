   <?php
session_start();
    //connection to the database
   include('./process/connection.php');
    
$result = $conn->query("SELECT drugs_supply.*, drugs.med_name , supplier.supplier_name FROM drugs_supply inner join drugs on drugs_supply.drugs_id = drugs.drugs_id inner join supplier on supplier.supplier_id = drugs_supply.supplier_id");

mysqli_close($conn);
?>

<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Order List</title>
    
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
                                   <th scope="col" style="//width: 120px;" >Supplier Name</th>
                                    <th scope="col" style="//width: 380px;">Drugs Name</th>
                                    <th scope="col" style="//width: 380px;">Order Quantity</th>
                                    <th scope="col" style="//width: 380px;">Delivery Date</th>
                                    <th scope="col" style="//width: 380px;">Delivery Time</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                        
                                        while($mem = mysqli_fetch_array($result)):
                                        
                                           echo '<tr>';
                                                echo '<td>'.$mem['supplier_name'].'</td>';
                                                echo '<td>'.$mem['med_name'].'</td>';
                                              echo '<td>'.$mem['available_quantity'].'</td>';
                                              echo '<td>'.$mem['delivery_date'].'</td>';
                                              echo '<td>'.$mem['delivery_time'].'</td>';

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


</body>
</html>