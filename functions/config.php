<?php
/*********************************************************************************
Objetivo: Arquivo de configuração de constantes e variaveis utilizadas no projeto
Data: 21/10/2021
Autor: Welington Pincer
*********************************************************************************/    

//Constante da estrutura de pastas para o import
define('SRC', $_SERVER['DOCUMENT_ROOT'].'/ds2t20212/welington/ProjetoPinceruGames/');

//Variaveis e constantes para conexão com o Banco de Dados
const DB_SERVER = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = 'bcd127';
const DB_DATABASE = 'dbpincerugames';

//Mensagens de erro
const ERRO_CONEXAO = "<script> alert('Não foi possivel se conectar ao Banco de Dados. Entre em contato com o administrador.')</script>";

const ERRO_CAIXA_VAZIA = "<script> alert('Não foi possivel realizar o cadastro no Banco de Dados, pois existem campos obrigatórios à serem preenchidos.');
window.history.back();</script>";

const ERRO_SENHA = "<script> alert('As senhas informadas devem ser iguais.');
window.history.back();</script>";

const ERRO_MAXLENGTH = "<script> alert('Não foi possivel realizar o cadastro no Banco de Dados, pois algum campo excedeu o número de caractéres permitidos.');
window.history.back();</script>";

const ERRO_MINLENGTH = "<script> alert('Senha muito curta!');
window.history.back();</script>";

const MSG_CADASTRO_SUCESSO = 'Cadastro realizado com sucesso!';

const MSG_ERRO = "<script> alert('Não foi possivel realizar o cadastro no Banco de Dados.');
window.history.back();</script>";

const MSG_EXCLUIR = 'Registro excluido com sucesso do Banco de Dados';

const MSG_ATUALIZADO_SUCESSO = 'Cadastro atualizado com sucesso!';
?>