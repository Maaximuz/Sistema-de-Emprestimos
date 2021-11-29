<?php

if (isset($action) && $action == 'permissions') {

    $controller = new ControllerPermissions();
    $_SESSION['PAGE_TITLE'] = 'Permissisões - Admin';
    $controller->permissions();
} elseif (isset($action) && $action == 'inactivepermission') {

    $controller = new ControllerPermissions();
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $controller->inactivepermission($id);
}
