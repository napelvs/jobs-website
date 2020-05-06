<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
	delete($pdo, 'job', 'id', $_POST['id']);
	header('location: jobs.php');
}


