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

if ($_GET['action'] === 'edit') {
    if ($authorized) {
        $user_details = $user->read($_GET['id']);
        $title = "User settings: " . $user_details['email'];
        $childView = '_user_settings.php';
        include('../views/_layout.php');
    } else {
        $title = "Unauthorized access - User settings";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

$user_details = $user->read($_GET['id']);

$title = 'User Information';
$childView = '_user.php';
include('../views/_layout.php');
?>