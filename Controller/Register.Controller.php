<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class RegisterController {

    public function register() {
      $view = new RegisterView();
      $view->register();
    }
    
    public function verifyusername() {
        /* Pega o usuário e senha preenchidos no formulário de registro da View */
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }

        /* Encaminha os dados a Model para que seja realizado a validação */
        $model = new ModelRegister();
        $result = $model->verifyusername($username);
        
        if( $result->num_rows == 0 ){
            echo 'true';
        } else {
            echo 'false';    
        }
    }
    
    public function verifyemail() {
        /* Pega o usuário e senha preenchidos no formulário de registro da View */
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }

        /* Encaminha os dados a Model para que seja realizado a validação */
        $model = new ModelRegister();
        $result = $model->verifyemail($email);
        
        if($result->num_rows == 0 ){
            echo 'true';
        } else {
            echo 'false';
        }
    }
    
    public function termopolitica() {

      $view = new TermosPolitica();
      $view->termopolitica();
  }
    
    public function registeruser() {
      /* Pega o usuário e senha preenchidos no formulário de registro da View */
      if(empty($_POST['data'])){
          $username = $_POST['username'];
          $email = $_POST['email'];
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      }

      /* Encaminha os dados a Model para que seja realizado a validação */
      $model = new ModelRegister();
      $model->registeruser($username,$email,$pass);
    }
}