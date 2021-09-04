<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project PHP</title>
</head>
<body>
    <?php require_once __DIR__ . "/conexao.php";?>

    <h1>Lista de Usuários</h1>

    <?php
    
        $sql = "SELECT * FROM Usuarios";

        $result = mysqli_query($conexao, $sql);
        //var_dump($result);
        //echo $result->num_rows;
        //$item = mysqli_fetch_array($result);
        //var_dump($item);

        while($item = mysqli_fetch_array($result)){
                echo "<p> Nome: " . $item['UsuarioNome'] . " - Login: " . $item['UsuarioLogin'] . "</p>";
        }

    ?>

    <a href="cadastro_usuarios.php">CADASTRA-SE</a>


    <hr>

    <h1>Aula do dia 03/09</h1>

    <?php
/*
        include __DIR__ . "/admin/crud.php";

        $resultado = LerRegistro("Usuarios", "UsuarioNome, UsuarioLogin", "UsuarioNome = 'Joao Vitor'");
        foreach ($resultado as $key => $value) {
            //echo "A chave é {$key} com o valor de {$value['UsuarioNome']} <br>";
            echo "Nome: {$value['UsuarioNome']} - Login: {$value['UsuarioLogin']} <br>";
            
        }

        $dados = [
            "UsuarioNome" => "Martins",
            "UsuarioLogin" => "Martins123",
            "UsuarioSenha" => "Martins123"
        ];
        echo "<br>";
        if(GravarRegistro('Usuarios', $dados) == 1){
            echo "Cadastro Realizado com Sucesso";
        }


        echo "<br> Registro Afetados: " . DeletarRegistro("Usuarios", "UsuarioNome = 'Victor'");

        $dados = [
            "UsuarioNome" => "Victor",
            "UsuarioLogin" => "Victor02",
            "UsuarioSenha" => "123"
        ];

        echo "<br> Registro Afetados: " .  AlterarRegistro("Usuarios", $dados, "UsuarioNome = 'Martins'");
*/
    ?>

</body>
</html>