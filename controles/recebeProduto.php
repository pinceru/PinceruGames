<?php
/*********************************************************************************
Objetivo: Arquivo responsável por receber, tratar e validar os dados dos produtos
Data: 11/11/2021
Autor: Welington Pincer
*********************************************************************************/

//Import do arquivo de configuração
require_once('../functions/config.php');

//Import do arquivo com a função para inserir no Banco de dados
require_once(SRC.'db/inserirProduto.php');

$nome = (string) null;
$preco = (float) null;
$promocao = (float) null;
$descricao = (string) null;
$capa = (string) null;
$destaque = (int) 0;

//Verificando se o id está chegando pela url
//if(isset($_GET['id'])) {
//    $id = (int) $_GET['id'];
//} else {
//    $id = 0;
//}

//Verificando se a requisição foi "POST"
if(isset($_POST['btnProduto'])) {
    $nome = $_POST['txtNome'];
    $preco = $_POST['txtPreco'];
    $promocao = $_POST['txtDesconto'];
    $descricao = $_POST['txtDescricao'];
    //Utilizando a função de upload 
    $capa = uploadFiles($_FILES['fleCapa']);
    
    //Verificando se nenhum campo está vazio
    if($nome == "" || $preco == "" || $promocao == "" || $descricao == "" || $capa == "") {
        echo(ERRO_CAIXA_VAZIA);
    } else {
        //Criando um array com os valores resgatados
        $arrayProduto = array(
            "nome" => $nome,
            "preco" => $preco,
            "promocao" => $promocao,
            "descricao" => $descricao,
            "capa" => $capa,
            "destaque" => $destaque
        );
        
        //Encaminhando o array para a função de inserir produto
        if(inserirProduto($arrayProduto)) {
            echo("
                    <script>
                        alert('". MSG_CADASTRO_SUCESSO ."');
                        window.location.href = '../admin/produtos.php';
                    </script>
                ");
        } else {
            echo(MSG_ERRO);
        }
    }
}

?>