<?php
session_start();

$_SESSION['loggedin'] == false;
unset($_SESSION['loggedin']);
unset($_SESSION['admin']);
unset($_SESSION['loggedinUser']);
unset($_SESSION['userId']);
unset($_SESSION['adminId']);
header('location: jobs.php');
?>

