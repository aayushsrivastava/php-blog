<?php
$title = 'Create new account';
$childView = '_register.php';
include('../views/_layout.php');

include('../models/import.php');
$user = new User();
$user->create();
?>