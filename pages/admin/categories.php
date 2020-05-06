<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$categories = findAll($pdo, 'category');
	$output = loadTemplate('templates/categories.html.php', ['categories' => $categories]);

	$title = 'Categories';
}

else {
	$output = loadTemplate('templates/login.html.php', []);
}
require '../../templates/layout.html.php';
?>


