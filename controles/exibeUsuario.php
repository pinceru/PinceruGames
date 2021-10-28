<?php
/************************************************************************************
Objetivo: Arquivo para listar ou buscar usuarios cadastrados, solicitando ao Banco
Data: 28/10/2021
Autor: Welington Pincer
************************************************************************************/

//Import do arquivo co a função de listar
require_once(SRC.'db/listarUsuarios.php');

//Função para exibir usuarios
function exibirUsuario() {
    //Chamando a função que busca os dados no Banco
    $dados = listarUsuario();
    
    return $dados;
}

?>