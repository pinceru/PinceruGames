<?php
//Import do arquivo de configurção
require_once('../functions/config.php');

//Import do arquivo com a função de exibir
require_once(SRC.'controles/exibeProduto.php');
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
                    Produtos
                </h1>
                <form enctype="multipart/form-data" id="formCadastro" method="post" action="../controles/recebeProduto.php" name="frmProdutos">
                    <div class="separarInputs">
                        <label class="label">
                            Nome do produto
                        </label>
                        <input type="text" name="txtNome" class="input" placeholder="Insira o nome do produto" maxlength="100" value="">
                        <label class="label">
                            Descrição
                        </label>
                        <input type="text" name="txtDescricao" class="input" placeholder="Insira a descrição do produto" value="">
                    </div>
                    <div class="separarInputs">
                        <label class="label">
                            Preço
                        </label>
                        <input type="text" name="txtPreco" class="input" placeholder="Insira o preço do produto" maxlength="10" value="">
                        <label class="label">
                            Preço desconto
                        </label>
                        <input type="text" name="txtDesconto" class="input" placeholder="Insira o valor de desconto" maxlength="10" value="">
                    </div>
                    <div class="separarInputs">
                        <label class="label">
                            Capa do jogo
                        </label>
                        <input type="file" name="fleCapa" accept="image/jpeg, image/jpg, image/png" id="labelCapa">
                        <input type="radio" name="rdoDestaque" value="0"> <span class="labelDestaque">Não destaque</span>
                        <input type="radio" name="rdoDestaque" value="1"> <span class="labelDestaque">Destaque</span>
                    </div>
                    <input type="submit" name="btnProduto" value="Cadastrar" class="botaoCadastrar">
                </form>
                <div class="crud">
                    <div class="linhaTitulo">
                        <div class="id">
                            <p class="textoCrud"> ID </p>
                        </div>
                        <div class="nome">
                            <p class="textoCrud"> Nome do produto </p>
                        </div>
                        <div class="opcoes">
                            <p class="textoCrud"> Opções </p>
                        </div>
                    </div>
                    <?php
                        //Chamando a função de exibir categoria e guardadndo numa variável
                        $produto = exibirProdutos();
                        
                        //Transformando os dados recebidos em um array e usando uma repetição para repeti-la 
                        while($rsProduto = mysqli_fetch_assoc($produto)) {
                    ?>
                    <div class="linhaConteudo">
                        <div class="id">
                            <p class="textoCrud"> <?=$rsProduto['id_produto']?> </p>
                        </div>
                        <div class="nome">
                            <p class="textoCrud"> <?=$rsProduto['nome']?> </p>
                        </div>
                        <div class="opcoes">
                            <img src="../img/pesquisar.png" class="iconCrud" title="Pesquisar">
                            
                            <a onclick="return confirm('Tem certeza que deseja excluir a categoria selecionada?');" href="../controles/deletaProduto.php?">
                                <img src="../img/fechar.png" class="iconCrud" title="Excluir">
                            </a>
                            
                            <a href="../controles/editaCategoria.php?">
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
