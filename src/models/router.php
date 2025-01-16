<?php

class Router {
    public function run() {
        echo "Iniciando o roteamento...\n"; 

        
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : ''; 
        $url = explode('/', $url);

        
        if (empty($url[0]) || $url[0] === 'index') {
            echo "Página inicial encontrada\n"; 
            require_once __DIR__ . '/../../index.php'; 
            return;
        }

        
        $controllerName = ucfirst($url[0]) . 'Controller'; 
        $methodName = isset($url[1]) ? $url[1] : 'index'; 

        echo "Controlador: $controllerName, Método: $methodName\n"; 

        
        $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';

        
        if (file_exists($controllerPath)) {
            echo "Controlador encontrado: $controllerPath\n"; 
            require_once $controllerPath;
            $controller = new $controllerName();
            if (method_exists($controller, $methodName)) {
                echo "Método encontrado: $methodName\n"; 
                $controller->$methodName(); 
            } else {
                $this->handleError("Método $methodName não encontrado!");
            }
        } else {
            $this->handleError("Controlador $controllerName não encontrado!");
        }
    }

    private function handleError($message) {
        
        error_log($message);

        
        $errorFilePath = __DIR__ . '/../errors/error.php';
        if (file_exists($errorFilePath)) {
            include $errorFilePath;
        } else {
            echo "Erro crítico: Arquivo de erro não encontrado!";
        }
        exit;
    }
}
