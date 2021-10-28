<?php
/********************************************************
Objetivo: Arquivo para inserir novas categorias no Banco
Data: 21/10/2021
Autor: Welington Pincer
********************************************************/
    
//Import do arquivo de conexão com o Banco
require_once('../db/conexaoMysql.php');

//Função para inserir categoria no banco
function inserirCategoria($categoria){
    //Guardando o script se inserir no Banco dentro de uma variável
    $sql = "insert into tbl_categoria (nome) values ('". $categoria['nome'] ."')";
    
    //Chamando função de conexão com o Banco
    $conexao = conexaoMysql();
    
    //Enviando o scrpit sql para o db
    if(mysqli_query($conexao, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>