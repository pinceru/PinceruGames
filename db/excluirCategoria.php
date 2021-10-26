<?php
/**************************************************************
Objetivo: Arquivo para excluir categorias cadastradas no Banco
Data: 26/10/2021
Autor: Welington Pincer
**************************************************************/

//Import do arquivo de conexão com o BD
require_once('conexaoMySQL.php');

//Função para excluir uma categria
function excluirCategoria($idCategoria) {
    //Guardando o script de delete dentro de uma variável
    $sql = "delete from tbl_categoria where id_categoria = " .$idCategoria;
    
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