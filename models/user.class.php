<?php
class User extends Application {
    function read($id) {
        return parent::read($id, 'user');
    }

    function create() {
        //Perfrom DB operations
        $stmt = $this->conn->prepare("
        INSERT INTO user (first_name, last_name, email, password)
        VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);

        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return NULL;
        }
    }

    function authenticate($email, $password) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return ['authenticated?' => false];
        }

        $sql = "
        SELECT ID, password FROM user
        WHERE user.email = '$email'";

        $result = $this->conn->query($sql)->fetch_assoc();
        $user_password = $result['password'];
        $user_id = $result['ID'];

        return [
            'authenticated?' => ($password === $user_password),
            'id' => $user_id];
    }

    function validate_password($user_id, $given_password) {
        $sql = "
        SELECT password
        FROM user
        WHERE user.ID = $user_id";

        $result = $this->conn->query($sql)->fetch_assoc();
        $stored_password = $result['password'];

        return ($given_password === $stored_password);
    }

    function update() {
        if (!$this->validate_password($_GET['id'], $_POST['password'])) {
            return;
        }

        $stmt = $this->conn->prepare("
        UPDATE user
        SET first_name = ?, last_name = ?, email = ?
        WHERE user.ID = ?");
        $stmt->bind_param("sssi", $first_name, $last_name, $email, $user_id);

        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $user_id = $_GET['id'];

        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return NULL;
        }
    }

    function delete() {
        $stmt = $this->conn->prepare("
        DELETE FROM user
        WHERE user.ID = ?");
        $stmt->bind_param("i", $user_id);

        $user_id = $_GET['id'];

        return $stmt->execute();
    }
}

?>