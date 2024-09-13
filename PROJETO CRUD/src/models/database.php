<?php
class Database {
    private $conn;

    public function __construct() {
        $servername = "db";
        $username = "myuser";
        $password = "mypassword";
        $dbname = "mydatabase";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Conexão falhou: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
