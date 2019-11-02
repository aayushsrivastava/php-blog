<?php
session_start();

include('../models/import.php');
$comment = new Comment();

$authorized = false;
if (isset($_SESSION['user'])) {
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
        $title = "Unauthorized access - Edit article";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
    $comment = new Comment();
    $comment->create();

    include('../utilities/redirect.php');
    $article_id = $_POST['article'];
    redirect("/article.php?id=$article_id");
}
?>