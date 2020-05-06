<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	if (isset($_POST['submit'])) {

		$criteria = [
			'name' => $_POST['name'],
			'id' => $_POST['id']
		];
		
		save($pdo, 'category', $criteria, 'id');
		$output = loadTemplate('templates/submit.html.php', ['value' => 'Category']);
	}
	else {
		$currentCategory = findWithOneField($pdo, 'category', 'id', $_GET['id']);
		$output = loadTemplate('templates/editcategory.html.php', ['currentCategory' => $currentCategory]);
	}
}
else {
	$output = loadTemplate('templates/login.html.php', []);
}
$title = 'Edit Category';
require '../../templates/layout.html.php';
?>


