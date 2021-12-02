<?php
/*******************************************************************************
Objetivo: Arquivo responsável por receber, tratar e validar os dados de usuario
Data: 28/10/2021
Autor: Welington Pincer
*******************************************************************************/

//Import do arquivo de configurações de variaveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRC.'db/inserirUsuario.php');

//Import do arquivo para atualizar dados no Banco
require_once(SRC.'db/atualizarUsuario.php');

//Declaração de variáveis
$nome = (string) null;
$login = (string) null;
$senha = (string) null;
$confirm = (string) null;
$criptografia = (string) null;

//Verificando se o id está chegando pela url
if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
} else {
    $id = 0;
}

//Verificando se a requisição foi "POST"
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Resgatando os valores do formulário
    $nome = $_POST['txtNome'];
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $confirm = $_POST['txtConfirmSenha'];
    
    //Verificando se nenhum campo está vazio
    if($nome == "" || $login == "" || $senha == "" || $confirm == "") {
        echo(ERRO_CAIXA_VAZIA);
    //Verificando se a senha está correta
    } elseif($senha != $confirm) {
        echo(ERRO_SENHA);
    //Verificando se nenhum campo ultrapassa o limite
    } elseif(strlen($nome) > 100 || strlen($login) > 100 || strlen($senha) > 20) {
        echo(ERRO_MAXLENGTH);
    //Sendo chato e vendo se a senha não é muito curta
    } elseif (strlen($senha) < 3) {
        echo(ERRO_MINLENGTH);
    } else {
        //Criptografando a senha
        //$criptografia = sha1($senha);
        
        //Criando um array com os valores resgatados 
        $arrayUsuario = array(
            "nome" => $nome,
            "login" => $login,
            "senha" => $senha,
            "id_usuario" => $id
        );
        
        if(strtoupper($_GET["modo"]) == "CADASTRAR") {
           //Encaminhando o array para a função de inserir usuarios
            if(inserirUsuario($arrayUsuario)) {
                echo("
                    <script>
                        alert('". MSG_CADASTRO_SUCESSO ."');
                        window.location.href = '../admin/usuarios.php';
                    </script>
                ");
            } else {
                echo(MSG_ERRO);
            } 
        } elseif(strtoupper($_GET["modo"]) == "ATUALIZAR") {
            if(editarUsuario($arrayUsuario)) {
                echo("
                    <script>
                        alert('". MSG_ATUALIZADO_SUCESSO ."');
                        window.location.href = '../admin/usuarios.php';
                    </script>
                ");
            } else {
                echo(MSG_ERRO);
            }
        }
    }
}

?>