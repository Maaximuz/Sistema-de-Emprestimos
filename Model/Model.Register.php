<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelRegister {
    
    public function verifyusername($username){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'SELECT username FROM users WHERE username = \''.$username.'\'';
        
        return $result = mysqli_query($m_con, $sql);
    }
    
    public function verifyemail($email){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'SELECT email FROM users WHERE email = \''.$email.'\'';
        
        return $result = mysqli_query($m_con, $sql);
    }

    public function registeruser($username,$email,$pass){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'INSERT INTO users(username,full_name,email,password,permission,dt_register) VALUES (\''.$username.'\',NULL,\''.$email.'\',\''.$pass.'\',2,NOW()) ';
        
        mysqli_query($m_con, $sql);
    }
}