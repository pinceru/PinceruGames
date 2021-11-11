<?php
/*************************************************************
Objetivo: Arquivo responsável por realizar o upload da imagem
Data: 11/11/2021
Autor: Welington Pincer
*************************************************************/

//NÃO PRECISA DO IMPORT DE CONFIGURAÇÕES PORQUÊ A PÁGINA ONDE ESTA FUNÇÃO É CHAMADA JÁ FEZ O REQUIRE

//Função para fazer o upload da imagem
function uploadFiles($arrayFile) {
    //Declaração de variáveis
    $fotoFile = $arrayFile;
    $tamanho = (int) 0;
    $tipoArquivo = (string) null;
    $nomeArquivo = (string) null;
    $extensao = (string) null;
    $arquivoCript = (string) null;
    $foto = (string) null;    
    $arquivoTemp = (string) null;
    
    //Verificando se o arquivo existe no array
    if($fotoFile['size'] > 0 && $fotoFile['type'] != "") {
        //Recebendo, convertendo e guardando o tamanho do arquivo
        $tamanhoArquivo = $fotoFile['size']/1024;
        //Recebendo o tipo do arquivo
        $tipoArquivo = $fotoFile['type'];
        
        //Verificando se o arquivo tem o tamanho permitido
        if($tamanhoArquivo <= TAMANHO_FILE) {
            //Verificando se o array do arquivo, tem uma extensão permita
            if(in_array($fotoFile, EXTENSOES_PERMITIDAS)) {
                //Extraindo o nome do arquivo, sem extensão
                $nomeArquivo = pathinfo($fotoFile['name'], PATHINFO_FILENAME);
                //Extraindo a extensão do arquivo, sem o nome
                $extensao = pathinfo($fotoFile['name'], PATHINFO_EXTENSION);
                //Criptografando o nome do arquivo com o md5, o id unico da maquina do usuario e o momento em que o arquivo foi enviado
                $arquivoCript = md5($nomeArquivo . uniqid(time()));
                //Montando o nome do arquivo com a extensão
                $foto = $arquivoCript.".".$extensao;
                //Recebe o nome do arquivo temporário que foi gerado quando o APACHE recebeu o arquivo do form
                $arquivoTemp = $fotoFile['tmp_name'];
                //Pegando o arquivo da pasta temporária e mandando para a pasta de Capas de Jogos
                if(move_uploaded_file($arquivoTemp, SRC.NOME_DIRETORIO_FILE.$foto)) {
                    return $foto;
                } else {
                    echo(ERRO_UPLOAD_IMAGEM);
                }
            } else {
                echo(ERRO_EXTENSOES);
            }
        } else {
            echo(ERRO_TAMANHO_ARQUIVO);
        }
    }
}

?>