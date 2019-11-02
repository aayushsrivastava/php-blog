<div>
<div class="border my-2 p-2">
<span>Comment made by you on article: <a href="/article.php?id=<?php
echo $comment_details['articleID'];
?>"><?php
echo $comment_details['article_title'];
?></a>
</span>
</div>

<h2>Edit Comment</h2>
<form action="/comment.php?id=<?php echo $_GET['id']; ?>" method="post">
    Comment: 
    <textarea name="comment" class="form-control" rows="10"><?php
    echo $comment_details['comment']; ?>
    </textarea>
    <br>
    <input type="submit" class="btn btn-primary" value="Update comment">
</form>
</div>