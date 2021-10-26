<?php
/************************************************************************************************************
Objetivo: Arquivo responsável por recebero id da categoria e encaminhar para a função que irá excluir o dado
Data: 26/10/2021
Autor: Welington Pincer
************************************************************************************************************/

//Import do arquivo de configuraçao de variáveis e constantes
require_once('../functions/config.php');

//Import do arquivo com a função de excluir
require_once('../db/excluirCategoria.php');

//Pegando o id pela index, no link da imagem excluir
$idCategoria = $_GET['id'];

//Chamando a função de excluir e encaminhando o id que será excluído do Banco de Dados
if(excluirCategoria($idCategoria)) {
    echo(MSG_EXCLUIR);
} else {
    echo(MSG_ERRO);
}

?>