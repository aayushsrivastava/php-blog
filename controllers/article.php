<?php
session_start();

include('../models/import.php');
$article = new Article();

$authorized = false;
if (isset($_SESSION['user'])) {
    $article_user = $article->get_user($_GET['id']);
    if ($article_user === $_SESSION['user']) {
        $authorized = true;
    }
}

if ($_GET['action'] === 'edit') {
    if ($authorized) {
        $article_details = $article->read($_GET['id']);
        $title = "Edit article: " . $article_details;
        $childView = '_edit_article.php';
        include('../views/_layout.php');
    } else {
        $title = "Unauthorized access - Edit article";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

if ($_GET['action'] === 'delete') {
    if ($authorized) {
        $article_details = $article->read($_GET['id']);
        $title = 'Delete article: ' . $article_details['title'];
        $childView = '_delete_article.php';
        include('../views/_layout.php');
    } else {
        $title = "Unauthorized access - Delete article";
        $childView = '_unauthorized_access.php';
        include('../views/_layout.php');
    }
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($authorized) {
        include('../utilities/redirect.php');
        if ($_GET['delete'] === 'true') {
            $article->delete();
            redirect('/');
        } else {
            $article->update();
            redirect('/article.php?id=' . $_GET['id']);
        }
    }
    die();
}

$article_details = $article->read($_GET['id']);

$comment = new Comment();
$article_comments = $comment->loadArticleComments($_GET['id']);

$title = $article_details['title'];
$childView = '_article.php';
include('../views/_layout.php');
?>