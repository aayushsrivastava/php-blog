<form action="/article.php?id=<?php echo $_GET['id']; ?>" method="post">
    Title: <input type="text" name="title" value="<?php
    echo $article_details['title']; ?>"><br>
    Content: 
    <textarea name="content"><?php 
    echo $article_details['content']; ?></textarea>
    <br>
    <input type="submit">
</form>