<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelUsers {
    
    public function datauser(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select 	a.id id_user,
                        a.username,
                        a.email,
                        a.permission,
                        a.dt_register,
                        a.dt_inactive,
                        b.id id_permission,
                        b.name_permission 
                from users a 
                inner join permissions b on b.id = a.permission';
        
        $result = mysqli_query($m_con, $sql);
        
        $datauser = array();

        while ($row = mysqli_fetch_array($result)) {
            array_push($datauser,   ['id' => $row['id_user'],
                                     'username' => $row['username'],
                                     'email' => $row['email'],
                                     'permission' => $row['permission'],
                                     'dt_register' => $row['dt_register'],
                                     'dt_inactive' => $row['dt_inactive'],
                                     'id_permission' => $row['id_permission'],
                                     'name_permission' => $row['name_permission']
                                    ]
            );
        }
        
        return $datauser;
    }
    
    public function inactiveuser($id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'update users set dt_inactive = NOW() WHERE id = '.$id;
        
        $result = mysqli_query($m_con, $sql);
        
        return $result;
    }
}