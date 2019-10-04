<?php
$title = 'Login';
$childView = '_login.php';
include('../views/_layout.php');

include('../models/import.php');
$user = new User();

$login = $user->authenticate($_POST['email'], $_POST['password']);
var_dump($login);

if ($login['authenticated?']) {
    session_start();
    $_SESSION['user'] = $login['id'];
    echo "Login successful!";
} else {
    echo "Login unsuccessful";
}
?>