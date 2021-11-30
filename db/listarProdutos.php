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
?>