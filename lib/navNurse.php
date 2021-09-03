<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<!-- <title>Registration User</title> -->
<link rel="icon" href="img/dentist.png" type="image/gif" sizes="16x16">

<link rel="stylesheet" type="text/css" href="./css/Menu1.css" />
<link rel="stylesheet" type="text/css" href="./css/newstyle.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<meta name="viewport" content-type="width=device-width initial-scale=1" />
<!-- </head> -->


</head>


<body> 
  <div id="mySidenav" class="sidenav" onmouseover="toggleSidenav()" onmouseout="toggleSidenav()">
    
    <!--  <font color="#AED6F1" size="4">
        <?php
        echo $_SESSION['staff_name']; ?>
    </font>  -->
    <!-- <img src="./img/logo2.png" alt="Girl in a jacket">
    <ul> -->
  
   <a href="./dashboardNurse2.php" class="bt"><i class="material-icons">dashboard</i><span class="icon-text"> Dashboard</span></a>
    <button class="dropdown-btn"><i class="material-icons">event</i><span class="icon-text"> Appointment</button>

    <div class="dropdown-container">
      <a href="./ScheduleCheck.php">Doctor Schedule</a>
      <a href="./AppointmentCheck.php">Patient Appointment</a>
    </div>
  
  
    <button class="dropdown-btn"><i class="material-icons">medication</i><span class="icon-text"> Drugs</button></span>
    
    <div class="dropdown-container">
     <a  href="./Drugs.php">New Drug</a>
        <a href="./Supplier.php">New Supplier</a>
        <a href="./OrderDrugs.php">Order Drugs</a>
        <a href="./listDrugs.php">Drugs List</a>
        <a href="./listSupplier.php">Supplier List</a>
        <a href="./listOrder.php">Order List</a>
    </div>

    <button class="dropdown-btn"><i class="material-icons">payment</i><span class="icon-text"> Finance</button></span>
    
    <div class="dropdown-container">
     <a href="./listPrescriptionCheck.php">List Prescription</a>
     <a href="./listPatient.php">List Invoice</a>
    </div>
  
      <a href="./profileNurse.php" class="bt"><i class="material-icons">person</i><span class="icon-text"> Profile</span></a>
      <!-- <a href="./backup.php" class="bt"><i class="material-icons">cloud_download</i><span class="icon-text"> Backup</span></a>
      <a href="./restore.php" class="bt"><i class="material-icons">cloud_upload</i><span class="icon-text"> Restore</span></a> -->
      <a href="logoutStaff.php" onClick="return confirm('Are you sure?')" class="bt"><i class="material-icons">logout</i><span class="icon-text"> Logout</span></a>
  </div>




<script>
  var mini = true;

  function toggleSidenav() {
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
</html>