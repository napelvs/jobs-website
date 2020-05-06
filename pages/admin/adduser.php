<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['admin']) && $_SESSION['admin'] == 'Y') {
    if (isset($_POST['submit'])) {

		$criteria = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'username' => $_POST['username'],
            'password' => sha1($_POST['password'])
		];

		save($pdo, 'users', $criteria, 'id');
		$output =  loadTemplate('templates/submit.html.php', ['value' => 'User']);
	} else {
		$output = loadTemplate('templates/adduser.html.php', []);
    }
}
else {
	$output = loadTemplate('templates/login.html.php', []);
    }
$title = 'Add User';
require '../../templates/layout.html.php';
?>
