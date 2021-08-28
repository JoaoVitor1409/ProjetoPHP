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

        //echo $result->num_rows;

        while($item = mysqli_fetch_array($result)){
            //foreach($item as $key => $value){
                echo "<p> Nome: " . $item['UsuarioNome'] . " - Login: " . $item['UsuarioLogin'] . "</p>";
            //}
        }

    ?>

    <a href="cadastro_usuarios.php">CADASTRA-SE</a>

</body>
</html>