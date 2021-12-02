<?php
/*********************************************************************************
Objetivo: Arquivo de configuração de constantes e variaveis utilizadas no projeto
Data: 21/10/2021
Autor: Welington Pincer
*********************************************************************************/    

//Constante da estrutura de pastas para o import no SENAI
//define('SRC', $_SERVER['DOCUMENT_ROOT'].'/ds2t20212/welington/ProjetoPinceruGames/');

//Constante da estrutura de pastas para o import em casa
define('SRC', $_SERVER['DOCUMENT_ROOT'].'/projetoPinceruGames/');

//Variaveis e constantes para conexão com o Banco de Dados
const DB_SERVER = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = 'bcd127';
const DB_DATABASE = 'dbpincerugames';

//Mensagens de erro
const ERRO_NAO_NUMERICO = "<script> alert('Preencha os campos numéricos, com dados numéricos.');
window.history.back();</script>";
    
const ERRO_CONEXAO = "<script> alert('Não foi possivel se conectar ao Banco de Dados. Entre em contato com o administrador.')</script>";

const ERRO_CAIXA_VAZIA = "<script> alert('Não foi possivel realizar o cadastro no Banco de Dados, pois existem campos obrigatórios à serem preenchidos.');
window.history.back();</script>";

const ERRO_SENHA = "<script> alert('As senhas informadas devem ser iguais.');
window.history.back();</script>";

const ERRO_MAXLENGTH = "<script> alert('Não foi possivel realizar o cadastro no Banco de Dados, pois algum campo excedeu o número de caractéres permitidos.');
window.history.back();</script>";

const MSG_LOGIN_INVALIDO = "<script> alert('Usúario ou senha inválidos');
window.location.back(); </script>";

const ERRO_MINLENGTH = "<script> alert('Senha muito curta!');
window.history.back();</script>";

const ERRO_SEM_CATEGORIA = "<script> alert('O produto deverá percenter a no mínino uma categoria'); window.history.back(); </script>";

const MSG_CADASTRO_SUCESSO = 'Cadastro realizado com sucesso!';

const MSG_CONTATO = 'Contato enviado com sucesso!';

const MSG_ERRO = "<script> alert('Não foi possivel realizar o cadastro no Banco de Dados.');
window.history.back();</script>";

const MSG_EXCLUIR = 'Registro excluido com sucesso do Banco de Dados';

const MSG_ATUALIZADO_SUCESSO = 'Cadastro atualizado com sucesso!';

const TAMANHO_FILE = "5120";

$extensoesPermitidas = array("image/png", "image/jpg", "image/jpeg");
define('EXTENSOES_PERMITIDAS', $extensoesPermitidas);

define('NOME_DIRETORIO_FILE', 'capaJogo/');

const ERRO_TAMANHO_ARQUIVO = "<script> alert('Não foi possivel realizar o cadastro no Banco de Dados, pois a imagem da capa excedeu o tamanho permitido.');
window.history.back();</script>";

const ERRO_UPLOAD_IMAGEM = "<script> alert('Não foi possivel realizar o upload da imagem no Banco de Dados.');
window.history.back();</script>";

const ERRO_EXTENSOES = "<script> alert('O arquivo selecionado não obedece as extensões permitdas.');
window.history.back();</script>";
?>