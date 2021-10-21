<?php
/*********************************************************************************
Objetivo: Arquivo responsável por receber, tratar e validar os dados de categoria
Data: 21/10/2021
Autor: Welington Pincer
*********************************************************************************/

//Import do arquivo de configurações de variaveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRC.'db/inserirCategoria.php');

//Declaração de variaveis
$nome = (string) null;

//$_SERVER['REQUEST_METHOD'] - Serve para verificar qual o tipo de requisição foi encaminhada pelo form (GET / POST)
//Verificando se a requisição foi "POST"
if(isset($_POST['btnCategoria'])) {
    $nome = $_POST['txtCategoria'];
    
    if($nome == "") {
        echo(ERRO_CAIXA_VAZIA);
    } elseif(strlen($nome) > 50) {
        echo(ERRO_MAXLENGTH);
    }
} else {
    //Criação da variável para a inserção
    "nome" = $nome;
}


?>