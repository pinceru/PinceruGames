<!DOCTYPE html>
<html lang="pt_br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Tela de Login </title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="conteudoCabecalho">
                <label id="autenticar"> AUTENTICAÇÃO </label>
            </div>
        </header>
        <main class="loginCorpo">
            <form enctype="multipart/form-data" action="autenticar.php" name="frmCadastro" method="post" id="login">
                <div class="separarInputs">
                    <label class="label"> Login </label>
                    <input type="text" name="txtLogin" value="" placeholder="Digite seu Login" maxlength="45">
                </div>
                <div class="separarInputs">
                    <label class="label"> Senha </label>
                    <input type="password" name="txtSenha" value="" placeholder="Digite sua senha" maxlength="45">
                </div>
                <input type="submit" name="btnBuscar" value="Entrar" class="botaoCadastrar">
            </form>
        </main>
        <footer>
            <?php
                require_once('footer.php');
            ?>
        </footer>
    </body>
</html>
