<?php
class User extends Application {
    function read($id) {
        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            return NULL;
        }

        $sql = "
        SELECT * FROM user
        WHERE user.ID = $id";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc();
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
}

?>