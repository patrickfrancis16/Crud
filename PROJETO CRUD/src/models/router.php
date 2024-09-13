<?php
class Router {
    public function run() {
        echo VIEWS_DIR;
        // Define a rota para a página inicial
        $route = $_SERVER['REQUEST_URI'];
        echo "Rota: $route";
        if ($route == '/' || $route == '/index.php') {
            require_once VIEWS_DIR . 'index.php';
        } elseif ($route == '/404') {
            require_once VIEWS_DIR . '404.php';
        } else {
            // Se a rota não for encontrada, exibe uma mensagem de erro
            echo '<h1>Página não encontrada</h1>';
            echo '<p>A página que você está procurando não existe.</p>';
        }
    }
}