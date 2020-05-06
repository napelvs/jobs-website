<?php 
require '../classes/databaseConnection.php';

$categories = findAll($pdo, 'category');
$output = loadTemplate('../templates/faqs.html.php', ['categories' => $categories]);
$title = 'FAQs';