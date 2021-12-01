<?php
/***************************************************
Objetivo: Editar dados de Cliente no Banco de Dados
Data: 01/12/2021
Autor: Welington Pincer
****************************************************/
//Import do arquivo de conexão com bd
require_once('../db/conexaoMysql.php');

function editarProduto($arrayProduto) {
    $sql = "update tbl_produto set
                nome = '".$arrayProduto['nome']."',
                descricao = '".$arrayProduto['descricao']."',
                preco = '".$arrayProduto['preco']."',
                promocao = '".$arrayProduto['promocao']."',
                capa = '".$arrayProduto['capa']."',
                destaque = ".$arrayProduto['destaque']."
            where id_produto = ".$arrayProduto['id'];
    
    //Chamando a função que estabelece a conexão com o BD 
        $conexao = conexaoMysql();
    //Envia o script SQL para o BD
        if(mysqli_query($conexao, $sql)) {
            return true;
        } else {
            return false;
    }
}

?>