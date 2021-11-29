<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelItem {
    
    public function getdataitems(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select 	a.*,
                        b.username
                from item a 
                inner join users b on b.id = a.user_register';
        
        $result = mysqli_query($m_con, $sql);
        
        $dataitems = array();

        while ($row = mysqli_fetch_array($result)) {
            array_push($dataitems,   [ 'id' => $row['id'],
                                            'name_item' => $row['name_item'],
                                            'desc_item' => $row['desc_item'],
                                            'class_item' => $row['class_item'],
                                            'quantity_item' => $row['quantity_item'],
                                            'user_register' => $row['user_register'],
                                            'dt_register' => $row['dt_register'],
                                            'username' => $row['username']
                                           ]
            );
        }
        return $dataitems;
    }
    
    public function additem($name_item,$desc_item,$class_item,$quantity_item){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        $user_id = $_SESSION['user_id'];
        
        $sql = 'insert into item (name_item,desc_item,class_item,quantity_item,user_register,dt_register) VALUES (\''.$name_item.'\',\''.$desc_item.'\',\''.$class_item.'\','.$quantity_item.','.$user_id.',NOW())';
        
        $result = mysqli_query($m_con, $sql);
        
        return $result;
    }
}