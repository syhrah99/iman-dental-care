
<?php

session_start();
  
  if(isset($_SESSION["staff_id"])){
      $user = $_SESSION["staff_id"];
  }else{
    // header('Location: Index.php');
  }
   include('./process/connection.php');

?>
<?php 
$message = '';
if(isset($_POST["import"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost", "root", "", "imandc2");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($connect, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
    $message = '<label class="text-danger">There is an error in Database Import</label>';
   }
   else
   {
    $message = '<label class="text-success">Database Successfully Imported</label>';
   }
  }
  else
  {
   $message = '<label class="text-danger">Invalid File</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select Sql File</label>';
 }
}
?>

<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Restore</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->  
    
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
      div.content-new {
    margin-left: 0px;
    padding: 1px 16px;
    height: 400px;
}
    </style>


<!--===============================================================================================-->
</head>



 <body> 
  
<div class="limiter">
        <header>
            <?php include('./lib/navNurse.php'); ?>
            </header>

        
        
        <div class="container">
            <div id="main">

<br>

<table width="98%" height="337" border="0" align="center">
  <tr align="center">
               <td height="20" colspan="2" style="background-color: #5d3784;"><font face="Yu Gothic UI Semibold" color="white"><h4>Select Table to Restore</h4></font></td>
             </tr>
  <tr>
       <td width="28%" align="center" align="top">
          <div class="content-new">
        
            <table class="login" align="top" border="0" width="90%" align="center" cellpadding="0" cellspacing="0" >
             <br>
   <div><?php echo $message; ?></div>
   <form method="post" enctype="multipart/form-data">
    <p><!-- <label>Select Sql File</label> -->
    <input type="file" name="database" /></p>
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
   </form>
 </table>
  </div> 
  </td> 
  </tr>
</table>
</div>
</div>
</div>
 </body>
</html>
<script>
$(document).ready(function(){
 $('#submit').click(function(){
  var count = 0;
  $('.checkbox_table').each(function(){
   if($(this).is(':checked'))
   {
    count = count + 1;
   }
  });
  if(count > 0)
  {
   $('#export_form').submit();
  }
  else
  {
   alert("Please Select Atleast one table for Export");
   return false;
  }
 });
});
</script>

</div>

   




<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tbl");
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



    
</body>
</html>
