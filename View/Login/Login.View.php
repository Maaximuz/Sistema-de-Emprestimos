<?php

class LoginView {
  
    public function login() {
	
//        if($validacao == '2'){
//
////            $home = new HomeView();
////            $home->home();
//            
//
//        }else{
            
            include './View/Geral/Top.View.php';
            include 'Login_Form.View.php';
            include './View/Geral/Footer.View.php';
                   
//        }
    }
}
