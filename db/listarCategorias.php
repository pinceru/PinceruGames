<?php
/*************************************************************
Objetivo: Arquivo para listar categorias cadastradas no Banco
Data: 26/10/2021
Autor: Welington Pincer
*************************************************************/

//Import do arquivo que abre conexão com o Banco
require_once('conexaoMySQL.php');

//Criando função de listar categorias
function listarCategoria() {
    //Guardando o script de select dentro de uma variável
    $sql = "select * from tbl_categoria order by id_categoria desc";
    
    //Abrindo conexão com o BD
    $conexao = conexaoMysql();
    
    //Requisitando ao DB a execução do script e guardando isso numa variável
    $select = mysqli_query($conexao, $sql);
    
    //Retornando a variável
    return $select;
}

//Função para buscar categoria pelo id
function buscarCategoria($idCategoria) {
    //Guardando o script sql dentro de uma vatriável
    $sql = "select * from tbl_categoria where id_categoria = " .$idCategoria;
    
    //Abrindo conexão com o banco
    $conexao = conexaoMysql();
    
    //Solicitando a execução do script ao DB
    $select = mysqli_query($conexao, $sql);
    
    return $select;
}

?>