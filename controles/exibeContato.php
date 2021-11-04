<?php
/************************************************************************************
Objetivo: Arquivo para listar contatos cadastrados, solicitando ao Banco
Data: 04/11/2021
Autor: Welington Pincer
************************************************************************************/

//Import do arquivo co a função de listar
require_once(SRC.'db/listarContatos.php');

//Função para exibir contato
function exibirContato() {
    //Chamando a função que busca os dados no Banco
    $dados = listarContato();
    
    return $dados;
}

?>