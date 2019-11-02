<form action="/comment.php" method="post">
    <label for="comment">Add a new comment:</label>
    <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
    <?php
    $article_id = $article_details['ID'];
    echo "<input type=\"hidden\" name=\"article\" value=\"$article_id\">\n";
    ?>
    <input type="submit" class="btn btn-primary" value="Submit Comment">
</form>