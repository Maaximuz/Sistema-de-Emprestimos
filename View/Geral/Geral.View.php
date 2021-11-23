<?php

class GeralView {
  
    public function erro404() {
	
            include './View/Geral/Top.View.php';
            //include './View/Geral/Menu.View.php';
            //include './View/Geral/Modal.View.php';
            include './View/Geral/Pages/404.View.php';
            include './View/Geral/Footer.View.php';
                   
    }
}