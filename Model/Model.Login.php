<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelLogin {
    
    public function verifylogin($username){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'SELECT id,username,password FROM users WHERE username = \''.$username.'\' LIMIT 1';
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $username = $row['username'];
            $pass = $row['password'];
        }
        return $result;
    }
}