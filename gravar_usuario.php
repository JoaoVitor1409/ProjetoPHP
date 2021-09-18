<?php

    sleep(2);
    
    require __DIR__ . "/admin/crud.php";

    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    if($nome == ""){
        $retorno["codigo"] = "0";
        $retorno["mensagem"] = "Nome não pode ser vazio";
    }elseif($login == ""){
        $retorno["codigo"] = "0";
        $retorno["mensagem"] = "Login não pode ser vazio";
    }elseif($senha == ""){
        $retorno["codigo"] = "0";
        $retorno["mensagem"] = "Senha não pode ser vazia";
    }    
    else{
        $dados = [
            "UsuarioNome" => $nome,
            "UsuarioLogin" => $login,
            "UsuarioSenha" => $senha,
        ];
        if(GravarRegistro("Usuarios", $dados)){
            $retorno["codigo"] = "1";
            $retorno["mensagem"] = "Usuário cadastrado com sucesso";
        };
    }   

    echo json_encode($retorno);


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