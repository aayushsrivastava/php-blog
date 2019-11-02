<div>
<div class="border my-2 p-2">
<span><a href="/article.php?id=<?php echo $_GET['id']; ?>"><?php
$author_name = $article_details['author']['first_name'] . " "
. $article_details['author']['last_name'];
echo $article_details['title'] ?></a><?php echo " by " . $author_name; ?></span>
</div>

<h2>Delete Article</h2>
<form action="/article.php?id=<?php echo $_GET['id']; ?>&amp;delete=true" method="post">
    Are your sure you want to delete the above article?
    <br>
    <input type="submit" class="btn btn-primary" value="Yes">
</form>
</div>