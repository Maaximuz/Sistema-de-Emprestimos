<?php

if (isset($action) && $action == 'users') {

    $controller = new ControllerUsers();
    $_SESSION['PAGE_TITLE'] = 'Usuários - Admin';
    $controller->users();
}
