<?php
/*Comentário para testar o git diff*/

//Import do arquivo de configurção
require_once('../functions/config.php');

//Import do arquivo para exibir categoria
require_once(SRC.'controles/exibeCategoria.php');

if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if(!isset($_SESSION['statusLogin']) || !$_SESSION['statusLogin'] == true) {
    header('location:index.php');
}

//Declarando variáveis para o formulário
$nome = (string) null;
$id = (int) 0;
$modo = (string) "Cadastrar";

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
        <?php
            require_once('header.php');
        ?>
        <main>
            <?php
                require_once('menu.php');
            ?>
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
        <?php
            require_once('footer.php');
        ?>
    </body>
</html>
