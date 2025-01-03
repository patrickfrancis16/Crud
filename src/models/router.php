<?php

class Router {
    public function run() {
        echo "Iniciando o roteamento...\n"; // Depuração

        // Captura a URL e divide em partes
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : ''; // Se a URL estiver vazia, não assume mais 'index'
        $url = explode('/', $url);

        // Se a URL estiver vazia ou for 'index', exibe a página inicial
        if (empty($url[0]) || $url[0] === 'index') {
            echo "Página inicial encontrada\n"; // Depuração
            require_once __DIR__ . '/../../index.php'; // Exibe a página inicial
            return;
        }

        // Aqui verifica se a URL contém o controlador e o método
        $controllerName = ucfirst($url[0]) . 'Controller'; // Exemplo: 'ClientesController'
        $methodName = isset($url[1]) ? $url[1] : 'index'; // Método, por padrão 'index'

        echo "Controlador: $controllerName, Método: $methodName\n"; // Depuração

        // Caminho do controlador
        $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';

        // Se o controlador existe, inclui e executa o método
        if (file_exists($controllerPath)) {
            echo "Controlador encontrado: $controllerPath\n"; // Depuração
            require_once $controllerPath;
            $controller = new $controllerName();
            if (method_exists($controller, $methodName)) {
                echo "Método encontrado: $methodName\n"; // Depuração
                $controller->$methodName(); // Chama o método do controlador
            } else {
                $this->handleError("Método $methodName não encontrado!");
            }
        } else {
            $this->handleError("Controlador $controllerName não encontrado!");
        }
    }

    private function handleError($message) {
        // Registra o erro no log, opcional
        error_log($message);

        // Exibe a página de erro
        $errorFilePath = __DIR__ . '/../errors/error.php';
        if (file_exists($errorFilePath)) {
            include $errorFilePath;
        } else {
            echo "Erro crítico: Arquivo de erro não encontrado!";
        }
        exit;
    }
}
