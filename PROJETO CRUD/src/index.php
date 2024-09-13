<?php
// Carrega o autoloader para as classes
require_once __DIR__ . '/models/database.php';
require_once __DIR__ . '/models/router.php';
require_once __DIR__ . '/config/config.php';

// Define o caminho para a pasta views/
define('VIEWS_DIR', dirname(__DIR__) . '/views/');

// Inicializa a conexão com o banco de dados (se necessário)
$database = new Database();

// Inicializa o roteamento da aplicação
$router = new Router();
$router->run();
