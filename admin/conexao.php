<?php

    require __DIR__ . "/config.php";

    function AbrirConexao(){
        $mysqli = mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die(mysqli_connect_error());
        mysqli_set_charset($mysqli, CHARSET) or die(mysqli_error($mysqli));

        return $mysqli;
    }

    function FecharConexao($mysqli){
        mysqli_close($mysqli) or die(mysqli_error($mysqli));
    }