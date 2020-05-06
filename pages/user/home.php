<?php
require '../databaseConnection.php';
$categories = findAll($pdo, 'category');
$jobs = findAllOrder($pdo, 'job', 'closingDate', 'ASC', 10);
$output = loadTemplate('../templates/home.html.php', ['categories' => $categories, 'jobs' => $jobs]);
$title = 'Home';