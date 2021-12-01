<?php 
/***********************************************************************************************************
Objetivo: Arquivo responsável por receber o id do Cliente e encaminhar para a função que irá excluir o dado
Data: 01/12/2021
Autor: Welington Pincer
***********************************************************************************************************/
    
//Import do arquivo de configuração de varaiveis e constantes
require_once('../functions/config.php');

//Import do arquivo para exluir no BD
require_once(SRC.'db/excluirProduto.php');

//O id esta sendo encaminhado pela index, no link que foi realizado na imagem do excluir
$idProduto = $_GET['id'];
//O nome da foto foi enviado pela index, no link do excluir
$nomeCapa = $_GET['capa'];

//Chama a função excluir e encaminha o ID que será removido do BD
if(excluirProduto($idProduto)) {
    //Apaga a foto que está na pasta dos arquivos
    unlink(SRC.NOME_DIRETORIO_FILE.$nomeCapa);
    echo("
            <script>
                alert('". MSG_EXCLUIR ."');
                window.location.href = '../admin/produtos.php';
            </script>
        ");
} else {
    echo(MSG_ERRO);
}

?>
