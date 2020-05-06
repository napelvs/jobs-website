<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['admin']) && $_SESSION['admin'] == 'Y') {
    $users = findAll($pdo, 'users');
    $output = loadTemplate('templates/manageusers.html.php', ['users' => $users]);
}

else {
	$output = loadTemplate('templates/login.html.php', []);
}
$title = 'Manage Users';
require '../../templates/layout.html.php';
?>
