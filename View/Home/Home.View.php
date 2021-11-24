<?php

class HomeView {
  
    public function home() {
	$_SESSION['PAGE_TITLE'] = 'Home';
        include './View/Geral/Top.View.php';
        include './View/Geral/Menu.View.php';
        //include './View/Geral/Modal.View.php';
        include './View/Geral/Footer.View.php';           
    }
}