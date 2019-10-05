<?php
session_start();
include('../models/import.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
    $comment = new Comment();
    $comment->create();

    include('../utilities/redirect.php');
    $article_id = $_POST['article'];
    redirect("/article.php?id=$article_id");
}
?>