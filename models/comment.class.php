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
}
?>