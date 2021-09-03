<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnavigation {
  position: relative;
  overflow: hidden;
  background: linear-gradient(
45deg
, #49a09d, #5f2c82);
}

.topnavigation a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnavigation a:hover {
  background-color: #ddd;
  color: black;
}

.topnavigation a.active {
  background-color: #04AA6D;
  color: white;
}

.topnavigation-centered a {
  float: none;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.topnavigation-right {
  float: right;
}

/* Responsive navigation menu (for mobile devices) */
@media screen and (max-width: 600px) {
  .topnavigation a, .topnavigation-right {
    float: none;
    display: block;
  }
  
  .topnavigation-centered a {
    position: relative;
    top: 0;
    left: 0;
    transform: none;
  }
}
</style>
</head>
<body>

<!-- Top navigation -->
<div class="topnavigation">

  <!-- Centered link -->
  <div class="topnavigation-centered">
    <a href="./dashboardNurse2.php" class="active">Welcome To Iman DentalCare, <?php echo $_SESSION['p_name']; ?> !</a>
  </div>
  
  <!-- Left-aligned links (default) -->
  <!-- <a href="#news">News</a>
  <a href="#contact">Contact</a> -->
  
  <!-- Right-aligned links -->
  <div class="topnavigation-right">
    <a href="#search">Search</a>
    
  </div>
  
</div>



</body>
</html>