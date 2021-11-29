<?php

if (isset($action) && $action == 'dashboard') {

    $controller = new ControllerDashboard();
    $_SESSION['PAGE_TITLE'] = 'Dashboard - Admin';
    $controller->dashboard();
} elseif (isset($action) && $action == 'dashboardclient') {

    $controller = new ControllerDashboard();
    $_SESSION['PAGE_TITLE'] = 'Dashboard - Cliente';
    $controller->dashboardclient();
}