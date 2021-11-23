<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class LoginController {
    
    public function verifylogin() {
        /* Pega o usuário e senha preenchidos no formulário de login da View */
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }
        if(isset($_POST['pass'])){
            $password = $_POST['pass'];
        }

        /* Encaminha os dados ao Model para que seja realizado a validação */
        $model = new ModelLogin();
        $login = $model->verifylogin($username);
        
        foreach($login as $l){
            if(password_verify($password, $l['password'])){
                echo 'true';
            }else{
                echo 'false';
            }
        }
    }
}

