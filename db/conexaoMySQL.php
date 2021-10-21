<?php
/**********************************************************************
Objetivo: Arquivo criado para estabelecer conexão com o Banco de Dados
Data: 21/10/2021
Autor: Welington Pincer
**********************************************************************/    

//Abrindo a conexão com o Banco de Dados
function conexaoMysql() {
    //Declaração de variaveis para a conexão com o Banco
    $server = (string) DB_SERVER;
    $user = (string) DB_USER;
    $password = (string) DB_PASSWORD;
    $database = (string) DB_DATABASE;
    
    //Criando a variavel conexão e verificando se todos os dados foram recebidos
    if($conexao = mysqli_connect($server, $user, $password, $database)) {
        return $conexao;
    } else {
        echo(ERRO_CONEXAO);
        return false;
    }
}

?>