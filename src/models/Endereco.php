<?php

class Endereco {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    
    public static function listarEnderecos($cliente_id) {
        $db = (new Database())->getConnection(); 

        $query = "SELECT * FROM crud_patrick_enderecos WHERE cliente_id = :cliente_id AND status = 'ativo'";

        $stmt = $db->prepare($query);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    
    public function adicionarEndereco($cliente_id, $logradouro, $numero, $bairro, $cidade, $estado, $cep, $principal) {
        
        if ($principal) {
            $this->marcarEnderecoComoPrincipal($cliente_id);
        }
 
        $query = "INSERT INTO crud_patrick_enderecos (cliente_id, logradouro, numero, bairro, cidade, estado, cep, principal)
                  VALUES (:cliente_id, :logradouro, :numero, :bairro, :cidade, :estado, :cep, :principal)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->bindParam(":logradouro", $logradouro);
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":bairro", $bairro);
        $stmt->bindParam(":cidade", $cidade);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":cep", $cep);
        $stmt->bindParam(":principal", $principal); 

        return $stmt->execute();
    }

    

    
public function save() {
    
    if ($this->id) {
        
        $query = "UPDATE crud_patrick_enderecos SET logradouro = :logradouro, numero = :numero, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, principal = :principal WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":logradouro", $this->logradouro);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":bairro", $this->bairro);
        $stmt->bindParam(":cidade", $this->cidade);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":principal", $this->principal);
        return $stmt->execute();
    } else {
        
        $query = "INSERT INTO crud_patrick_enderecos (cliente_id, logradouro, numero, bairro, cidade, estado, cep, principal) VALUES (:cliente_id, :logradouro, :numero, :bairro, :cidade, :estado, :cep, :principal)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":cliente_id", $this->cliente_id);
        $stmt->bindParam(":logradouro", $this->logradouro);
        $stmt->bindParam(":numero", $this->numero);
        $stmt->bindParam(":bairro", $this->bairro);
        $stmt->bindParam(":cidade", $this->cidade);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":cep", $this->cep);
        $stmt->bindParam(":principal", $this->principal);
        return $stmt->execute();
    }
}


public function delete() {
    $query = "UPDATE crud_patrick_enderecos SET status = 'inativo' WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(":id", $this->id);
    return $stmt->execute();
}

}
