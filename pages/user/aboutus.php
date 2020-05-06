<?php 
require '../databaseConnection.php';
require '../functions.php';

$category = findAll($pdo, 'category');
$output = loadTemplate('../templates/aboutus.html.php', ['categories' => $category]);

$title = 'About Us';
require '../templates/layout.html.php';