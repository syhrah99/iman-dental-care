
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
            $connect = new PDO("mysql:host=localhost;dbname=imandc2", "root", "");
            $get_all_table_query = "show full tables where Table_Type = 'BASE TABLE'";
            $statement = $connect->prepare($get_all_table_query);
            $statement->execute();
            $result = $statement->fetchAll();
            if(isset($_POST['table']))
            {
            $output = '';
            $output .= "\n\n SET FOREIGN_KEY_CHECKS=0;\n\n";
            foreach($_POST["table"] as $table)
            {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();
            $output .= "\n\n DROP TABLE IF EXISTS $table;\n\n";
            foreach($show_table_result as $show_table_row)
            {
            $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();
            $output .= "\n\n TRUNCATE TABLE $table;\n\n";

            for($count=0; $count<$total_row; $count++)
            {
            $single_result = $statement->fetch(PDO::FETCH_ASSOC);
            $table_column_array = array_keys($single_result);
            $table_value_array = array_values($single_result);
            $output .= "\nINSERT INTO $table (";
            $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
            $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
            
            }
            $output .= "\n\n SET FOREIGN_KEY_CHECKS=1;\n\n";
            $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
            $file_handle = fopen($file_name, 'w+');
            fwrite($file_handle, $output);
            fclose($file_handle);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($file_name));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_name));
                ob_clean();
                flush();
                readfile($file_name);
                unlink($file_name);
            }
            
        ?>

<!DOCTYPE html>
<head>
    <link rel="icon" href="img/dentist.png" type="image/png" sizes="16x16">
    <title>Backup</title>
    
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
               <td height="20" colspan="2" style="background-color: #5d3784;"><font face="Yu Gothic UI Semibold" color="white"><h4>Select Table to Backup</h4></font></td>
             </tr>
  <tr>
       <td width="28%" height="400" align="center" align="top">
          <div class="content-new">
        
            <table class="login" align="top" border="0" width="90%" align="center" cellpadding="0" cellspacing="0" >
             <br>
             

             <form method="post" id="export_form">
     <!-- <h3>Select Tables for Export</h3> -->
     
    <?php
    foreach($result as $table)
    {
    ?>
            <div class="checkbox" >
              <label ><input type="checkbox" class="checkbox_table" name="table[]" value="<?php echo $table["Tables_in_imandc2"]; ?>" /> <?php echo $table["Tables_in_imandc2"]; ?></label>
             </div>
   <!-- </td> -->
 <!-- </div> -->
    <?php
    }
    ?>
                <div class="form-group">
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Export" />
                </div>
              </form>
               
   <!-- </td> -->
  <!-- </div> -->
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
