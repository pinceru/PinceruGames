<?php
/******************************************************
Objetivo: Arquivo para inserir novos produtos no Banco
Data: 11/11/2021
Autor: Welington Pincer
******************************************************/
//Import do arquivo de conexão com o banco
require_once('../db/conexaoMySQL.php');

function inserirProduto($arrayProduto) {
    //Guaradando o script em uma variável
    $sql = "insert into tbl_produto (nome, descricao, preco, promocao, capa, destaque) values (
            '". $arrayProduto['nome']."',
            '". $arrayProduto['descricao']."',
            '". $arrayProduto['preco']."',
            '". $arrayProduto['promocao']."',
            '". $arrayProduto['capa']."',
            ". $arrayProduto['destaque'].")";
    
    //Abrindo a conexão com o Banco
    $conexao = conexaoMysql();
    
    //Mandando o script para o banco
    if(mysqli_query($conexao, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>