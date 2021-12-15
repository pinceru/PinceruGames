<?php
//Import para o start do slim php
require_once('vendor/autoload.php');

//Instanciando a classe Slim\App, essa instancia é realizada para termos acesso aos métodos da classe
$app = new \Slim\App();

//EndPoint do verbo get para os produtos
$app -> get('/produtos', function($request, $response, $args){
    
    //Import do arquivo que exibe produtos
    require_once('../../controles/exibeProduto.php');
    //Valida a existencia da chegada de dados como parametro
    //Parametro para filtrar como nome
    if(isset($request -> getQueryParams()['nome'])) {
        $nome = (string) null;
        //Recebendo o nome como parametro
        $nome = $request -> getQueryParams()['nome'];
        
        if($listDados = buscarNomeProduto($nome)) {
            if($listDadosArray = criarArray($listDados)) {
                $listDadosJSON = criarJSON($listDadosArray);
            }
        }
    } else {
        //Chama a função (na pasta controles) que vai requisitar os dados do BD
        if($listDados = exibirProdutosAPI()) {
            if($listDadosArray = criarArray($listDados)) {
                $listDadosJSON = criarJSON($listDadosArray);
            }
        }
    }
    //Validação para tratar Banco de Dados sem dados
    if($listDadosArray) {
        return $response -> withStatus(200)
                         -> withHeader('Content-Type', 'application/json')
                         -> write($listDadosJSON);
    } else {
        return $response -> withStatus(204);
    }

});

//EndPoint GET -> Retorna todos os dados de um cliente pelo id
$app -> get('/produtos/{id}', function($request, $response, $args){
    //Import do arquivo que solicita as requisições de busca no Banco de Dados
    require_once('../../controles/exibeProduto.php');
    //Recebe o id que será encaminhado na url
    $id = $args['id'];
        
    //Chama a função (na pasta controles) que vai requisitar os dados do BD
    if($listDados = buscarProdutoCategoria($id)) {
        if($listDadosArray = criarArray($listDados)) {
            $listDadosJSON = criarJSON($listDadosArray);
        }
    }
    //Validação para tratar Banco de Dados sem dados
    if($listDadosArray) {
        return $response -> withStatus(200)
                         -> withHeader('Content-Type', 'application/json')
                         -> write($listDadosJSON);
    } else {
        return $response -> withStatus(204);
    }
});

$app -> run();
?>