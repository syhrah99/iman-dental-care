<?php
 $conn = new mysqli("localhost", "root", "", "ImanDC");
 /* check connection */
 if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
    }
?> 


