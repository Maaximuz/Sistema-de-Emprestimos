<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelPermissions {
    
    public function datapermission(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select 	a.*,
                        b.username
                from permissions a 
                inner join users b on b.id = a.user_register';
        
        $result = mysqli_query($m_con, $sql);
        
        $datapermission = array();

        while ($row = mysqli_fetch_array($result)) {
            array_push($datapermission,   [ 'id' => $row['id'],
                                            'name_permission' => $row['name_permission'],
                                            'username' => $row['username'],
                                            'dt_register' => $row['dt_register'],
                                            'user_inactive' => $row['user_inactive'],
                                            'dt_inactive' => $row['dt_inactive']
                                           ]
            );
        }
        
        return $datapermission;
    }
    
    public function inactivepermission($id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'update permissions set dt_inactive = NOW() WHERE id = '.$id;
        
        $result = mysqli_query($m_con, $sql);
        
        return $result;
    }
}