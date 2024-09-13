<?php
class ClientesController {
    public function index() {
        echo "ClientesController::index chamado!<br>"; // Mensagem de depuração
        require_once __DIR__ . '/../views/clientes.php';
    }
}
