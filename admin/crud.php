<?php

    require __DIR__ . "/conexao.php";

    function LerRegistro($tabela, $campos = "*", $condicao = null){
        //$sql = "SELECT * FROM tabela";
        $condicao_frase = ($condicao) ? $condicao = "WHERE {$condicao}" : null;

        $sql = "SELECT {$campos} FROM {$tabela} {$condicao_frase}";
        
        $resultado = Executar($sql);
        //var_dump($resultado);

        if(!mysqli_num_rows($resultado)){
            return false;
        }else{
            while($registro = mysqli_fetch_assoc($resultado)){
                $dados[] = $registro; 
            }
        }
        return $dados;
    }

    function GravarRegistro($tabela, array $dados){
        //$sql = "INSERT INTO NomeDaTabela(campo1, campo2) values('valor1', 'valor2')";

        $campos = implode(",", array_keys($dados));
        //echo $campos;
        $valores = "'" . implode("','", $dados) . "'";
        //echo $valores;

        $sql = "INSERT INTO {$tabela} ({$campos}) values ({$valores})";
        
        return Executar($sql);
    }

    function DeletarRegistro($tabela, $condicao = null){
        //$sql = "DELETE FROM NomeTabela WHERE Algo";
        $condicao = $condicao ? "WHERE {$condicao}" : null;

        $sql = "DELETE FROM {$tabela} {$condicao}";

        return Executar($sql, true);        
    }

    function AlterarRegistro($tabela, array $dados, $condicao){
            // $sql = "UPDATE NomeTabela SET campo1 = 'valor1', campo2 = 'valor2'";
            foreach ($dados as $chave => $valor) {
                $campos[] = "{$chave} = '{$valor}'";
            }

            $campos = implode(",", $campos);

            $condicao = $condicao ? "WHERE {$condicao}" : null;
            $sql = "UPDATE {$tabela} SET {$campos} {$condicao}";

            return Executar($sql, true);
    }







    function Executar($sql, $linhasAfetadas = false){
        $mysqli = AbrirConexao();
        $resultado = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        if($linhasAfetadas){
            return mysqli_affected_rows($mysqli);
        }

        FecharConexao($mysqli);

        return $resultado;
    }