<?php
session_start();
include "./process/connection.php";

$sql = "SELECT COUNT(nric) as totalpatient, p_gender from patient GROUP BY p_gender";
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

$sql2 = "SELECT quantity, med_name FROM drugs GROUP BY med_name";
$result9 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));

$dt= date("Y");
$query = "SELECT EXTRACT( MONTH FROM `app_date` ) as 'month', COUNT(appointment_id) AS total
			FROM APPOINTMENT A
			WHERE app_date BETWEEN '$dt-01-01' AND ('$dt-12-31')
			GROUP BY MONTH";
$result1 = mysqli_query($conn,$query) or die (mysqli_error($conn));

$query1 = "SELECT EXTRACT( YEAR FROM `app_date` ) as 'year', COUNT(appointment_id) AS totaly 
FROM APPOINTMENT A GROUP BY year";
$result10 = mysqli_query($conn, $query1) or die (mysqli_error($conn));

$date = date("Y-m-d");
$firstDate = date("Y-m-d", strtotime("monday this week"));
$lastDate = date("Y-m-d", strtotime("sunday this week"));
$query2 = "SELECT a.app_date, EXTRACT( MONTH FROM `app_date` ) as 'month', EXTRACT( YEAR FROM `app_date` ) as 'year', EXTRACT( DAY FROM `app_date` ) as 'day', COUNT(appointment_id) AS totald 
FROM APPOINTMENT A
WHERE a.app_date BETWEEN '$firstDate' AND '$lastDate'
			GROUP BY day";
$result3 = mysqli_query($conn, $query2) or die (mysqli_error($conn));

$now= date("Y-m");
$query6 = "SELECT EXTRACT( DAY FROM `app_date` ) as 'day', COUNT(appointment_id) AS totalday
			FROM APPOINTMENT A
			WHERE app_date BETWEEN '$now-01' AND ('$now-31')
			GROUP BY day";
$result6 = mysqli_query($conn,$query6) or die (mysqli_error($conn));
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<title>Dashboard</title>
<link rel="icon" href="img/dentist.png" type="image/gif" sizes="16x16">


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<meta name="viewport" content-type="width=device-width initial-scale=1" />
<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- </head> -->

</head>

 <body> 
  
<div class="limiter">
        <header>
            <?php include('./lib/navNurse.php'); ?>
            </header>

          
        
        <div class="container">
            <div id="main">
 
<table class="table" border="1" align="center"  cellpadding="0" cellspacing="15">
<tr>
  <td align="center">
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Total Appointment'],
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
          title : 'Daily Appointment For This Week'},
          vAxis: {title: 'Appointment'},
          hAxis: {title: 'Day'},
          series: {0: {type: 'line'}}        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_values'));
        chart.draw(data, options);
      }
    </script>
  </head>
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
          ['Day', 'Total Appointment'],
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
          title : 'Daily Appointment For This Month'},
          vAxis: {title: 'Appointment'},
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
          ['Gender', 'Total Patient'],
          <?php
				while ($row=mysqli_fetch_assoc($result)){
				?>
				['<?php echo $row['p_gender']?>', <?php echo $row['totalpatient']?>],
				<?php
				}
				?>
        ]);

        var options = {
          title: 'Total Patient Based On Gender',
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
          ['Month', 'Total Appointment'],
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
          title : 'Monthly Appointment'},
          vAxis: {title: 'Appointment'},
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
          ['Year', 'Total Appointment'],
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
          title : 'Yearly Appointment'},
          vAxis: {title: 'Appointment'},
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
          ['Drugs', 'Total Drugs'],
          <?php
				while ($row9=mysqli_fetch_assoc($result9)){
				?>
				['<?php echo $row9['med_name']?>', <?php echo $row9['quantity']?>],
				<?php
				}
				?>
        ]);

        var options = {
          title: 'Total Drugs Based On Name',
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
</div>
</div>
</div>

  </html>


</body>
</div>
</html>