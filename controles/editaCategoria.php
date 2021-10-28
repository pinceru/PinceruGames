<?php
/********************************************************************************************************
Objetivo: Arquivo responsável por receber o id da categoria e encaminhar para o arquivo que vai buscá-la
Data: 27/10/2021
Autor: Welington Pincer
********************************************************************************************************/

//Import do arquivo de configurações
require_once('../functions/config.php');

//Import da função de buscar categorias
require_once(SRC.'db/listarCategorias.php');

//Recebendo o id da categoria pela url
$idCategoria = $_GET['id'];

//Chamando a função ara buscar categoria
$dadosCategoria = buscarCategoria($idCategoria);

//Convertendo o resultado do BD em um array
if($rsCategoria = mysqli_fetch_assoc($dadosCategoria)) {
    //Ativando as variáveis de sessão
    session_start();
    
    //Criando uma variável para guardar o array com os dados que retornou do Banco de Dados
    $_SESSION['categoria'] = $rsCategoria;
    
    //Criando um arquivo como se fosse um link no php
    header('location:../admin/categorias.php');
} else {
    echo(MSG_ERRO);
}

?>