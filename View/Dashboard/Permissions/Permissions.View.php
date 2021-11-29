<?php

class PermissionsView {
  
    public function permissions() {
            
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuAdmin.View.php';
            include 'Dashboard.Permissions.View.php';
            include './View/Geral/Footer.View.php';
    }
}