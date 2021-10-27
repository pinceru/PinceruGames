<?php
//Ativando a utilização das variáveis de sessão
session_start();

//Declarando variáveis para o formulário
$nome = (string) null;
$id = (int) 0;
$modo = (string) "Cadastrar";
    
//Import do arquivo de configurção
require_once('../functions/config.php');

//Import do arquivo para exibir categoria
require_once('../controles/exibeCategoria.php');

//Verificando se existe a variável de sessão
if(isset($_SESSION['categoria'])) {
    $nome = $_SESSION['categoria']['nome'];
    $id = $_SESSION['categoria']['id_categoria'];
    $modo = "Atualizar";
    //Eliminando a variável da memória
    unset($_SESSION['categoria']);
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
                <form id="formCadastro" method="post" action="../controles/recebeCategoria.php?modo=<?=$modo?>&id=<?=$id?>" name="frmCategorias">
                    <label class="label"> Cadastre uma categoria </label>
                    <input type="text" name="txtCategoria" class="input" placeholder="Insira o nome da categoria" maxlength="50" value="<?=$nome?>">
                    <input type="submit" name="btnCategoria" value="<?=$modo?>" class="botaoCadastrar">
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
                    
                    <?php
                        //Chamando a função de exibir categoria e guardadndo numa variável
                        $categoria = exibirCategorias();
                        
                        //Transformando os dados recebidos em um array e usando uma repetição para repeti-la 
                        while($rsCategoria = mysqli_fetch_assoc($categoria)) {
                    ?>
                    
                    <div class="linhaConteudo">
                        <div class="id">
                            <p class="textoCrud"> <?=$rsCategoria['id_categoria']?></p>
                        </div>
                        <div class="nome">
                            <p class="textoCrud"> <?=$rsCategoria['nome']?> </p>
                        </div>
                        <div class="opcoes">
                            <img src="../img/pesquisar.png" class="iconCrud" title="Pesquisar">
                            
                            <a onclick="return confirm('Tem certeza que deseja excluir a categoria selecionada?');" href="../controles/excluiCategoria.php?id=<?=$rsCategoria['id_categoria']?>">
                                <img src="../img/fechar.png" class="iconCrud" title="Excluir">
                            </a>
                            
                            <a href="../controles/editaCategoria.php?id=<?=$rsCategoria['id_categoria']?>">
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
        <footer>
            <div class="rodape">
                <span>Copyright &copy; 2021 | Welington Pincer</span>
                <br>
                <span>Todos os direitos reservados - Política de privacidade</span>
            </div>
        </footer>
    </body>
</html>
