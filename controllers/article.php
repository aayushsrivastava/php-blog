<?php
include('../models/import.php');
$article = new Article();
$article_details = $article->read($_GET['id']);

$comment = new Comment();
$article_comments = $comment->loadArticleComments($_GET['id']);

$title = $article_details['title'];
$childView = '_article.php';
include('../views/_layout.php');
?>