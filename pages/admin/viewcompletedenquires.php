<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$enquires = findWithOneFieldAll($pdo, 'enquiry', 'completed', 'Y');
	$output = loadTemplate('templates/viewcompletedenquires.html.php', ['enquires' => $enquires]);
	$title = 'Enquiry List';
}
else {
	$output = loadTemplate('templates/login.html.php', []);
}
require '../../templates/layout.html.php';
?>
