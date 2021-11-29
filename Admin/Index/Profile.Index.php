<?php

if (isset($action) && $action == 'profile') {

    $controller = new ControllerProfile();
    $_SESSION['PAGE_TITLE'] = 'Perfil do Usuário';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $controller->profile($id);
} elseif (isset($action) && $action == 'changeinfo') {

    $controller = new ControllerProfile();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if(isset($_POST['full_name'])){
        $full_name = $_POST['full_name'];
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    $controller->changeinfo($id,$full_name,$email);
}