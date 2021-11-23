<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class Controller {

    public function login() {

        /* Pega o usuário e senha preenchidos no formulário de login da View */;
//        if (isset($_POST['user'])) {
//            $usuario = $_POST['user'];
//        } else {
//            $usuario = '';
//        }
//        if (isset($_POST['password'])) {
//            $senha = $_POST['password'];
//        } else {
//            $senha = '';
//        }

        /* Encaminha os dados a Model para que seja realizado a validação */
//        $model = new Model();
//        $validacao = $model->validaLogin($usuario, $senha);

        /* Pega o resultado da validação realizada no Model e o encaminha para ser exibido pela View */
        $view = new LoginView();
        $view->login();
    }
}