<div>
<h1>PHP-Blog-Demo</h1>
<div id="blogs">
<?php
foreach ($all_articles as $article) {
    $article_id = $article['ID'];
    $article_title = $article['title'];
    $article_author = $article['first_name']
        . ' ' . $article['last_name'];
    $author_id = $article['userID'];
    $article_date = $article['creation_date'];

    echo "<div><a href='/article.php?id=$article_id'>
    <h2>$article_title</h2></a>
    <span> by <a href='/user.php?id=$author_id'>$article_author</a></span>
    <span> on $article_date</span>
    </div>";
}
?>

</div>
<div>