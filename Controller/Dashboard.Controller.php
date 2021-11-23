<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class ControllerDashboard {

public function dashboard() {
    
        $view = new DashboardView();
        $view->dashboard();
    }
}