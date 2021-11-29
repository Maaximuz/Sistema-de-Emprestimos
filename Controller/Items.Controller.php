<?php

foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/ATP/Model/*.php') as $filename) {
    include_once $filename;
}

class ControllerItems {

    public function items() {
    
        $view = new ItemsView();
        $view->items();
    }
    
    public function getdataitems() {
    
        $model = new ModelItem();
        return $model->getdataitems();
    }
    
    public function additem($name_item,$desc_item,$class_item,$quantity_item) {
    
        $model = new ModelItem();
        $additem = $model->additem($name_item,$desc_item,$class_item,$quantity_item);
        if($additem == true){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}