<?php
/************************************************************************************************************
Objetivo: Arquivo responsável por recebero id do contato e encaminhar para a função que irá excluir o dado
Data: 04/11/2021
Autor: Welington Pincer
************************************************************************************************************/

//Import do arquivo de configuraçao de variáveis e constantes
require_once('../functions/config.php');

//Import do arquivo com a função de excluir
require_once(SRC.'db/excluirContato.php');

//Pegando o id pela index, no link da imagem excluir
$idContato = $_GET['id'];

//Chamando a função de excluir e encaminhando o id que será excluído do Banco de Dados
if(excluirContato($idContato)) {
    echo("
            <script>
                alert('". MSG_EXCLUIR ."');
                window.location.href = '../admin/contatos.php';
            </script>
        ");
} else {
    echo(MSG_ERRO);
}

?>