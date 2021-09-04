<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    
    <form action="gravar_usuario.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="nome">Login:</label>
        <input type="text" name="login" required>

        <label for="nome">Senha:</label>
        <input type="password" name="senha" required>

        <input type="submit" value="SALVAR">
    </form>

</body>
</html>