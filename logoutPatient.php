<?php
session_start();
unset($_SESSION['nric']);
session_destroy();

header("Location: indexPatient.php");
exit;
?>