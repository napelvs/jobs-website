<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if (isset($_POST['submit'])) {
        $criteria = [
            'staffId' => $_SESSION['adminId'],
            'response' => $_POST['response'],
            'completed' => 'Y',
            'id' => $_POST['id']
        ];
        save($pdo, 'enquiry', $criteria, 'id');
        $output = loadTemplate('templates/submit.html.php', ['value' => 'Response']);
    }
    else {
        $enquiry = findWithOneField($pdo, 'enquiry', 'id', $_GET['id']);
        $output = loadTemplate('templates/respondenquiry.html.php', ['enquiry' => $enquiry]);
        $title = 'Respond to Enquiry';
    }
}
else {
    $output = loadTemplate('templates/login.html.php', []);
}
require '../../templates/layout.html.php';
?>
