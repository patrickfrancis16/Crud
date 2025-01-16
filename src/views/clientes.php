<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    
    <!-- Formulário de cadastro -->
    <h2>Cadastrar Novo Cliente</h2>
    <form action="/clientes" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <br>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" required>
        <br>

        <button type="submit">Cadastrar</button>
    </form>

    <hr>

    <!-- Lista de clientes -->
    <h2>Lista de Clientes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
        </tr>
        <?php
        
        
        $clientes = [
            ['id' => 1, 'nome' => 'João', 'sobrenome' => 'Silva'],
            ['id' => 2, 'nome' => 'Maria', 'sobrenome' => 'Oliveira'],
        ];

        foreach ($clientes as $cliente) {
            echo "<tr>";
            echo "<td>{$cliente['id']}</td>";
            echo "<td>{$cliente['nome']}</td>";
            echo "<td>{$cliente['sobrenome']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
