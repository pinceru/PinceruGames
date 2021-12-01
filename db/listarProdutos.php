<?php
/**********************************************************
Objetivo: Arquivo para listar prdutos cadastrados no Banco
Data: 30/11/2021
Autor: Welington Pincer
**********************************************************/
//Import do arquivo de conexão
require_once(SRC.'db/conexaoMysql.php');
    
//Função para listar os produtos
function listarProdutos() {
    //Guardando o script numa variável
    $sql = "select * from tbl_produto order by id_produto desc";
    
    //Abrindo conexão com o Banco
    $conexao = conexaoMysql();
    
    //Enviando o script para o banco
    $select = mysqli_query($conexao, $sql);
    
    return $select;
}

//Função para buscar produto pelo id
function buscarProduto($idProduto) {
    //Guardando o script sql dentro de uma vatriável
    $sql = "select * from tbl_produto where id_produto = " .$idProduto;
    
    //Abrindo conexão com o banco
    $conexao = conexaoMysql();
    
    //Solicitando a execução do script ao DB
    $select = mysqli_query($conexao, $sql);
    
    return $select;
}
?>