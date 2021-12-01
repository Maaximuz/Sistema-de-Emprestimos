<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/ConfigDB.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ATP/Config/Strings.php';

class ModelLoan {
    
    public function getdataloans($user_id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select a.*,b.name_item from loan_item a inner join item b on b.id = a.id_item where a.user_register = '.$user_id.' and a.dt_devolution is null';
        
        $result = mysqli_query($m_con, $sql);
        
        $dataloans = array();

        while ($row = mysqli_fetch_array($result)) {
            array_push($dataloans,   [ 'id' => $row['id'],
                                        'id_item' => $row['id_item'],
                                        'quantity_loan' => $row['quantity_loan'],
                                        'dt_combined' => $row['dt_combined'],
                                        'user_register' => $row['user_register'],
                                        'dt_register' => $row['dt_register'],
                                        'name_item' => $row['name_item']
                                      ]
            );
        }
        return $dataloans;
    }
    
    public function dataitems(){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        
        $sql = 'select 	a.*,
                        case 
                        when b.quantity_loan = a.quantity_item then
                        "Sem estoque"
                        else
                        a.quantity_item 
                        end estoque
                from item a left join loan_item b on b.id_item = a.id
                group by 2';
        
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
                                            'estoque' => $row['estoque']
                                           ]
            );
        }
        return $dataitems;
    }
    
    public function addloan($id_item,$quantity_item,$dt_combined){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        $user_id = $_SESSION['user_id'];
        
        $sql = 'insert into loan_item (id_item,quantity_loan,dt_combined,user_register,dt_register) values (\''.$id_item.'\','.$quantity_item.',\''.$dt_combined.'\','.$user_id.',NOW())';
        
        $result = mysqli_query($m_con, $sql);
        
        return $result;
    }
    
    public function devolution($id){
        $db = new ConfigDB();
        $m_con = $db->conectMySqli();
        $user_id = $_SESSION['user_id'];
        
        $sql = 'update loan_item set dt_devolution = NOW() where id = '.$id;
        
        mysqli_query($m_con, $sql);
        
        header('Location: index.php?action=loan');
    }
}