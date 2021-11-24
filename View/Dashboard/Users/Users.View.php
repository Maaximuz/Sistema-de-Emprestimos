<?php

class UsersView {
  
    public function users() {
            
            include './View/Geral/Top.View.php';
            include './View/Geral/Menu.View.php';
            include 'Dashboard.Users.View.php';
            include './View/Geral/Footer.View.php';
    }
}