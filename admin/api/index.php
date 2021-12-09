<?php
//São permissões e configurações para a API responder em um servidor real
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Header: Content-Type');
header('Content-Type: application/json');
//Import do arquivo de configurações
require_once('../../functions/config.php');

//Declaração de variaveis
$url = (string) null;

//Cria um array com base na url até a pasta de API e guarda no índice 0 a primeira palavra após a "/"
$url = explode('/', $_GET['url']);

//Estrutura de decisão para encaminhar segundo a escolha 
switch($url[0]) {
    case 'produtos': 
        //Import do arquivo de API de produtos
        require_once('produtosAPI/index.php');
        break;
    
    case 'categorias':
        //Import do arquivo de API de categorias
        require_once('categoriasAPI/index.php');
        break;
}

?>