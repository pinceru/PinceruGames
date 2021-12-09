<?php
//Import para o start do slim php
require_once('vendor/autoload.php');

//Instanciando a classe Slim\App, essa instancia é realizada para termos acesso aos métodos da classe
$app = new \Slim\App();

//EndPoint do verbo get para os produtos
$app -> get('/categorias', function($request, $response, $args){
    
    //Import do arquivo que exibe produtos
    require_once('../../controles/exibeCategoria.php');
        //Chama a função (na pasta controles) que vai requisitar os dados do BD
        if($listDados = exibirCategorias()) {
            if($listDadosArray = criarArrayCategoria($listDados)) {
                $listDadosJSON = criarJSONCategoria($listDadosArray);
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