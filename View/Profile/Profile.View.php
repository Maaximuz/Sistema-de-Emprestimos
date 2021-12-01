<?php

class ProfileView {
  
    public function profile($id) {
        if($_SESSION['dashboard'] == 'admin'){
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuAdmin.View.php';
            include 'Profile_Form.View.php';
            include './View/Geral/Footer.View.php';
        }else{
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuClient.View.php';
            include 'Profile_Form.View.php';
            include './View/Geral/Footer.View.php';
        }
            
    }
}
