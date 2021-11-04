<?php
/***********************************************************
Objetivo: Arquivo para listar contatos cadastrados no Banco
Data: 04/11/2021
Autor: Welington Pincer
***********************************************************/

//Import do arquivo que abre conexão com o Banco
require_once(SRC.'db/conexaoMySQL.php');

//Criando função de listar contatos
function listarContato() {
    //Guardando o script de select dentro de uma variável
    $sql = "select * from tbl_contato order by id_contato desc";
    
    //Abrindo conexão com o BD
    $conexao = conexaoMysql();
    
    //Requisitando ao DB a execução do script e guardando isso numa variável
    $select = mysqli_query($conexao, $sql);
    
    //Retornando a variável
    return $select;
}

?>