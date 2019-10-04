<?php
include('../models/import.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $user_id = $user->create();

    if ($user_id) {
        include('../utilities/redirect.php');
        redirect('/user.php?id=' . $user_id);
    }
}

$title = 'Create new account';
$childView = '_register.php';
include('../views/_layout.php');

if (isset($_SESSION['user'])) {
    include('../utilities/redirect.php');
    echo "lkdfkl";
    redirect('/');
}
?>