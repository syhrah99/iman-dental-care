<?php
session_start();
unset($_SESSION['staff_id']);
session_destroy();

header("Location: ./indexStaff.php");
exit;
?>