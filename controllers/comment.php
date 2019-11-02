<?php
session_start();

include('../models/import.php');
$comment = new Comment();

$authorized = false;
if (isset($_SESSION['user']) && isset($_GET['id'])) {
    $comment_user = $comment->get_user($_GET['id']);
    if ($comment_user === $_SESSION['user']) {
        $authorized = true;
    }
}

if ($_GET['action'] === 'edit') {
    if ($authorized) {
        $comment_details = $comment->read($_GET['id']);
        $title = "Edit comment";
        $childView = '_edit_comment.php';
        include("../views/_layout.php");
    } else {
        $title = "Unauthorized access - Edit comment";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

if ($_GET['action'] === 'delete') {
    if ($authorized) {
        $comment_details = $comment->read($_GET['id']);
        $title = "Delete comment";
        $childView = '_delete_comment.php';
        include('../views/_layout.php');
    } else {
        $title = "Unauthorized access - Delete comment";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

//update/delete request on a particular comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    if ($authorized) {
        include('../utilities/redirect.php');
        $article_id = $comment->read($_GET['id'])['articleID'];
        if ($_GET['delete'] === 'true') {
            $comment->delete($_GET['id']);
        } else {
            $comment->update($_GET['id']);
        }
        redirect("/article.php?id=$article_id");
    }
    die();
}

//create request for a new comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
    $comment->create();

    include('../utilities/redirect.php');
    $article_id = $_POST['article'];
    redirect("/article.php?id=$article_id");
}
?>