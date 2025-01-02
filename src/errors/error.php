<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>
</head>
<body>
    <h1>Erro!</h1>
    <p><?php echo htmlspecialchars($_GET['message'] ?? 'Ocorreu um erro inesperado.'); ?></p>
    <a href="/">Voltar à página inicial</a>
</body>
</html>
