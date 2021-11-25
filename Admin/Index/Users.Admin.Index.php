<?php

if (isset($action) && $action == 'users') {

    $controller = new ControllerUsers();
    $_SESSION['PAGE_TITLE'] = 'Usuários - Admin';
    $controller->users();
} elseif (isset($action) && $action == 'inactiveuser') {

    $controller = new ControllerUsers();
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $controller->inactiveuser($id);
}
