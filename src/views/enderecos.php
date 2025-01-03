<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endereços</title>
</head>
<body>
    <h1>Lista de Endereços</h1>
    <table>
        <thead>
            <tr>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enderecos as $endereco): ?>
            <tr>
                <td><?php echo $endereco['logradouro']; ?></td>
                <td><?php echo $endereco['numero']; ?></td>
                <td><?php echo $endereco['bairro']; ?></td>
                <td><?php echo $endereco['cidade']; ?></td>
                <td>
                    <a href="/enderecos/delete/<?php echo $endereco['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
