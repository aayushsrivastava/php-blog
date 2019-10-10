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
        $title = "User settings - " . $user_details['email'];
        $childView = '_user_settings.php';
        include('../views/_layout.php');
    } else {
        $title = "Unauthorized access - User settings";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

if ($_GET['action'] === 'delete') {
    if ($authorized) {
        $user_details = $user->read($_GET['id']);
        $title = "Delete Account - " . $user_details['email'];
        $childView = '_delete_account.php';
        include('../views/_layout.php');
    } else {
        $title = "Unauthorized access - Delete account";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

if ($_GET['action'] === 'change_password') {
    if ($authorized) {
        $user_details = $user->read($_GET['id']);
        $title = "Change Password - " . $user_details['email'];
        $childView = '_change_password.php';
        include('../views/_layout.php');
    } else {
        $title = 'Unauthorized access - Change password';
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($authorized) {
        include('../utilities/redirect.php');
        if ($_GET['delete'] === 'true') {
            $user->delete();
            redirect('/');
        }
        else if ($_GET['change_password'] === true) {
            $user->update_password();
            redirect("/user.php?id=" . $_GET['id']);
        } else {
            $user->update();
            redirect("/user.php?id=" . $_GET['id']);
        }
    }
}

$user_details = $user->read($_GET['id']);

$title = 'User Information';
$childView = '_user.php';
include('../views/_layout.php');
?>