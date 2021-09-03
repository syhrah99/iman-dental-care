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
    
    <!-- <font color="#AED6F1" size="4">
        <?php
        echo $_SESSION['p_name']; ?>
    </font>
   -->
   
  
      <a href="./Appointment.php" class="bt"><i class="material-icons">event</i><span class="icon-text"> Appointment</span></a>
      <a href="./AppointmentHistory.php" class="bt"><i class="material-icons">history</i><span class="icon-text"> History</span></a>
      <a href="paymentReceipt.php" class="bt"><i class="material-icons">receipt</i><span class="icon-text"> Receipt</span></a>
      <a href="./profilePatient.php" class="bt"><i class="material-icons">person</i><span class="icon-text"> Profile</span></a>
      <a href="logoutPatient.php" onClick="return confirm('Are you sure?')" class="bt"><i class="material-icons">logout</i><span class="icon-text"> Logout</span></a>
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