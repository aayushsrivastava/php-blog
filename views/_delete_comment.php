<div>
<h2>Delete Comment</h2>
<p>Comment made on <a href="/article.php?id=<?php
echo $comment_details['articleID'] ?>"><?php
echo $comment_details['article_title']; ?></a></p>
<pre><?php 
echo $comment_details['comment'];
?></pre>
<form action="/comment.php?id=<?php echo $_GET['id']; ?>&amp;delete=true" method="post">
    Are your sure you want to delete the above comment?
    <br>
    <input type="submit" value="Yes">
</form>
</div>