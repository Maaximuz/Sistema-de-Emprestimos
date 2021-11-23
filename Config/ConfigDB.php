<?php

class ConfigDB {
    
    //Mysql/MySqli
    var $m_host = '127.0.0.1:3306';
    var $m_base = 'littlethings';
    var $m_user = 'root';
    var $m_pass= '';
    
    function conectMySql(){
        try {
            $db = new ConfigDB();
            $m_conn = new mysqli($db->m_host, $db->m_user, $db->m_pass, $db->m_base);
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }
        return $m_conn;
    }
    
    function conectMySqli(){
        try{
            $db = new ConfigDB();
            $mi_conn = mysqli_connect($db->m_host, $db->m_user, $db->m_pass, $db->m_base);
        }catch(PDOException $e){
            echo ($e->getMessage());
        }
        return $mi_conn;
    }
}