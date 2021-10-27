<?php
/*********************************************************************************
Objetivo: Arquivo responsável por receber, tratar e validar os dados de categoria
Data: 21/10/2021
Autor: Welington Pincer
*********************************************************************************/

//Import do arquivo de configurações de variaveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once('../db/inserirCategoria.php');

//Omport do arquivo para atualizar dados no Banco
require_once('../db/atualizarCategoria.php');

//Declaração de variaveis
$nome = (string) null;

//Verificando se o id está chegando pela url
if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
} else {
    $id = 0;
}

//$_SERVER['REQUEST_METHOD'] - Serve para verificar qual o tipo de requisição foi encaminhada pelo form (GET / POST)
//Verificando se a requisição foi "POST"
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtCategoria'];
    
    if($nome == "") {
        echo(ERRO_CAIXA_VAZIA);
    } elseif(strlen($nome) > 50) {
        echo(ERRO_MAXLENGTH);
    } else {
    
    $categoria = array (
        "nome" => $nome,
        "id_categoria" => $id
    );
        
    if(strtoupper($_GET["modo"]) == "CADASTRAR") {
         if(inserirCategoria($categoria)) {
            echo("
                    <script>
                        alert('". MSG_CADASTRO_SUCESSO ."');
                        window.location.href = '../admin/categorias.php';
                    </script>
                ");
            } else {
                echo(MSG_ERRO);
            }
        } elseif((strtoupper($_GET["modo"]) == "ATUALIZAR")) {
            if(editarCategoria($categoria)) {
                echo("
                    <script>
                        alert('". MSG_ATUALIZADO_SUCESSO ."');
                        window.location.href = '../admin/categorias.php';
                    </script>
                ");
            } else {
                echo(MSG_ERRO);
            }
        }
    } 
}


?>