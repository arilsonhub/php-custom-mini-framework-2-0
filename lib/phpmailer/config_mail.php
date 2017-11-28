<?php

//*************************** ARQUIVO DE CONFIGURACAO PARA ENVIO DE EMAILS AUTENTICADOS ***************************

// Seu servidor smtp
define("HOST","smtp.lineacom.com.br"); 
// habilita smtp autenticado
define("SMTPAUTH",true);
// usuário deste servidor smtp
define("USERNAME","rh@lineacom.com.br"); 
define("PASSWORD","wAw1XK8LWV"); 
//email utilizado para o envio - pode ser o mesmo de username
define("FROM_NAME","lineacom");
//Setando o idioma
define("IDIOMA","br");
//Pasta dos idiomas
define("PASTA_IDIOMA","phpMailer/language/");
?>