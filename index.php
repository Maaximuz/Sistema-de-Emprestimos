<?php

session_start();

/* Realiza a inclusão dos arquivos com os códigos Model, View, Controller */
foreach (glob('./Model/*.php') as $filemodel) {
    include $filemodel;
}
include_once './View/Login/Login.View.php';
include_once './View/Register/Register.View.php';
include_once './View/Termos/TermosPolitica.View.php';
include_once './View/Dashboard/Dashboard.View.php';
include_once './View/Dashboard/Users.View.php';
//include_once './View/Perfil/Perfil.View.php';
include_once './View/Home/Home.View.php';
include_once './View/Geral/Geral.View.php';
//include_once './View/Admin/Admin.View.php';
//include_once './View/Faturamento/Faturamento.View.php';
foreach (glob('./Controller/*.php') as $filecontroller) {
    include $filecontroller;
}
include_once './Config/ConfigDB.php';
include_once './Config/Strings.php';
//include_once './Functions/Cryptography.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action != 'login') {
        $_SESSION['action'] = $action;
    }
}

foreach (glob('./Admin/Index/*.php') as $fileindex) {
    include $fileindex;
}





