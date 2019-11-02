<div id="blog">
    <h2><?php echo $article_details['title']; ?></h2>
    <?php
    $author_id = $article_details['author']['ID'];
    $author_name = $article_details['author']['first_name'] . " "
        . $article_details['author']['last_name'];

    echo "<span>Written by: <a href=\"/user.php?id=$author_id\">" .
        "$author_name</a></span>\n";
    
    if ($authorized) {
        $article_id = $_GET['id'];
        echo "\t<div id=\"author-control\">\n\t\t<span>" .
        "<a href=\"/article.php?id=$article_id&amp;action=edit\">Edit" .
        "</a></span>\n\t\t<span>" .
        "<a href=\"/article.php?id=$article_id&amp;action=delete\">Delete" .
        "</a></span>\n\t</div>\n";
    }

    echo "\t<div id=\"article\">\n";

    $paragraphs = preg_split('/\n|\r\n?/', $article_details['content']);
    foreach($paragraphs as $paragraph) {
        if ($paragraph) {
            echo "\t\t<p>$paragraph</p>\n";
        }
    }
    echo "\t</div>\n";
    ?>
</div>
<div id="comments">
<h3>Comments</h3>
<?php
if (isset($_SESSION['user'])) {
    include('_comment.php');
} else {
    echo "<div>Login to comment!</div>";
}
echo "\n";
?>
<?php
foreach($article_comments as $comment) {
    $comment_author = $comment['first_name'] . ' ' . $comment['last_name'];
    $comment_content = $comment['comment'];
    $comment_date = $comment['creation_date'];
    $comment_edit = $comment['last_edit_date'];
    $comment_author_id = $comment['userID'];

    echo "<div class=\"comment-box\">\n" . 
        "\t<div class=\"comment-author\">" .
        "<a href=\"/user.php?id=$comment_author_id\">$comment_author</a>" .
        "</div>\n\t<div class=\"comment-dates\">\n\t\t". 
        "Created on: <span class=\"comment-created\">$comment_date</span>\n" .
        "\t\tLast edit: <span class=\"comment-edited\">$comment_edit</span>" .
        "\n\t</div>\n\t";
    
    if ($_SESSION['user'] === $comment['userID']) {
        $comment_id = $comment['ID'];
        echo "<div class=\"comment-control\">\n\t\t<span>" . 
        "<a href=\"/comment.php?id=$comment_id&amp;action=edit\">Edit</a>" .
        "</span>\n\t\t<span>" .
        "<a href=\"comment.php?id=$comment_id&amp;action=delete\">Delete</a>" .
        "</span>\n\t</div>\n\t";
    }

    echo "<div class=\"comment-content\">\n";
    $comment_paras = preg_split('/\n|\r\n?/', $comment_content);
    foreach($comment_paras as $paragraph) {
        if ($paragraph) {
            echo "\t\t<p>$paragraph</p>\n";
        }
    }
    echo "\t</div>\n</div>\n";
}
?>
</div>