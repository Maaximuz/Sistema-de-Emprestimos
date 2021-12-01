<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class ControllerDashboard {
    
    public function getdatauser($id) {
        
        $model = new ModelDashboard();
        return $model->getdatauser($id);
    }
    
    //ADMIN

    public function dashboard() {
    
        $view = new DashboardView();
        $view->dashboard();
    }
    
    public function gettotalitems() {
    
        $model = new ModelDashboard();
        return $model->gettotalitems();
    }
    
    public function gettotaldevolution() {
    
        $model = new ModelDashboard();
        return $model->gettotaldevolution();
    }
    
    public function gettotalloans() {
    
        $model = new ModelDashboard();
        return $model->gettotalloans();
    }
    
    public function gettotalmembers() {
    
        $model = new ModelDashboard();
        return $model->gettotalmembers();
    }
    
    
    
    //CLIENT
    
    public function dashboardclient() {
    
        $view = new DashboardClientView();
        $view->dashboardclient();
    }
    
    public function mytotalloans($id) {
    
        $model = new ModelDashboard();
        return $model->mytotalloans($id);
    }
    
    public function mytotaldevolutions($id) {
    
        $model = new ModelDashboard();
        return $model->mytotaldevolutions($id);
    }
    
    public function getdataloans($id) {
    
        $model = new ModelDashboard();
        return $model->getdataloans($id);
    }
    
    
}