<?php
// Carrega o autoloader para as classes
require_once __DIR__ . '/src/models/router.php';
require_once __DIR__ . '/src/config/database.php';

// Define o caminho para a pasta views/
define('VIEWS_DIR', __DIR__ . '/src/views/');

// Inicializa a conexão com o banco de dados (se necessário)
$database = new Database();

// Inicializa o roteamento da aplicação
$router = new Router();
$router->run();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Inicial</title>
</head>
<body>
    <h1>Bem-vindo ao Sistema CRUD</h1>
    <p>Escolha uma página para navegar:</p>
    <ul>
        <!-- Links para as views de clientes e produtos -->
        <li><a href="/src/views/clientes.php">Clientes</a></li>
        <li><a href="/src/views/enderecos.php">Endereços</a></li>
    </ul>
</body>
</html>
