<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelDashboard {
    
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
    
    public function gettotalitems(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select count(*) total_items from item';
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $total_items = $row['total_items'];
        }
        return $total_items;
    }
    
    public function gettotaldevolution(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select count(*) total_devolution from loan_item where dt_devolution is not null';
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $total_devolution = $row['total_devolution'];
        }
        return $total_devolution;
    }
    
    public function gettotalloans(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select count(*) total_loans from loan_item';
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $total_loans = $row['total_loans'];
        }
        return $total_loans;
    }
    
    public function gettotalmembers(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select count(id) total_members from users';
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $total_members = $row['total_members'];
        }
        return $total_members;
    }
    
    //CLIENT
    
    public function mytotalloans($id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select count(*) total_loans from loan_item where user_register = '.$id;
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $total_loans = $row['total_loans'];
        }
        return $total_loans;
    }
    
    public function mytotaldevolutions($id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select count(*) total_devolution from loan_item where user_register = '.$id.' and dt_devolution is not null';
        
        $result = mysqli_query($m_con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $total_devolution = $row['total_devolution'];
        }
        return $total_devolution;
    }
    
    public function getdataloans($id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select 	a.*,
                        b.name_item,
                        case
                            when a.dt_devolution is not null then
                            "Devolvido"
                            when curdate() > a.dt_combined then
                            "Atrasado"
                            when a.dt_combined = curdate() then
                            "Entregar hoje"
                            else
                            "Normal"
                        end ds_devolution,
                        a.dt_devolution
                from loan_item a
                inner join item b on b.id = a.id_item
                where a.user_register = '.$id;
        
        $result = mysqli_query($m_con, $sql);
        
        $dataloan = array();

        while ($row = mysqli_fetch_array($result)) {
            array_push($dataloan,   [ 'id' => $row['id'],
                                        'id_item' => $row['id_item'],
                                        'quantity_loan' => $row['quantity_loan'],
                                        'dt_combined' => $row['dt_combined'],
                                        'user_register' => $row['user_register'],
                                        'dt_register' => $row['dt_register'],
                                        'name_item' => $row['name_item'],
                                        'ds_devolution' => $row['ds_devolution'],
                                        'dt_devolution' => $row['dt_devolution']
                                       ]
            );
        }
        return $dataloan;
    }
    
}