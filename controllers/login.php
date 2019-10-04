<?php
include('../models/import.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();

    $login = $user->authenticate($_POST['email'], $_POST['password']);

    if ($login['authenticated?']) {
        session_start();
        $_SESSION['user'] = $login['id'];
        include('../utilities/redirect.php');
        redirect('/user.php?id=' . $login['id']);
    }
}

$title = 'Login';
$childView = '_login.php';
include('../views/_layout.php');

if (isset($_SESSION['user'])) {
    include('../utilities/redirect.php');
    echo "lkdfkl";
    redirect('/');
}
?>