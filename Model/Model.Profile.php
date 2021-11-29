<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelProfile {
    
    public function getdatauser($id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select a.*,b.name_permission from users a inner join permissions b on b.id = a.permission where a.id = '.$id;  
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $username = $row['username'];
            $full_name = $row['full_name'];
            $email = $row['email'];
            $dt_register = $row['dt_register'];
            $name_permission = $row['name_permission'];
        }
        return $result;
    }
    
    public function changeinfo($id,$full_name,$email){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'update users set full_name = \''.$full_name.'\', email = \''.$email.'\' where id = '.$id;  
        
        $result = mysqli_query($m_con, $sql);
        
        return $result;
    }
}