<?php

class Database {
    private $host = 'db'; // Nome do serviço definido no Docker Compose
    private $dbname = '10.4.0.13'; // Nome do banco definido no Docker Compose
    private $username = 'root'; // Usuário configurado
    private $password = '@S0n3p4r!!'; // Senha configurada
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
