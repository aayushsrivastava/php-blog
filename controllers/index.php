<?php
include('../models/import.php');
$article = new Article();
$all_articles = $article->read_all();

$title = 'Homepage';
$childView = '_index.php';
include('../views/_layout.php');
?>