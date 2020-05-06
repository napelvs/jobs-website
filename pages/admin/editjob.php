<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';


if (isset($_POST['submit'])) {
	$criteria = [
		'title' => $_POST['title'],
		'description' => $_POST['description'],
		'salary' => $_POST['salary'],
		'location' => $_POST['location'],
		'categoryId' => $_POST['categoryId'],
		'closingDate' => $_POST['closingDate'],
		'id' => $_POST['id']
	];
	save($pdo, 'job', $criteria, 'id');
	$output = loadTemplate('templates/submit.html.php', ['value' => 'Job']);
}
else {
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {

		$job = findWithOneField($pdo, 'job', 'id', $_GET['id']);
		$rows = findAll($pdo, 'category');
		$output = loadTemplate('templates/editjob.html.php', ['job' => $job, 'rows' => $rows]);
	}
	else {
		$output = loadTemplate('templates/login.html.php', []);
	}
}
$title = 'Edit Job';
require '../../templates/layout.html.php';
?>