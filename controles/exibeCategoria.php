<?php
/************************************************************************************
Objetivo: Arquivo para listar ou buscar categorias cadastradas, solicitando ao Banco
Data: 26/10/2021
Autor: Welington Pincer
************************************************************************************/

//Import do arquivo co a função de listar
require_once('../db/listarCategorias.php');

//Função para exibir categorias
function exibirCategorias() {
    //Chamando a função que busca os dados no Banco
    $dados = listarCategoria();
    
    return $dados;
}

?>