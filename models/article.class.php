<?php
class Article extends Application {
    function create() {
        $stmt = $this->conn->prepare("
        INSERT INTO article (title, content, userID)
        VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $title, $content, $user_id);

        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['user'];

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return NULL;
        }
    }
}
?>