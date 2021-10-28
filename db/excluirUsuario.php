<?php
/************************************************************
Objetivo: Arquivo para excluir usuarios cadastrados no Banco
Data: 28/10/2021
Autor: Welington Pincer
************************************************************/

//Import do arquivo de conexão com o BD
require_once('../db/conexaoMySQL.php');

//Função para excluir um usuario
function excluirUsuario($idUsuario) {
    //Guardando o script de delete dentro de uma variável
    $sql = "delete from tbl_usuario where id_usuario = " .$idUsuario;
    
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