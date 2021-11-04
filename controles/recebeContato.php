<?php
/*******************************************************************************
Objetivo: Arquivo responsável por receber, tratar e validar os dados de contato
Data: 04/11/2021
Autor: Welington Pincer
*******************************************************************************/

//Import do arquivo de configurações de variaveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRC.'db/inserirContato.php');

//Declaração de variáveis
$nome = (string) null;
$email = (string) null;
$celular = (string) null;

//Verificando se o botão de enviar foi pressionado
if(isset($_POST['btnEnviar'])) {
    //Resgatando os valores do formulário
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $celular = $_POST['txtCelular'];
    
    if($nome == "" || $celular == "") {
        echo(ERRO_CAIXA_VAZIA);
    } elseif(strlen($nome) > 100 || strlen($email) > 100 || strlen($celular) > 15) {
        echo(ERRO_MAXLENGTH);
    } else {
        //Criando um array com os valpores resgatados
        $arrayContato = array(
            "nome" => $nome,
            "email" => $email,
            "celular" => $celular
        );
        
        if(inserirContato($arrayContato)) {
            echo("
                <script>
                    alert('". MSG_CONTATO ."');
                    window.location.href = '../index.php';
                </script>
            ");
        } else {
            echo(MSG_ERRO);
        }
    }
}

?>