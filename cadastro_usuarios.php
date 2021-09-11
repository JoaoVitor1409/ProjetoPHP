<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/estilo.css" rel="stylesheet">
    <title>Formulário de Cadastro</title>
</head>
<body>
    
    <form class="form_usuario" action="gravar_usuario.php" method="POST">
    
    <div class="resposta">
        <p class="load"> <img src="img/load.gif" alt="Carregando...">Mensagem</p>
    </div>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="nome">Login:</label>
        <input type="text" name="login" required>

        <label for="nome">Senha:</label>
        <input type="password" name="senha" required>

        <input type="submit" value="SALVAR" class="btn-usuario">
    </form>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/principal.js"></script>

</body>
</html>