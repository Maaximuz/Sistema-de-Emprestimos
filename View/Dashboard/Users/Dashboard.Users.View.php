<?php
$controller = new ControllerUsers();

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Usuários</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Usuários</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Registros</h3>
                            <div class="card-tools">
                              <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card-body table-responsive p-0" style="height: 670px;">
                            <table class="table table-head-fixed text-nowrap">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Usuário</th>
                                  <th>E-mail</th>
                                  <th>Data de Registro</th>
                                  <th>Status</th>
                                  <th>Permissão</th>
                                  <th>Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                  
                                <?php 
                                $datauser = $controller->datauser();

                                foreach ($datauser as $user){
                                    $id = $user['id'];
                                    $username = $user['username'];
                                    $email = $user['email'];
                                    $permission = $user['permission'];
                                    $dt_register = $user['dt_register'];
                                    $dt_inactive = $user['dt_inactive'];
                                    if($dt_inactive == ''){
                                        $status = 'Ativo';
                                    }else{
                                        $status = 'Inativo';
                                    }
                                    $id_permission = $user['id_permission'];
                                    $name_permission = $user['name_permission'];
                                    
                                    echo '<tr>
                                             <td>'.$id.'</td>
                                            <td>'.$username.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.date('d/m/Y', strtotime($dt_register)).'</td>
                                            <td>'.$status.'</td>
                                            <td>'.$name_permission.'</td>
                                            <td>
                                              <a href="#" onClick="inactiveUser()"><i class="fa fa-trash">
                                            </td>
                                        </tr>';
                                }
                                ?>
                                  </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function inactiveUser() {
            $.ajax({
                url: "index.php?action=inactiveuser?id=<?=$id?>",
                type: "POST",
                success: function(){
                    toastr.success('Usuário removido com sucesso.');
                    setInterval(function(){
                        location.reload();
                    }, 3000);
                },
                error: function(){
                  toastr.error( "Ocorreu um erro inesperado, entrar em contato com a administração do sistema!" );
                }
            });
        }
</script>


