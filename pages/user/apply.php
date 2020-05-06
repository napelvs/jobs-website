<?php
session_start();
require '../databaseConnection.php';
require '../functions.php';

if (isset($_POST['submit'])) {
	if ($_FILES['cv']['error'] == 0) {

		$parts = explode('.', $_FILES['cv']['name']);
		$extension = end($parts);
		$fileName = uniqid() . '.' . $extension;

		move_uploaded_file($_FILES['cv']['name'], 'cvs/' . $fileName);

		$criteria = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'details' => $_POST['details'],
			'jobId' => $_POST['jobId'],
			'cv' => $fileName
		];
		save($pdo, 'applicants', $criteria, 'id');

		$output = 'Your application is complete. We will contact you after the closing date.';
	}
	else {
		$output = 'There was an error uploading your CV';
	}
}
else {
	$title = 'Apply';
	$job = findWithOneField($pdo, 'job', 'id', $_GET['id']);
	$output = loadTemplate('../templates/apply.html.php', ['job' => $job]);
} 

require '../templates/layout.html.php';
?>



