<?php
/*********************************************************************************
Objetivo: Arquivo responsável por receber, tratar e validar os dados dos produtos
Data: 11/11/2021
Autor: Welington Pincer
*********************************************************************************/

//Import do arquivo de configuração
require_once('../functions/config.php');
//Import do arquivo com a função para inserir no Banco de dados
require_once(SRC.'db/inserirProduto.php');
//Import do arquivo para atualizar produtos
require_once(SRC.'db/atualizarProduto.php');
//Import do arquivo para excluir produto
require_once(SRC.'db/excluirProduto.php');
//Import do arquivo para fazer o upload de imagens
require_once(SRC.'functions/upload.php');
//Import do arquivo para listar categoria
require_once(SRC.'controles/exibeCategoria.php');

$nome = (string) null;
$preco = (float) null;
$promocao = (float) null;
$descricao = (string) null;
$capa = (string) null;
$destaque = (int) 0;
$nameCheckbox = (string) null;
$marcacao = (string) null;

//Verificando se o id está chegando pela url
if(isset($_GET['id'])) {
    $id = (int) $_GET['id'];
} else {
    $id = 0;
}

//Verificando se a requisição foi "POST"
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txtNome'];
    $preco = $_POST['txtPreco'];
    $promocao = $_POST['txtDesconto'];
    $descricao = $_POST['txtDescricao'];
    $destaque = $_POST['rdoDestaque'];
    //Pegando o nome da foto pela index (Idéia de Welington Pincer, o menino super gênio)
    $nomeCapa= $_GET['nomecapa'];
    
    //Verificando se o odo é atualizar
    if(strtoupper($_GET['modo']) == 'ATUALIZAR') {
        //Verificando se o nome da capa é vazio
        if($_FILES['fleCapa']['name'] != "") {
            //Utilizando a função de upload 
            $capa = uploadFiles($_FILES['fleCapa']);
            //Apagando a imagem antiga 
            unlink(SRC.NOME_DIRETORIO_FILE.$nomeCapa);
        } else {
            //Se estiver vazio, então o usuario não que mudar
            $capa = $nomeCapa;
        }
    // Caso a variável modo seja 'SALVAR', então será obrigatório o upload da foto
    } else {
        //Utilizando a função de upload 
        $capa = uploadFiles($_FILES['fleCapa']);
    }
    
    //Verificando se nenhum campo está vazio
    if($nome == "" || $preco == "" || $promocao == "" || $descricao == "" || $capa == "") {
        echo(ERRO_CAIXA_VAZIA);
        //Verificando se os valores são numéricos
    } elseif(!is_numeric($preco) || !is_numeric($promocao)) {
        echo(ERRO_NAO_NUMERICO);
        //Verificando se a quantidade de caracteres do nome está no limite
    } elseif(strlen($nome) > 100) {
        echo(ERRO_MAXLENGTH);
    } else {
        $listar = listarCategoria();
			
		//Tratativa para verificar se alguma catergoria foi selecionada 
		while($categoria = mysqli_fetch_assoc($listar)){
					
				$nameCheckbox = 'chk'.$categoria['id_categoria'];
		
				if(isset($_POST[$nameCheckbox])){
					$marcacao = $marcacao.'true'; 
				} else {
					$marcacao = $marcacao.'false';  
				}
			}
			
        //verificando as categorias que foram marcadas com verdadeiro ou falso	
		$qtdMarcacao = substr_count($marcacao,"true");
	
		if($qtdMarcacao == 0){
			echo(ERRO_SEM_CATEGORIA);
		} else {
        //Criando um array com os valores resgatados
        $arrayProduto = array(
            "nome" => $nome,
            "preco" => $preco,
            "promocao" => $promocao,
            "descricao" => $descricao,
            "capa" => $capa,
            "destaque" => $destaque,
            "id" => $id
        );
        
        if(strtoupper($_GET["modo"]) == "CADASTRAR") {
            if(inserirProduto($arrayProduto)) {
                $listaCategorias = listarCategoria();
					while($categoria = mysqli_fetch_assoc($listaCategorias)) {
		
						$nameCheckbox = 'chk'.$categoria['id_categoria'];

						if(isset($_POST[$nameCheckbox])){
							inserirProdutoCategoria($categoria['id_categoria']);
							}
						}
            echo("
                    <script>
                        alert('". MSG_CADASTRO_SUCESSO ."');
                        window.location.href = '../admin/produtos.php';
                    </script>
                ");
            } else {
                echo(MSG_ERRO);
            }
        } elseif(strtoupper($_GET["modo"]) == "ATUALIZAR") {
            if(editarProduto($arrayProduto)) {
                $exibirCategoria = listarCategoria();
					while($categoria1 = mysqli_fetch_assoc($exibirCategoria)){
		
						$nameCheckbox = 'chk'.$categoria1['id_categoria'];
						
						if(isset($_POST[$nameCheckbox])){
							if(!buscarCategoriaProduto($arrayProduto['id'], $categoria['id_categoria'])){
								editarProduto($arrayProduto);
								produtoCategoria($arrayProduto['id'], $categoria['id_categoria']);
							} 
						} else {
							$funcaoDeletar = buscarCategoriaProduto($arrayProduto['id'], $categoria['id_categoria']);
							if($funcaoDeletar){
								atualizarCategoriaProduto($arrayProduto['id'], $categoria['id_categoria']);
				            }
						}
				    }
                 echo("
                        <script>
                            alert('". MSG_ATUALIZADO_SUCESSO ."');
                            window.location.href = '../admin/produtos.php';
                        </script>
                    ");
            } else {
                echo(MSG_ERRO);
                }
            }
        }
    }
}

?>