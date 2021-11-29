<?php

class DashboardView {
  
    public function dashboard() {
            
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuAdmin.View.php';
            include 'Dashboard.Admin.View.php';
            include './View/Geral/Footer.View.php';
    }
}