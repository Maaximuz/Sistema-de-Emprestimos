<?php

class ItemsView {
  
    public function items() {
            
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuAdmin.View.php';
            include 'Dashboard.Items.View.php';
            include './View/Geral/Footer.View.php';
    }
}