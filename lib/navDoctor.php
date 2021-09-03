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

<!-- <?php include('Header.php'); ?> -->
<body> 
  <div id="mySidenav" class="sidenav" onmouseover="toggleSidenav()" onmouseout="toggleSidenav()">
    
    <!-- <font color="#AED6F1" size="4">
        <?php
        echo $_SESSION['staff_name']; ?>
    </font> -->
  
  
    <button class="dropdown-btn"><i class="material-icons">today</i><span class="icon-text"> Schedule</button>

    <div class="dropdown-container">
      <a href="./Schedule2.php">New Schedule</a>
      <a href="./ListSchedule.php">Schedule List</a>
    </div>
  
  
    <button class="dropdown-btn"><i class="material-icons">view_list</i><span class="icon-text"> Activity List</button></span>
    
    <div class="dropdown-container">
     <a  href="./listAppointment.php">Appointment List</a>
        <a href="./listTreatment.php">Treatment List</a>
        <a href="./listPrescription.php">Prescription List</a>
    </div>

  
  
      <a href="./profileDoctor.php" class="bt"><i class="material-icons">person</i><span class="icon-text"> Profile</span></a>
      
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