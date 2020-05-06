<?php
require '../databaseConnection.php';
require '../functions.php';

$date = new DateTime();

$category = findWithOneField($pdo, 'category', 'id', $_GET['id']);
$categories = findAll($pdo, 'category');
$jobsLocation = findAllOneFieldNoDuplicates($pdo, 'location', 'job');

if(isset($_POST['job_filter'])) {
    $jobs = findWithThreeFieldCustom($pdo, 'job', 'categoryId', '=', $_GET['id'], 'closingDate', '>', $date->format('Y-m-d'), 'location', '=', $_POST['job_filter']);
} 
else {
    $jobs = findWithTwoFieldCustom($pdo, 'job', 'categoryId', '=', $_GET['id'], 'closingDate', '>', $date->format('Y-m-d'));
}

$values = [ 'jobs' => $jobs,
            'categories' => $categories,
            'category' => $category,
            'jobsLocation' => $jobsLocation
];
$title = $category['name'];
$output = loadTemplate('../templates/category.html.php', $values);

require '../templates/layout.html.php';
?>