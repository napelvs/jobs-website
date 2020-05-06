<?php
session_start();
require '../../databaseConnection.php';
require '../../functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $enquiry = findWithOneField($pdo, 'enquiry', 'id', $_GET['id']);
    $output = loadTemplate('templates/completedenquiry.html.php', ['enquiry' => $enquiry]);
    $title = 'Respond to Enquiry';
}
else {
    $output = loadTemplate('templates/login.html.php', []);
}
require '../../templates/layout.html.php';
?>
