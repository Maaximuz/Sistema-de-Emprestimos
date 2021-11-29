<?php

class ProfileView {
  
    public function profile($id) {
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuAdmin.View.php';
            include 'Profile_Form.View.php';
            include './View/Geral/Footer.View.php';
    }
}
