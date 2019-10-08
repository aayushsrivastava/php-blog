<div>
<span><a href="/article.php?id=<?php echo $_GET['id']; ?>"><?php
$author_name = $article_details['author']['first_name'] . " "
. $article_details['author']['last_name'];
echo $article_details['title'] ?></a><?php echo " by " . $author_name; ?></span>

<h2>Edit Article</h2>
<form action="/article.php?id=<?php echo $_GET['id']; ?>" method="post">
    Title: <input type="text" name="title" value="<?php
    echo $article_details['title']; ?>"><br>
    Content: 
    <textarea name="content"><?php 
    echo $article_details['content']; ?></textarea>
    <br>
    <input type="submit">
</form>
</div>