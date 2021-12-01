<?php
/******************************************************************************************************
Objetivo: Arquivo responsável por receber o id do produto e encaminhar para o arquivo que vai buscá-lo
Data: 01/12/2021
Autor: Welington Pincer
******************************************************************************************************/

//Import do arquivo de configurações
require_once('../functions/config.php');

//Import da função de buscar produtos
require_once(SRC.'db/listarProdutos.php');

//Recebendo o id do produto pela url
$idProduto = $_GET['id'];

//Chamando a função ara buscar produto
$dadosProduto = buscarProduto($idProduto);

//Convertendo o resultado do BD em um array
if($rsProduto = mysqli_fetch_assoc($dadosProduto)) {
    //Ativando as variáveis de sessão
    session_start();
    
    //Criando uma variável para guardar o array com os dados que retornou do Banco de Dados
    $_SESSION['produto'] = $rsProduto;
    
    //Criando um arquivo como se fosse um link no php
    header('location:../admin/produtos.php');
} else {
    echo(MSG_ERRO);
}

?>