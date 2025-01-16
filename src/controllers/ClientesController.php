<?php
class ClientesController {
    public function index() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            

            
            header("Location: /clientes");
            exit;
        }

        
        require_once __DIR__ . '/../views/clientes.php';
    }
}
