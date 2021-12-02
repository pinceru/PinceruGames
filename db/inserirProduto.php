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

function pesquisarId() {
	$sql = "select id_produto from tbl_produto order by id_produto desc limit 1";
		
	 $conexao = conexaoMysql();
  
    if($select = mysqli_query($conexao, $sql)){
        return $select;
    } else {
        return false;
    }
}

function inserirProdutoCategoria($idCategoria) {
	  $idProduto = mysqli_fetch_assoc(pesquisarId());
	  $sql = "insert into tbl_produto_categoria(id_produto, id_categoria) 
                values('".$idProduto['id_produto']."', '".$idCategoria."')";
	
	$conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql)){
        return true;
    } else {
        return false;
    }
}

function produtoCategoria($idProduto, $idCategoria){
	  $sql = "insert into tbl_produto_categoria(id_produto, id_categoria) 
                    values('".$idProduto."', '".$idCategoria."')";
	
	$conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql)){
        return true;
    } else {
        return false;
    }
}

?>