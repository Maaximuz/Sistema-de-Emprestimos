<?php

if (isset($action) && $action == 'login') {

    $controller = new Controller();
    $_SESSION['PAGE_TITLE'] = 'Login';
    $controller->login();
} elseif (!isset($action)) {

    $controller = new Controller();
    $_SESSION['PAGE_TITLE'] = 'Login';
    $controller->login();
} elseif (isset($action) && $action == 'verifylogin') {

    $controller = new LoginController();
    $_SESSION['PAGE_TITLE'] = 'Validando Login';
    $controller->verifylogin();
} elseif (isset($action) && $action == 'register') {

    $controller = new RegisterController();
    $_SESSION['PAGE_TITLE'] = 'Registrar-se';
    $controller->register();
} elseif (isset($action) && $action == 'verifyusername') {

    $controller = new RegisterController();
    $controller->verifyusername();
} elseif (isset($action) && $action == 'verifyemail') {

    $controller = new RegisterController();
    $controller->verifyemail();
} elseif (isset($action) && $action == 'termopolitica') {

    $controller = new RegisterController();
    $_SESSION['PAGE_TITLE'] = 'Termos de Uso';
    $controller->termopolitica();
} elseif (isset($action) && $action == 'registeruser') {

    $controller = new RegisterController();
    $_SESSION['PAGE_TITLE'] = 'Registrar-se';
    $controller->registeruser();
}


