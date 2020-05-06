<?php
require '../../databaseConnection.php';
require '../../functions.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {

	$criteria = [
		'id' => $_POST['id'],
		'archived' => 'Y'
	];

	save($pdo, 'job', $criteria, 'id');
	header('location: jobs.php');
}


