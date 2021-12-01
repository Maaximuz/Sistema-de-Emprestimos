<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class ControllerLoan {
    
    public function loan() {
    
        $view = new LoanClientView();
        $view->loan();
    }
    
    public function dataitems() {
    
        $model = new ModelLoan();
        return $model->dataitems();
    }
    
    public function getdataloans($user_id) {
    
        $model = new ModelLoan();
        return $model->getdataloans($user_id);
    }
    
    public function addloan($id_item,$quantity_item,$dt_combined) {
    
        $model = new ModelLoan();
        $loan = $model->addloan($id_item,$quantity_item,$dt_combined);
        
        if($loan == true){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    
    public function devolution($id) {
    
        $model = new ModelLoan();
        $model->devolution($id);
    }
    
    
}