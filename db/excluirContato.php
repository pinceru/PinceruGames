<?php
/************************************************************
Objetivo: Arquivo para excluir contatos cadastrados no Banco
Data: 04/11/2021
Autor: Welington Pincer
************************************************************/

//Import do arquivo de conexão com o BD
require_once('../db/conexaoMySQL.php');

//Função para excluir um contato
function excluirContato($idContato) {
    //Guardando o script de delete dentro de uma variável
    $sql = "delete from tbl_contato where id_contato = " .$idContato;
    
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