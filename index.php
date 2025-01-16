<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$errorMessage = '';


require_once __DIR__ . '/src/models/router.php';
require_once __DIR__ . '/src/config/database.php';


define('VIEWS_DIR', __DIR__ . '/src/views/');


$database = new Database();


try {
    
    echo "Iniciando o roteamento...<br>";

    $router = new Router();
    $router->run(); 
} catch (Exception $e) {
    
    $errorMessage = "Erro: " . $e->getMessage();
    
    echo "Erro capturado: " . $e->getMessage() . "<br>";
}

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
        <li><a href="clientes">Clientes</a></li>
        <li><a href="/enderecos">Endereços</a></li>
    </ul>

    <?php if ($errorMessage): ?>
        <!-- Exibe a mensagem de erro, se houver -->
        <div style="color: red; font-weight: bold; margin-top: 20px;">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

</body>
</html>
