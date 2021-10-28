<?php
/***********************************************************
Objetivo: Arquivo para listar usuarios cadastrados no Banco
Data: 28/10/2021
Autor: Welington Pincer
***********************************************************/

//Import do arquivo que faz conexão com o Banco
require_once(SRC.'db/conexaoMysql.php');

//Criando função de listar categorias
function listarUsuario() {
    //Guardando o script de select dentro de uma variável
    $sql = "select * from tbl_usuario order by id_usuario desc";
    
    //Abrindo conexão com o BD
    $conexao = conexaoMysql();
    
    //Requisitando ao DB a execução do script e guardando isso numa variável
    $select = mysqli_query($conexao, $sql);
    
    //Retornando a variável
    return $select;
}

//Função para buscar usuario pelo id
function buscarUsuario($idUsuario) {
    //Guardando o script sql dentro de uma vatriável
    $sql = "select * from tbl_usuario where id_usuario = " .$idUsuario;
    
    //Abrindo conexão com o banco
    $conexao = conexaoMysql();
    
    //Solicitando a execução do script ao DB
    $select = mysqli_query($conexao, $sql);
    
    return $select;
}

?>