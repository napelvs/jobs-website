<?php
session_start();
require '../../classes/databaseConnection.php';
require '../../functions/save.php';
require '../../functions/loadTemplate.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if (isset($_POST['submit'])) {

		$criteria = [
			'name' => $_POST['name']
		];

		save($pdo, 'category', $criteria, 'id');
		$output =  loadTemplate('templates/submit.html.php', ['value' => 'Category']);
	}
	else {
		$output = loadTemplate('templates/addcategory.html.php', []);
		}
	}
else {
	$output = loadTemplate('templates/login.html.php', []);
}
$title = 'Applicants';
require '../../templates/layout.html.php';	
?>
