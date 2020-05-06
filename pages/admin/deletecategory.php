<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	delete($pdo, 'category', 'id', $_POST['id']);
	header('location: categories.php');
}