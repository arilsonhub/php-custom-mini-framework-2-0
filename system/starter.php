<?php
//Inicializa a Sessão
session_start();
//Cabeçalho para Tratamento de Acentuação
header("Content-Type: text/html; charset=UTF-8", true);
//Carregamento Automático de Classes
include('system/loader/loader.php');
//Carrega o BOOTSTRAP
include(MODELS."bootstrap.php");
//Arquivo de Funções Genéricas do Framework
include('system/util/functions.util.php');

//Instancia a classe de carregamento
$AutoLoader = new ClassAutoloader();
//Temos uma única instancia que gerencia todo o sistema
$initializer = new initializer();
?>