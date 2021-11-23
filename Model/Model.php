<?php
foreach (glob($_SERVER['DOCUMENT_ROOT'].'/ATP/Classes/*.php') as $classfile)
{
    include_once $classfile;
}

foreach (glob($_SERVER['DOCUMENT_ROOT'].'/ATP/Config/*.php') as $classfile)
{
    include_once $classfile;
}

foreach (glob($_SERVER['DOCUMENT_ROOT'].'/ATP/Model/Sql/*.php') as $sqlfile)
{
    include_once $sqlfile;
}

class Model {
    
//    public function validaLogin($usuario,$senha) {
//        $logged_user = (new LoggedUser());
//        $db = new ConfigDB();
//        $con = $db->conectMySqli();
//        $logged = false;
//        $login_msg = 0;
//        $sql = "SELECT id, usuario, email, usu_nome, senha FROM usuarios WHERE usuario = '$usuario'";
//        $result = mysqli_query($con, $sql);
//        if ($result->num_rows == 1) {
//            while($row = mysqli_fetch_array($result)) {
//                if($row['senha'] == md5($senha)){
//                    $model = new Model();
//                    $logged = true;
//                    $login_msg = 2;           
//                    $logged_user->id = $row['id'];
//                    $logged_user->username = $row['usuario'];
//                    $logged_user->email = $row['email'];
//                    $logged_user->password = $row['senha'];
//                    $logged_user->nome = $row['usu_nome'];
//                    $logged_user->foto = $row['url_foto_perfil'];
//                    $_SESSION['LoggedUser'] = serialize($logged_user);
//                    $model->obterpermissoesusuario($row['id']);
//                }else {
//                    $logged = false;
//                    $login_msg = 1;
//                }
//            }
//        } else {
//            $logged = false;
//            $login_msg = 0;
//        }
//        return $login_msg;
//        //0 - Usuário e senha incorretos | 1 - Senha Incorreta | 2 - Usuário e senha válidos (Login efetuado)
//    }
}