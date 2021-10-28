<?php
/******************************************************
Objetivo: Arquivo para inserir novos usuarios no Banco
Data: 28/10/2021
Autor: Welington Pincer
******************************************************/

//Import do arquivo de conexão com o banco
require_once('../db/conexaoMySQL.php');

//Função para inserir usuarios no Banco
function inserirUsuario($usuario) {
    //Guardando o script numa variável
    $sql = "insert into tbl_usuario (nome, login, senha) values (
            '". $usuario['nome']."',
            '". $usuario['login']."',
            '". $usuario['senha']."')";
    
    //Abrindo conexão com o Banco
    $conexao = conexaoMysql();
    
    //Mandando o script para o banco
    if(mysqli_query($conexao, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>