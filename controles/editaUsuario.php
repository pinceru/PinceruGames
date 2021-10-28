<?php
/******************************************************************************************************
Objetivo: Arquivo responsável por receber o id do usuario e encaminhar para o arquivo que vai buscá-la
Data: 28/10/2021
Autor: Welington Pincer
******************************************************************************************************/

//Import do arquivo de configurações
require_once('../functions/config.php');

//Import da função de buscar usuarios
require_once(SRC.'db/listarUsuarios.php');

//Recebendo o id do usuario pela url
$idUsuario = $_GET['id'];

//Chamando a função ara buscar categoria
$dadosUsuario = buscarUsuario($idUsuario);

//Convertendo o resultado do BD em um array
if($rsUsuario = mysqli_fetch_assoc($dadosUsuario)) {
    //Ativando as variáveis de sessão
    session_start();
    
    //Criando uma variável para guardar o array com os dados que retornou do Banco de Dados
    $_SESSION['usuario'] = $rsUsuario;
    
    //Criando um arquivo como se fosse um link no php
    header('location:../admin/usuarios.php');
} else {
    echo(MSG_ERRO);
}

?>