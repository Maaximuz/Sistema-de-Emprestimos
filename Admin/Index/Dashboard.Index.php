<?php

if (isset($action) && $action == 'dashboard') {

    $controller = new ControllerDashboard();
    $_SESSION['PAGE_TITLE'] = 'Dashboard - Admin';
    $controller->dashboard();
}