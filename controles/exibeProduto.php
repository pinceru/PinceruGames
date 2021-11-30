<?php
/**********************************************************************************
Objetivo: Arquivo para listar ou buscar produtos cadastrados, solicitando ao Banco
Data: 30/11/2021
Autor: Welington Pincer
**********************************************************************************/
//Import do arquivo co a função de listar
require_once(SRC.'db/listarProdutos.php');

//Função para exibir produtos
function exibirProdutos() {
    //Chamando a função que busca os dados no Banco
    $dados = listarProdutos();
    
    return $dados;
}
?>