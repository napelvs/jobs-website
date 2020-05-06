<?php
session_start();
require '../databaseConnection.php';
require '../functions.php';


if (isset($_POST['submit'])) {
	$criteria = [
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email_address' => $_POST['email_address'],
		'telephone' => $_POST['telephone'],
		'description' => $_POST['description']
	];
	save($pdo, 'enquiry', $criteria, 'id');
	$output = loadTemplate('../public/admin/templates/submit.html.php', ['value' => 'Enquiry']);
}
else {
	$output = loadTemplate('templates/contactus.html.php', []);
}
$title = 'Contact Us';
require '../templates/layout.html.php';
?>