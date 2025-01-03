<?php

class Cliente {
    private $db;
    
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // Adicionar cliente
    public function adicionarCliente($nome, $sobrenome, $data_nascimento, $sexo, $escolaridade, $profissao, $cpf, $telefone, $email) {
        $query = "INSERT INTO crud_joao_clientes (nome, sobrenome, data_nascimento, sexo, escolaridade, profissao, cpf, telefone, email)
                  VALUES (:nome, :sobrenome, :data_nascimento, :sexo, :escolaridade, :profissao, :cpf, :telefone, :email)";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobrenome);
        $stmt->bindParam(":data_nascimento", $data_nascimento);
        $stmt->bindParam(":sexo", $sexo);
        $stmt->bindParam(":escolaridade", $escolaridade);
        $stmt->bindParam(":profissao", $profissao);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    }

    // Editar cliente
    public function editarCliente($id, $nome, $sobrenome, $data_nascimento, $sexo, $escolaridade, $profissao, $cpf, $telefone, $email) {
        $query = "UPDATE crud_joao_clientes
                  SET nome = :nome, sobrenome = :sobrenome, data_nascimento = :data_nascimento, sexo = :sexo, 
                      escolaridade = :escolaridade, profissao = :profissao, cpf = :cpf, telefone = :telefone, 
                      email = :email, alterado_em = NOW()
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobrenome);
        $stmt->bindParam(":data_nascimento", $data_nascimento);
        $stmt->bindParam(":sexo", $sexo);
        $stmt->bindParam(":escolaridade", $escolaridade);
        $stmt->bindParam(":profissao", $profissao);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":telefone", $telefone);
        $stmt->bindParam(":email", $email);

        return $stmt->execute();
    }

    // Listar clientes
    public function listarClientes() {
        $query = "SELECT * FROM crud_joao_clientes WHERE status = 'ativo'";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Excluir cliente (soft delete)
    public function excluirCliente($id) {
        $query = "UPDATE crud_joao_clientes
                  SET status = 'inativo', alterado_em = NOW()
                  WHERE id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}