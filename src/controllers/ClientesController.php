<?php
class ClientesController {
    public function index() {
        // Verifica se o formulário foi enviado para cadastrar um novo cliente
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aqui você deve adicionar a lógica para salvar o cliente
            // Exemplo:
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            // Salvar no banco de dados ou na variável

            // Redirecionar para não enviar o formulário novamente ao atualizar a página
            header("Location: /clientes");
            exit;
        }

        // Exibe o formulário de cadastro e a lista de clientes
        require_once __DIR__ . '/../views/clientes.php';
    }
}
