<?php
class Router {
    public function run() {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'index';
        $url = explode('/', $url);

        $controllerName = ucfirst($url[0]) . 'Controller';
        $methodName = isset($url[1]) ? $url[1] : 'index';
        $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';

        if ($url[0] === 'index') {
            // Se for a página inicial, não faz nada e deixa a index.php renderizar.
            return;
        }

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $controllerName();
            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
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
