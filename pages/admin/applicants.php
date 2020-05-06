<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
	$job = findWithOneField($pdo, 'job', 'id', $_GET['id']);
	$stmt = findWithOneFieldAll($pdo, 'applicants', 'jobId', $_GET['id']);
	$output = loadTemplate('templates/applicants.html.php', ['job' => $job, 'stmt' => $stmt]);
}
else {
	$output = loadTemplate('templates/login.html.php', []);
}
$title = 'Applicants';
require '../../templates/layout.html.php';	
?>



