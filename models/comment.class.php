<?php
class Comment extends Application {
    function create() {
        $stmt = $this->conn->prepare("
        INSERT INTO comment (comment, articleID, userID)
        VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $comment, $article_id, $user_id);

        $comment = $_POST['comment'];
        $article_id = $_POST['article'];
        $user_id = $_SESSION['user'];

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return NULL;
        }
    }

    function read($id) {
        //all comment attributes, user name, article title
        $comment_details = parent::read($id, 'comment');
        $author = parent::read($comment_details['userID'], 'user');
        $article = parent::read($comment_details['articleID'], 'article');

        $comment_details['author_name'] = $author['first_name'] . ' ' 
            . $author['last_name'];
        $comment_details['article_title'] = $article['title'];

        return $comment_details;
    }

    function get_user($comment_id) {
        $sql = "
        SELECT userID
        FROM comment
        WHERE comment.ID = $comment_id";

        $result = parent::perform_query($sql);
        return $result->fetch_assoc()['userID'];
    }

    //Returns all the comments made on a particular article
    function loadArticleComments($article_id) {
        $sql = "
        SELECT comment.*, user.first_name, user.last_name
        FROM comment
        LEFT JOIN user
        ON comment.userID = user.ID
        WHERE articleID = $article_id";

        $result = parent::perform_query($sql);

        $all_records = array();
        while ($row = $result->fetch_assoc()) {
            array_unshift($all_records, $row); //newest comment first
        }

        return $all_records;
    }
}
?>