<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_POST['submit'])) {
		$criteria = [
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'salary' => $_POST['salary'],
			'location' => $_POST['location'],
			'categoryId' => $_POST['categoryId'],
			'closingDate' => $_POST['closingDate']
		];

		save($pdo, 'job', $criteria, 'id');
		$output =  loadTemplate('templates/submit.html.php', ['value' => 'Job']);
	}
	else {
		$categories = findAll($pdo, 'category');
		$output = loadTemplate('templates/addjob.html.php', ['categories' => $categories]);
		}
	}
else if (isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
	if (isset($_POST['submit'])) {
		$criteria = [
			'title' => $_POST['title'],
			'description' => $_POST['description'],
			'salary' => $_POST['salary'],
			'location' => $_POST['location'],
			'categoryId' => $_POST['categoryId'],
			'closingDate' => $_POST['closingDate'],
			'userId' => $_SESSION['userId']
		];

		save($pdo, 'job', $criteria, 'id');
		$output =  loadTemplate('templates/submit.html.php', ['value' => 'Job']);
	}
	else {
		$categories = findAll($pdo, 'category');
		$output = loadTemplate('templates/addjob.html.php', ['categories' => $categories]);
		}
	}
else {
	$output = loadTemplate('templates/login.html.php', []);
}
$title = 'Applicants';
require '../../templates/layout.html.php';	
?>


