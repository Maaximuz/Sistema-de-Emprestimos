<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class ControllerUsers {

    public function users() {
    
        $view = new UsersView();
        $view->users();
    }
    
    public function datauser() {
    
        $model = new ModelUsers();
        return $model->datauser();
    }
}