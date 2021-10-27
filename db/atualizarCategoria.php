<?php
/*****************************************************************
Objetivo: Arquivo atualizar dados de clientes existentes no Banco
Data: 27/10/2021
Autor: Welington Pincer
*****************************************************************/

//Import do arquivo que estabalece conexão com o Banco
require_once('conexaoMySQL.php');

//Função para editar uma categoria cadastrada
function editarCategoria($categoria) {
    //Guardando o script dentro de uma variável
    $sql = "update tbl_categoria set nome = '".$categoria['nome']."' where id_categoria = " .$categoria['id_categoria'];
    
    //Abrindo conexão com o Banco
    $conexao = conexaoMysql();
    
    //Enviando o script para o DB
    if(mysqli_query($conexao, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>