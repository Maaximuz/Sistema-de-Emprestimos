<?php

//dev or prod
$ambiente = 'dev';

//URL da pasta root aonde os arquivos estão hospedados
if($ambiente == 'dev'){
    $main_url = "http://localhost/ATP/";
}
//else if ($ambiente == 'prod'){
    //$main_url = "https://site.com.br/projeto/";
//}

define('MAIN_URL', $main_url);

//Site Name
$site_name = 'Sistema de Empréstimo';
define('SITE_NAME', $site_name);

//Chave encriptação banco
//$encript_key = '';
//define('KEY', $site_name);