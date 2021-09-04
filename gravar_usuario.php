<?php
    require __DIR__ . "/admin/crud.php";

    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    if($nome == ""){
        echo "Nome não pode ser Vazio";
    }else{
        $dados = [
            "UsuarioNome" => $nome,
            "UsuarioLogin" => $login,
            "UsuarioSenha" => $senha,
        ];
        if(GravarRegistro("Usuarios", $dados)){
            echo "Cadastro Realizado com Sucesso";
        };
    }


    




    /*
    require_once __DIR__ . "/conexao.php";

    //var_dump($conexao);

    //var_dump($_POST["nome"]);

    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO Usuarios(UsuarioNome, UsuarioLogin, UsuarioSenha) VALUES('$nome','$login','$senha')";

    //echo $sql;

    $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    

    if($result){
        echo "Cadastro realizado com sucesso !";
    }
    */