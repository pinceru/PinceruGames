<?php
//Import do arquivo de configuração
require_once('../functions/config.php');

//Import do arquivo com a função para exibir os usuarios
require_once(SRC.'controles/exibeUsuario.php');

if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if(!isset($_SESSION['statusLogin']) || !$_SESSION['statusLogin'] == true) {
    header('location:index.php');
}

//Declarando variáveis para o formulário
$nome = (string) null;
$login = (string) null;
$senha = (string) null;
$id = (int) 0;
$modo = (string) "Cadastrar";

//Verificando se existe a variável de sessão
if(isset($_SESSION['usuario'])) {
    $nome = $_SESSION['usuario']['nome'];
    $login = $_SESSION['usuario']['login'];
    $senha = $_SESSION['usuario']['senha'];
    $id = $_SESSION['usuario']['id_usuario'];
    $modo = "Atualizar";
    //Eliminando a variável da memória
    unset($_SESSION['usuario']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Dashboard </title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once('header.php');
        ?>
        <main>
            <?php
                require_once('menu.php');
            ?>
            <div class="conteudoCadastro">
                <h1 class="titulo">
                    Usuarios
                </h1>
                    <form name="frmUsuario" method="post" action="../controles/recebeUsuario.php?modo=<?=$modo?>&id=<?=$id?>" id="formCadastro">
                        <div class="separarInputs">
                            <label class="label"> Nome </label>
                            <input type="text" name="txtNome" class="input" placeholder="Insira um nome" maxlength="100" value="<?=$nome?>">
                            <label class="label"> Login </label>
                            <input type="text" name="txtLogin" class="input" placeholder="Insira um login" maxlength="100" value="<?=$login?>">
                        </div>
                        <div class="separarInputs">
                            <label class="label"> Senha </label>
                            <input type="password" name="txtSenha" class="input" placeholder="Insira uma senha" maxlength="100" value="">
                            <label class="label"> Confirmar </label>
                            <input type="password" name="txtConfirmSenha" class="input" placeholder="Confirme sua senha" maxlength="100" value="">
                            <input type="submit" name="btnUsuario" value="<?=$modo?>" class="botaoCadastrar">
                        </div>
                    </form>
                    <div class="crud">
                        <div class="linhaTitulo">
                            <div class="id">
                                <p class="textoCrud"> ID </p>
                            </div>
                            <div class="nomeUsuario">
                                <p class="textoCrud"> Usuário  </p>
                            </div>
                            <div class="login">
                                <p class="textoCrud"> Login </p>
                            </div>
                            <div class="opcoes">
                                <p class="textoCrud"> Opções </p>
                            </div>
                        </div>
                        
                        <?php
                            //Chamando a função de exibir usuarios e guardadndo numa variável
                            $usuario = exibirUsuario();
                            
                            //Transformando os dados recebidos em um array e usando uma repetição para repeti-la 
                            while($rsUsuario = mysqli_fetch_assoc($usuario)) {
                        ?>
                        <div class="linhaConteudo">
                            <div class="id">
                                <p class="textoCrud"> <?=$rsUsuario['id_usuario']?> </p>
                            </div>
                            <div class="nomeUsuario">
                                <p class="textoCrud"> <?=$rsUsuario['nome']?> </p>
                            </div>
                            <div class="login">
                                <p class="textoCrud"> <?=$rsUsuario['login']?> </p>
                            </div>
                            <div class="opcoes">
                                
                                <a onclick="return confirm('Tem certeza que deseja excluir o registro do usuário selecionado?');" href="../controles/deletaUsuario.php?id=<?=$rsUsuario['id_usuario']?>">
                                    <img src="../img/fechar.png" class="iconCrud" title="Excluir">
                                </a>

                                <a href="../controles/editaUsuario.php?id=<?=$rsUsuario['id_usuario']?>">
                                    <img src="../img/opcoes.png" class="iconCrud" title="Editar">
                                </a>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </main>
        <?php
            require_once('footer.php');
        ?>
    </body>
</html>
