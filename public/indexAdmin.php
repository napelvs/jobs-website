<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_POST['submit'])) {
	$staffs = findAll($pdo, 'staff');
	foreach ($staffs as $staff) {
		if (sha1($_POST['password']) == $staff['password'] && $_POST['username'] == $staff['username']) {
			$_SESSION['loggedin'] = true;
			$_POST['staffName'] = $staff['first_name'] . ' ' . $staff['last_name'];
			$_SESSION['admin'] = $staff['admin'];
			$_SESSION['adminId'] = $staff['id'];
		}
	}
	$users = findAll($pdo, 'users');
	foreach ($users as $user) {
		if (sha1($_POST['password']) == $user['password'] && $_POST['username'] == $user['username']) {
			$_SESSION['loggedinUser'] = true;
			$_POST['staffName'] = $staff['first_name'] . ' ' . $staff['last_name'];
			$_SESSION['userId'] = $user['id'];
		}
	}
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser'] == true) {
	$output = loadTemplate('templates/index.html.php', []);
	$title = 'Login';
}
else {
	$output = loadTemplate('templates/login.html.php', []);
	$title = 'Login';
}
require '../../templates/layout.html.php';
?>

