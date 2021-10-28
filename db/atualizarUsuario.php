<?php
/*****************************************************************
Objetivo: Arquivo atualizar dados de usuarios existentes no Banco
Data: 28/10/2021
Autor: Welington Pincer
*****************************************************************/

//Import do arquivo que estabalece conexão com o Banco
require_once('../db/conexaoMySQL.php');

//Função para editar uma categoria cadastrada
function editarUsuario($usuario) {
    //Guardando o script dentro de uma variável
    $sql = "update tbl_usuario set nome = '".$usuario['nome']."',
                                        login = '".$usuario['login']."',
                                        senha = '".$usuario['senha']."' where id_usuario = " .$usuario['id_usuario'];
    
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