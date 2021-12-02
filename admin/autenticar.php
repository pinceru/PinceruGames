<?php
//Import do arquivo de funções
require_once('../functions/config.php');
//Import do arquivo que abre conexão com o Banco
require_once('../db/conexaoMysql.php');

//Declaração de Variaveis
$login = (string) null;
$senha = (string) null;

//Recebe os dados via POST do form de login
$login = $_POST['txtLogin'];
$senha = $_POST['txtSenha'];

if($login != "" && $senha != "") {
    $sql = "select * from tbl_usuario where login = '".$login."' and senha = '".$senha."'";

    $conexao = conexaoMysql();

    $select = mysqli_query($conexao, $sql);

    if($rsUsuario = mysqli_fetch_assoc($select)) {
        //Ativa o uso de variavel de sessão 
        session_start();
        $_SESSION['nomeUsuario'] = $rsUsuario['nome'];
        $_SESSION['statusLogin'] = true;

        //Permite redirecionar para uma página
        header('location: produtos.php');
    } else {
        echo(MSG_LOGIN_INVALIDO);
    }
}
?>