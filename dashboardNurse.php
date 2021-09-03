<?php
session_start();
include "./process/connection.php";

$sql = "SELECT count(nric) AS total_patient FROM patient ";
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

$sql2 = "SELECT med_name,SUM(available_quantity) as 'totalquantity' from drugs_supply natural join drugs group by med_name";
$result9 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));

$dt= date("Y");
$query = "SELECT count(appointment_id) AS total_appointment FROM appointment";
$result1 = mysqli_query($conn,$query) or die (mysqli_error($conn));

// $query1 = "SELECT * FROM appointment 
//     INNER JOIN schedule 
//     ON schedule.schedule_id = appointment.schedule_id 
//     WHERE schedule_date >= DATE(NOW()) - INTERVAL 7 DAY";
// $result10 = mysqli_query($conn, $query1) or die (mysqli_error($conn));

// $date = date("Y-m-d");
// $firstDate = date("Y-m-d", strtotime("monday this week"));
// $lastDate = date("Y-m-d", strtotime("sunday this week"));
// $query2 = "SELECT * FROM appointment 
//     INNER JOIN schedule 
//     ON schedule.schedule_id = appointment.schedule_id 
//     WHERE day = CURDATE() - 1";
// $result3 = mysqli_query($conn, $query2) or die (mysqli_error($conn));

// $now= date("Y-m");
// $query6 = "SELECT EXTRACT( DAY FROM `date` ) as 'day', SUM(total_amount) AS totalday
// 			FROM TRANSACTION T
// 			WHERE DATE BETWEEN '$now-01' AND ('$now-31')
// 			GROUP BY day";
// $result6 = mysqli_query($conn,$query6) or die (mysqli_error($conn));
?>


<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Dashboard</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->  
    
    
   <!--  <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css"> -->

<!--===============================================================================================-->
</head>


 <body> 
<div class="limiter">
            <header>
            <?php include('./lib/navNurse.php'); ?>
            </header>
       


<div id="main">
             
 <br>


<table class="table" border="1" align="center"  cellpadding="0" cellspacing="15">
<tr>
  <td align="center">
<!-- <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Total Sale'],
		  <?php
				
				while ($row3=mysqli_fetch_assoc($result3)){
				$month=$row3['month']; // month in number
				$day=$row3['day'];
				$year=$row3['year'];
				$day=date("l", mktime(0,0,0,$month,$day,$year)); // function to convert number to name
				?>
				['<?php echo $day?>', <?php echo $row3['totald']?>],
				<?php
				}
			?>
        ]);

        var options = {
          chart: {
          title : 'Daily Sale For This Week'},
          vAxis: {title: 'Sale'},
          hAxis: {title: 'Day'},
          series: {0: {type: 'line'}}        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_values'));
        chart.draw(data, options);
      }
    </script>
  </head> -->
  <body >

  
    <div id="columnchart_values" style="width: 437; height: 284;"></div>
  </body>
  </td>
  <td align="center">
<head>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawVisualization2);

      function drawVisualization2() {
        // Some raw data (not necessarily accurate)
        var data2 = google.visualization.arrayToDataTable([
          ['Day', 'Total Sale'],
		  <?php
				
				while ($row6=mysqli_fetch_assoc($result6)){
				$day=$row6['day'];
				?>
				['<?php echo $day?>', <?php echo $row6['totalday']?>],
				<?php
				}
			?>
        ]);

        var options2 = {
          chart: {
          title : 'Daily Sale For This Month'},
          vAxis: {title: 'Sale'},
          hAxis: {title: 'Day'},
          series: {0: {type: 'line'}}        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_values6'));
        chart.draw(data2, options2);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_values6" style="width: 437; height: 284;"></div>
  </body>
  </td>
  <td align="center">
<head>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Drug Name', 'Total Product'],
          <?php
				while ($row=mysqli_fetch_assoc($result)){
				?>
				['<?php echo $row['med_name']?>', <?php echo $row['available_quantity']?>],
				<?php
				}
				?>
        ]);

        var options = {
          title: 'Quantity Available Drugs Based On Drug Name',
          pieHole : 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 300; height: 284;"></div>
  </body>
  </td>
  </tr>
  
  <tr>
    <td align="center">
    <head>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total Sale'],
		  <?php
				
				while ($row=mysqli_fetch_assoc($result1)){
				$month=$row['month']; // month in number
				$displayName=date("F",mktime(0,0,0,$month,10)); // function to convert number to name 
				?>
				['<?php echo $displayName?>', <?php echo $row['total']?>],
				<?php
				}
			?>
        ]);

        var options = {
          chart: {
          title : 'Monthly Sale'},
          vAxis: {title: 'Sale'},
          hAxis: {title: 'Month'},
          series: {0: {type: 'line'}}        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_values3'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_values3" style="width: 437; height: 284;"></div>
  </body>
  </td>
  <td align="center">
<head>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawVisualization2);

      function drawVisualization2() {
        // Some raw data (not necessarily accurate)
        var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Total Sale'],
		  <?php
				
				while ($row2=mysqli_fetch_assoc($result10)){
				$year=$row2['year']; // month in number
				?>
				['<?php echo $year?>', <?php echo $row2['totaly']?>],
				<?php
				}
			?>
        ]);

        var options2 = {
          chart: {
          title : 'Yearly Sale'},
          vAxis: {title: 'Sale'},
          hAxis: {title: 'Year'},
          series: {0: {type: 'line'}}        };

        var chart2 = new google.charts.Bar(document.getElementById('columnchart_values4'));
        chart2.draw(data2, options2);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_values4" style="width: 437; height: 284;"></div>
  </body>
  </td>
  <td align="center">
<head>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Med Name', 'Total Product'],
          <?php
				while ($row9=mysqli_fetch_assoc($result9)){
				?>
				['<?php echo $row9['med_name']?>', <?php echo $row9['available_quantity']?>],
				<?php
				}
				?>
        ]);

        var options = {
          title: 'Available Drug Based on Drug Name',
          pieHole : 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart2" style="width: 300; height: 284;"></div>
  </body>
  </td>
  </tr>
  </table>
<!-- </div> -->
  <br>
</div>
</div>
</div>
  

<script>
  var mini = true;

  function toggleSidenav() 
  {
  if (mini) {
    console.log("opening sidenav");
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    this.mini = false;
  } else {
    console.log("closing sidenav");
    document.getElementById("mySidenav").style.width = "70px";
    document.getElementById("main").style.marginLeft = "70px";
    this.mini = true;
  }
}

</script>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
</body>
<!-- </div> -->
</html>