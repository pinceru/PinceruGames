<?php
/************************************************************************************
Objetivo: Arquivo para listar ou buscar categorias cadastradas, solicitando ao Banco
Data: 26/10/2021
Autor: Welington Pincer
************************************************************************************/

//Import do arquivo co a função de listar
require_once(SRC.'db/listarCategorias.php');

//Função para exibir categorias
function exibirCategorias() {
    //Chamando a função que busca os dados no Banco
    $dados = listarCategoria();
    
    return $dados;
}

//Função para criar um array de dados com base no retorno do Banco
function criarArrayCategoria($objeto) {
    $cont = (int) 0;
    //Estrutura de repetição para pegar um objeto de dados e converter em um array
    while($rsDados = mysqli_fetch_assoc($objeto)) {
        $arrayDados[$cont] = array(
                "id" => $rsDados['id_categoria'],
                "nome" => $rsDados['nome']
        );
        
        $cont +=1;
    }
    
    //Tratamento para validar se há dados no Banco
    if(isset($arrayDados)) {
        return $arrayDados;
    } else {
        return false;
    }
}

//Função para gerar um JSON com  base num array de dados
function criarJSONCategoria($arrayDados) {
    //Especifica no cabeçalho do PHP, que será gerado um JSON
    header("content-type:application/json");
    
    //Converte um array em json
    $listJSON = json_encode($arrayDados);
    
    if(isset($listJSON)) {
        return $listJSON;
    } else {
        return false;
    }
}
?>