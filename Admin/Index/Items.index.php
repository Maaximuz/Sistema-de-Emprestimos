<?php

if (isset($action) && $action == 'items') {

    $controller = new ControllerItems();
    $_SESSION['PAGE_TITLE'] = 'Dashboard - Items';
    $controller->items();
} elseif (isset($action) && $action == 'additem') {
    
    $controller = new ControllerItems();
    if(isset($_POST['name_item'])){
        $name_item = $_POST['name_item'];
    }
    if(isset($_POST['desc_item'])){
        $desc_item = $_POST['desc_item'];
    }
    if(isset($_POST['class_item'])){
        $class_item = $_POST['class_item'];
    }
    if(isset($_POST['quantity_item'])){
        $quantity_item = $_POST['quantity_item'];
    }
    $controller->additem($name_item,$desc_item,$class_item,$quantity_item);
}