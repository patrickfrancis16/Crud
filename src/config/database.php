<?php

class Database {
    private $host = 'db'; 
    private $dbname = '10.4.0.13'; 
    private $username = 'root'; 
    private $password = '@S0n3p4r!!'; 
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }

        return $this->conn;
    }
}
