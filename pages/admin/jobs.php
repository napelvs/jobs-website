<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if(isset($_POST['category_filter'])) {
		$jobs = findWithTwoFieldAll($pdo, 'job', 'archived', 'N', 'categoryId', $_POST['category_filter']);
	} 
	else {
		$jobs = findWithOneFieldAll($pdo, 'job', 'archived', 'N');
	}

	$categories = findAll($pdo, 'category');
	$output = loadTemplate('templates/job.html.php', ['jobs' => $jobs, 'categories' => $categories]);
	$title = 'Job List';
}
else if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
	if(isset($_POST['category_filter'])) {
		$jobs = findWithThreeFieldAll($pdo, 'job', 'archived', 'N', 'categoryId', $_POST['category_filter'], 'userId', $_SESSION['userId']);
	} 
	else {
		$jobs = findWithTwoFieldAll($pdo, 'job', 'archived', 'N', 'userId', $_SESSION['userId']);
	}

	$categories = findAll($pdo, 'category');
	$output = loadTemplate('templates/job.html.php', ['jobs' => $jobs, 'categories' => $categories]);
	$title = 'Job List';
}
else {
	$output = loadTemplate('templates/login.html.php', []);
}
require '../../templates/layout.html.php';
?>
