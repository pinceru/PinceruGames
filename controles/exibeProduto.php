<?php
/**********************************************************************************
Objetivo: Arquivo para listar ou buscar produtos cadastrados, solicitando ao Banco
Data: 30/11/2021
Autor: Welington Pincer
**********************************************************************************/
//Import do arquivo co a função de listar
require_once(SRC.'db/listarProdutos.php');
//Import do arquivo de atualizar produtos
require_once(SRC.'db/atualizarProduto.php');

//Função para exibir produtos
function exibirProdutosAPI() {
    //Chamando a função que busca os dados no Banco
    $dados = listarProdutosAPI();
    
    return $dados;
}

function exibirProdutos() {
    //Chamando a função que busca os dados no Banco
    $dados = listarProdutos();
    
    return $dados;
}

//Função para buscar o nome do produto
function buscarNomeProduto($nome) {
    $dados = buscarNome($nome);
    return $dados;
}

//Função para buscar o nome do produto
function buscarProdutoCategoria($id) {
    $dados = buscarProdutoIdCategoria($id);
    return $dados;
}

//Função para checked no checkbox e radius
function categoriaChecked($idProduto, $idCategoria) {
    $exibirDados = buscarCategoriaProduto($idProduto, $idCategoria);
    
    return $exibirDados;
}

//Função para criar um array de dados com base no retorno do Banco
function criarArray($objeto) {
    $cont = (int) 0;
    //Estrutura de repetição para pegar um objeto de dados e converter em um array
    while($rsDados = mysqli_fetch_assoc($objeto)) {
        $arrayDados[$cont] = array(
                "id" => $rsDados['id_produto'],
                "nome" => $rsDados['nome'],
                "preco" => $rsDados['preco'],
                "promocao" => $rsDados['promocao'],
                "descricao" => $rsDados['descricao'],
                "capa" => $rsDados['capa'],
                "destaque" => $rsDados['destaque'],
                "categoria" => $rsDados['categoria']
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
function criarJSON($arrayDados) {
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