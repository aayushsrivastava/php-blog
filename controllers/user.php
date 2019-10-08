<?php
session_start();

include('../models/import.php');
$user = new User();

$authorized = false;
if (isset($_SESSION['user'])) {
    $user_profile = $_GET['id'];
    if ($user_profile === $_SESSION['user']) {
        $authorized = true;
    }
}

$user_details = $user->read($_GET['id']);

$title = 'User Information';
$childView = '_user.php';
include('../views/_layout.php');
?>