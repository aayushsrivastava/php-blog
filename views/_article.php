<div id="blog">
    <h2><?php echo $article_details['title']; ?></h2>
    <span>Written by:
    <a href="/user.php?id=<?php echo $article_details['author']['ID']; ?>">
    <?php echo $article_details['author']['first_name'] . " "
        . $article_details['author']['last_name'];
    ?></a></span>
    <?php
    $paragraphs = explode("\n", $article_details['content']);
    foreach($paragraphs as $paragraph) {
        echo "<p>$paragraph</p>";
    }
    ?>
</div>
<div id="comments">
<h3>Comments</h3>
<form action="/comment.php" method="post">
    Comment: <textarea name="comment"></textarea>
    <?php
    $article_id = $article_details['ID'];
    echo "<input type=\"hidden\" name=\"article\" value=\"$article_id\">\n";
    ?>
    <input type="submit" value="Submit Comment">
</form>
<?php
foreach($article_comments as $comment) {
    $comment_author = $comment['first_name'] . ' ' . $comment['last_name'];
    $comment_content = $comment['comment'];
    $comment_date = $comment['creation_date'];
    $comment_edit = $comment['last_edit_date'];

    echo "<div class=\"comment-box\">\n" . 
        "\t<div class=\"comment-author\">$comment_author</div>\n" .
        "\t<div class=\"comment-dates\">\n\t\t". 
        "Created on: <span class=\"comment-created\">$comment_date</span>\n" .
        "\t\tLast edit: <span class=\"comment-edited\">$comment_edit</span>" .
        "\n\t</div>\n\t<div class=\"comment-content\">\n";
    $comment_paras = explode("\n", $comment_content);
    foreach($comment_paras as $paragraph) {
        if ($paragraph) {
            echo "\t\t<p>$paragraph</p>\n";
        }
    }
    echo "\t</div>\n</div>\n";
}
?>
</div>