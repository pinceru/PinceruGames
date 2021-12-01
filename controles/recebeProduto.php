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
//Import do arquivo para atualizar clientes
require_once(SRC.'db/atualizarProduto.php');
//Import do arquivo para fazer o upload de imagens
require_once(SRC.'functions/upload.php');

$nome = (string) null;
$preco = (float) null;
$promocao = (float) null;
$descricao = (string) null;
$capa = (string) null;
$destaque = (int) 0;

//Verificando se o id está chegando pela url
if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
} else {
    $id = 0;
}

//Verificando se a requisição foi "POST"
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $preco = $_POST['txtPreco'];
    $promocao = $_POST['txtDesconto'];
    $descricao = $_POST['txtDescricao'];
    $destaque = $_POST['rdoDestaque'];
    //Pegando o nome da foto pela index (Idéia de Welington Pincer, o menino super gênio)
    $nomeCapa= $_GET['nomecapa'];
    
    //Verificando se o odo é atualizar
    if(strtoupper($_GET['modo']) == 'ATUALIZAR') {
        //Verificando se o nome da capa é vazio
        if($_FILES['fleCapa']['name'] != "") {
            //Utilizando a função de upload 
            $capa = uploadFiles($_FILES['fleCapa']);
            //Apagando a imagem antiga 
            unlink(SRC.NOME_DIRETORIO_FILE.$nomeCapa);
        } else {
            //Se estiver vazio, então o usuario não que mudar
            $capa = $nomeCapa;
        }
    // Caso a variável modo seja 'SALVAR', então será obrigatório o upload da foto
    } else {
        //Utilizando a função de upload 
        $capa = uploadFiles($_FILES['fleCapa']);
    }
    
    //Verificando se nenhum campo está vazio
    if($nome == "" || $preco == "" || $promocao == "" || $descricao == "" || $capa == "") {
        echo(ERRO_CAIXA_VAZIA);
        //Verificando se os valores são numéricos
    } elseif(!is_numeric($preco) || !is_numeric($promocao)) {
        echo(ERRO_NAO_NUMERICO);
        //Verificando se a quantidade de caracteres do nome está no limite
    } elseif(strlen($nome) > 100) {
        echo(ERRO_MAXLENGTH);
    } else {
        //Criando um array com os valores resgatados
        $arrayProduto = array(
            "nome" => $nome,
            "preco" => $preco,
            "promocao" => $promocao,
            "descricao" => $descricao,
            "capa" => $capa,
            "destaque" => $destaque,
            "id" => $id
        );
        
        if(strtoupper($_GET["modo"]) == "CADASTRAR") {
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
        } elseif(strtoupper($_GET["modo"]) == "ATUALIZAR") {
            if(editarProduto($arrayProduto)) {
                echo("
                        <script>
                            alert('". MSG_ATUALIZADO_SUCESSO ."');
                            window.location.href = '../admin/produtos.php';
                        </script>
                    ");
            } else {
                echo(MSG_ERRO);
            }
        }
    }
}

?>