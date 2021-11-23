<?php

class UsersView {
  
    public function users() {
            
            include './View/Geral/Top.View.php';
            include 'Users.View.php';
            include './View/Geral/Footer.View.php';
    }
}