<?php
//Import do arquivo de configuração
require_once('../functions/config.php');

//Import do arquivo com a função para exibir os contatos
require_once(SRC.'controles/exibeContato.php');
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
                    Contatos
                </h1>
                    <div class="crud">
                        <div class="linhaTitulo">
                            <div class="idContato">
                                <p class="textoCrud"> ID </p>
                            </div>
                            <div class="nomeContato">
                                <p class="textoCrud"> Nome  </p>
                            </div>
                            <div class="email">
                                <p class="textoCrud"> E-mail </p>
                            </div>
                            <div class="numero">
                                <p class="textoCrud"> Celular </p>
                            </div>
                            <div class="opcoes">
                                <p class="textoCrud"> Opções </p>
                            </div>
                        </div>
                        
                        <?php
                            //Chamando a função de exibir usuarios e guardadndo numa variável
                            $contato = exibirContato();
                            
                            //Transformando os dados recebidos em um array e usando uma repetição para repeti-la 
                            while($rsContato = mysqli_fetch_assoc($contato)) {
                        ?>
                        <div class="linhaConteudo">
                            <div class="idContato">
                                <p class="textoCrud"> <?=$rsContato['id_contato']?> </p>
                            </div>
                            <div class="nomeContato">
                                <p class="textoCrud"> <?=$rsContato['nome']?> </p>
                            </div>
                            <div class="email">
                                <p class="textoCrud"> <?=$rsContato['email']?> </p>
                            </div>
                            <div class="numero">
                                <p class="textoCrud"> <?=$rsContato['celular']?> </p>
                            </div>
                            <div class="opcoes">

                                <a onclick="return confirm('Tem certeza que deseja excluir o registro do contato selecionado?');" href="../controles/deletaContato.php?id=<?=$rsContato['id_contato']?>">
                                    <img src="../img/fechar.png" class="iconCrud" title="Excluir">
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
