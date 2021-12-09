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
    $sql = "select tbl_produto.*, tbl_categoria.nome as categoria from tbl_produto inner join tbl_produto_categoria
            on tbl_produto.id_produto = tbl_produto_categoria.id_produto inner join tbl_categoria
            on tbl_categoria.id_categoria = tbl_produto_categoria.id_categoria order by tbl_produto.id_produto desc";
    
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

//Função para buscar produto pelo nome
function buscarNome($nome) {
    //Guardando o script numa variável
    $sql = "select tbl_produto.*, tbl_categoria.nome as categoria from tbl_produto inner join tbl_produto_categoria
            on tbl_produto.id_produto = tbl_produto_categoria.id_produto inner join tbl_categoria
            on tbl_categoria.id_categoria = tbl_produto_categoria.id_categoria where 
            tbl_produto.nome like '%" .$nome. "%'";
    
    //Abrindo conexão com o Banco
    $conexao = conexaoMysql();
    
    //Enviando o script para o banco
    $select = mysqli_query($conexao, $sql);
    
    return $select;
}
?>