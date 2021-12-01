<?php
/************************************************************
Objetivo: Arquivo para excluir produtos cadastrados no Banco
Data: 01/12/2021
Autor: Welington Pincer
************************************************************/
//Import do arquivo de conexão com o BD
require_once('../db/conexaoMySQL.php');

//Função para excluir um produto
function excluirProduto($idProduto) {
    //Guardando o script de delete dentro de uma variável
    $sql = "delete from tbl_produto where id_produto = " .$idProduto;
    
    //Chamando função que estabelece conexão com o BD
    $conexao = conexaoMysql();
    
    //Verificando se conexão foi bem sussedida
    if(mysqli_query($conexao, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>