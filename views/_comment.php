<form action="/comment.php" method="post">
    Comment: <textarea name="comment"></textarea>
    <?php
    $article_id = $article_details['ID'];
    echo "<input type=\"hidden\" name=\"article\" value=\"$article_id\">\n";
    ?>
    <input type="submit" value="Submit Comment">
</form>