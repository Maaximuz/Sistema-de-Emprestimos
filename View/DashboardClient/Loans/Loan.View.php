<?php

class LoanClientView {
  
    public function loan() {
            
            include './View/Geral/Top.View.php';
            include './View/Geral/MenuClient.View.php';
            include 'Loan.Client.View.php';
            include './View/Geral/Footer.View.php';
    }
}