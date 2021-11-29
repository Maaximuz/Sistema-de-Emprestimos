<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class ControllerProfile {

    public function profile($id) {
      $view = new ProfileView();
      $view->profile($id);
    }
    
    public function getdatauser($id) {
        
        $model = new ModelProfile();
        return $model->getdatauser($id);
    }
    
    public function verifysameemail() {
        /* Pega o usuário e senha preenchidos no formulário de registro da View */
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }

        /* Encaminha os dados a Model para que seja realizado a validação */
        $model = new ModelProfile();
        $result = $model->verifyemail($email);
        
        if($result->num_rows == 0 ){
            echo 'true';
        } else {
            echo 'false';
        }
    }
    
    public function changeinfo($id,$full_name,$email) {
        
        $model = new ModelProfile();
        $info = $model->changeinfo($id,$full_name,$email);
        
        if($info === true){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}