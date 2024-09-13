<?php
class MainController {
    public function index() {
        echo "MainController::index chamado!<br>"; // Mensagem de depuração
        require_once __DIR__ . '/../views/main.php';
    }
}
