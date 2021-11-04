<?php
/******************************************************
Objetivo: Arquivo para inserir novos contatos no Banco
Data: 04/11/2021
Autor: Welington Pincer
******************************************************/

//Import do arquivo de conexão com o banco
require_once('../db/conexaoMySQL.php');

//Função para inserir contatos
function inserirContato($arrayContato) {
    //Guardando o script de insert dntro de uma variável
    $sql = "insert into tbl_contato (nome, email, celular) values ('". $arrayContato['nome']."',
                                                                    '". $arrayContato['email']."',
                                                                    '". $arrayContato['celular']."')";
    
    //Abrindo a conexão com o Banco
    $conexao = conexaoMysql();
    
    //Mandando o script para o Banco de Dados
    if(mysqli_query($conexao, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>