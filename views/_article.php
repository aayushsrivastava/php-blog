<div>
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