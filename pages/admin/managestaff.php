<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['admin']) && $_SESSION['admin'] == 'Y') {
    $staffs = findAll($pdo, 'staff');
    $output = loadTemplate('templates/managestaff.html.php', ['staffs' => $staffs]);
}

else {
	$output = loadTemplate('templates/login.html.php', []);
}
$title = 'Manage Staff';
require '../../templates/layout.html.php';
?>
