<?php
session_start();
include('../models/import.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
    $article = new Article();
    $article_id = $article->create();

    if ($article_id) {
        include('../utilities/redirect.php');
        redirect('/article.php?id=' . $article_id);
    }
}

$title = 'Make a blog post';
if (!isset($_SESSION['user'])) {
    $childView = '_login_prompt.php';
} else {
    $childView = '_post.php';
}
include('../views/_layout.php');
?>