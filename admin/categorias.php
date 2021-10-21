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
        <header>
            <div id="conteudoCabecalho">
                <div id="conteudoEsquerdo">
                    <div id="linhaSuperior">
                        <div id="cms">
                            <label> C M S </label>
                        </div>
                        <div id="titulo">
                            <label> PINCERU GAMES </label>
                        </div>
                    </div>
                    <div id="linhaInferior">
                        <label> Gerenciamento do conteúdo do site</label>
                    </div>
                </div>
                <div id="conteudoDireito">
                    <img src="../img/logoMarca.PNG" id="logo" title="Logo Pinceru Games">
                </div>
            </div>
        </header>
        <main>
            <div id="faixaMenu">
                <div id="conteudoFaixaMenu">
                    <div class="itemMenu">
                        <div class="iconMenu">
                            <img src="../img/produtos.png" class="imgIcon">
                        </div>
                        <div class="opcaoMenu">
                            Adm. de Produtos
                        </div>
                    </div>
                    <a href="categorias.php">
                        <div class="itemMenu">
                            <div class="iconMenu">
                                <img src="../img/clipboard.png" class="imgIcon">
                            </div>
                            <div class="opcaoMenu">
                                Adm. de Categorias
                            </div>
                        </div>
                    </a>
                    <div class="itemMenu">
                        <div class="iconMenu">
                            <img src="../img/phone.png" class="imgIcon">
                        </div>
                        <div class="opcaoMenu">
                            Adm. de Contatos
                        </div>
                    </div>
                    <div class="itemMenu">
                        <div class="iconMenu">
                            <img src="../img/usuario.png" class="imgIcon">
                        </div>
                        <div class="opcaoMenu">
                            Adm. de Usuários
                        </div>
                    </div>
                    <div id="usuario">
                        <div id="mensagem">
                            Bem vindo(a) Wanda
                        </div>
                        <div id="imagem">
                            <img src="../img/usuario.png" id="imgPerfil">
                        </div>
                        <div id="logout">
                            Logout
                        </div>
                    </div>
                </div>
            </div>
            <div class="conteudoCadastro">
                <h1 class="titulo">
                    Categorias
                </h1>
                <form id="formCadastro" method="post" action="" name="frmCategorias">
                    <label class="label"> Cadastre uma categoria </label>
                    <input type="text" name="txtCategoria" class="input" placeholder="Insira o nome da categoria" maxlength="50">
                    <input type="submit" name="btnCategoria" value="Cadastrar" class="botaoCadastrar">
                </form>
                <div class="crud">
                    <div class="linhaTitulo">
                        <div class="id">
                            <p class="textoCrud"> ID </p>
                        </div>
                        <div class="nome">
                            <p class="textoCrud"> Nome da Categoria </p>
                        </div>
                        <div class="opcoes">
                            <p class="textoCrud"> Opções </p>
                        </div>
                    </div>
                    <div class="linhaConteudo">
                        <div class="id">
                            <p class="textoCrud"> </p>
                        </div>
                        <div class="nome">
                            <p class="textoCrud"> </p>
                        </div>
                        <div class="opcoes">
                            <img src="../img/pesquisar.png" class="iconCrud" title="Pesquisar">
                            
                            <img src="../img/fechar.png" class="iconCrud" title="Excluir">
                            
                            <img src="../img/opcoes.png" class="iconCrud" title="Editar">
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="rodape">
                <span>Copyright &copy; 2021 | Welington Pincer</span>
                <br>
                <span>Todos os direitos reservados - Política de privacidade</span>
            </div>
        </footer>
    </body>
</html>
