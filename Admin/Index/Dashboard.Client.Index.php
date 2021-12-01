<?php

if (isset($action) && $action == 'loan') {

    $controller = new ControllerLoan();
    $_SESSION['PAGE_TITLE'] = 'Dashboard - Emprestar';
    $controller->loan();
} elseif (isset($action) && $action == 'addloan') {

    $controller = new ControllerLoan();
    if(isset($_POST['item'])){
        $id_item = $_POST['item'];
    }
    if(isset($_POST['quantity_item'])){
        $quantity_item = $_POST['quantity_item'];
    }
    if(isset($_POST['dt_combined'])){
        $dt_combined = $_POST['dt_combined'];
    }
    $controller->addloan($id_item,$quantity_item,$dt_combined);
} elseif (isset($action) && $action == 'devolution') {
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $controller = new ControllerLoan();
    $controller->devolution($id);
}