<?php
class Application {
    protected $conn;

    public function __construct() {
        include("../config.php");
        //Create connection
        $this->conn =  new mysqli($servername, $username, $password, $dbname);

        //Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
//      echo "Connection successful";
    }

    public function __destruct() {
        //Close connection
        $this->conn->close();
    }

    function read($id, $table) {
        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            return NULL;
        }

        $sql = "
        SELECT * FROM $table
        WHERE $table.ID = $id";
        $result = $this->conn->query($sql);

        return $result->fetch_assoc();
    }
}

?>