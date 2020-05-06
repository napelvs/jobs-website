<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['admin']) && $_SESSION['admin'] == 'Y') {
	delete($pdo, 'staff', 'id', $_POST['id']);
	header('location: managestaff.php');
}