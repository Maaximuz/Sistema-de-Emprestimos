<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class ControllerPermissions {

    public function permissions() {
    
        $view = new PermissionsView();
        $view->permissions();
    }
    
    public function datapermission() {
    
        $model = new ModelPermissions();
        return $model->datapermission();
    }
    
    public function inactivepermission($id) {
    
        $model = new ModelPermissions();
        return $model->inactivepermission($id);
    }
}