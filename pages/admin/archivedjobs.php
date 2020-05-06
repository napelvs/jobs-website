<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';


$categories = findAll($pdo, 'category');
$title = 'Archived Job List';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if(isset($_POST['category_filter'])) {
		$jobs = findWithTwoFieldAll($pdo, 'job', 'archived', 'Y', 'categoryId', $_POST['category_filter']);
	} 
	else {
		$jobs = findWithOneFieldAll($pdo, 'job', 'archived', 'Y');
	}
	$output = loadTemplate('templates/job.html.php', ['jobs' => $jobs, 'categories' => $categories]);
}
else if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
	if(isset($_POST['category_filter'])) {
		$jobs = findWithThreeFieldAll($pdo, 'job', 'archived', 'Y', 'categoryId', $_POST['category_filter'], 'userId', $_SESSION['userId']);
	} 
	else {
		$jobs = findWithTwoFieldAll($pdo, 'job', 'archived', 'Y', 'userId', $_SESSION['userId']);
	}
	$output = loadTemplate('templates/job.html.php', ['jobs' => $jobs, 'categories' => $categories]);
}
else {
	$title = 'Login';
	$output = loadTemplate('templates/login.html.php', []);
}
require '../../templates/layout.html.php';
?>
