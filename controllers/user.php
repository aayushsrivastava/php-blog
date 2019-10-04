<?php
include('../models/import.php');
$user = new User();
$user_details = $user->read($_GET['id']);

$title = 'User Information';
$childView = '_user.php';
include('../views/_layout.php');
?>