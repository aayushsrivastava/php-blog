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

    function read($id) {
        $article_details = parent::read($id, 'article');
        $author = parent::read($article_details['userID'], 'user');
        $article_details['author'] = $author;

        return $article_details;
    }

    function read_all() {
        $sql = "
        SELECT article.*, user.first_name, user.last_name
        FROM article
        LEFT JOIN user
        ON article.userID = user.ID";

        $result = parent::perform_query($sql);

        $all_records = array();
        while ($row = $result->fetch_assoc()) {
            array_unshift($all_records, $row); //newest article first
        }

        return $all_records;
    }

    function get_user($article_id) {
        $sql = "
        SELECT userID
        FROM article
        WHERE article.ID = $article_id";

        $result = parent::perform_query($sql);
        return $result->fetch_assoc()['userID'];
    }

    function update() {
        $stmt = $this->conn->prepare("
        UPDATE article
        SET title = ?, content = ?
        WHERE article.ID = ?");
        $stmt->bind_param("ssi", $title, $content, $article_id);

        $title = $_POST['title'];
        $content = $_POST['content'];
        $article_id = $_GET['id'];

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return NULL;
        }
    }

    function delete() {
        $stmt = $this->conn->prepare("
        DELETE FROM article
        WHERE article.ID = ?");
        $stmt->bind_param("i", $article_id);

        $article_id = $_GET['id'];

        return $stmt->execute();
    }
}
?>