<div>
<div class="border my-2 p-2">
<p>Comment made on: <a href="/article.php?id=<?php
echo $comment_details['articleID'] ?>"><?php
echo $comment_details['article_title']; ?></a></p>
<div class="pl-3"><?php 
$comment_paras = preg_split('/\n|\r\n?/', $comment_details['comment']);
foreach($comment_paras as $paragraph) {
    if ($paragraph) {
        echo "\n\t<p>$paragraph</p>";
    }
}
echo "\n"
?></div>
</div>

<h2>Delete Comment</h2>
<form action="/comment.php?id=<?php echo $_GET['id']; ?>&amp;delete=true" method="post">
    Are your sure you want to delete the above comment?
    <br>
    <input type="submit" class="btn btn-primary" value="Yes">
</form>
</div>