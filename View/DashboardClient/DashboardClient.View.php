<?php

class DashboardClientView {
  
    public function dashboardclient() {
            
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuClient.View.php';
            include 'Dashboard.Client.View.php';
            include './View/Geral/Footer.View.php';
    }
}