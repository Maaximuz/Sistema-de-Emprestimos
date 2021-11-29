<?php
$controller = new ControllerPermissions();

 
?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Permissões</h1>
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
                                  <th>Permissão</th>
                                  <th>Registrado Por</th>
                                  <th>Data de Registro</th>
                                  <th>Status</th>
                                  <th>Ações</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $datapermission = $controller->datapermission();

                                foreach ($datapermission as $permission){
                                    $id = $permission['id'];
                                    $name_permission = $permission['name_permission'];
                                    $username = $permission['username'];
                                    $dt_register = $permission['dt_register'];
                                    $user_inactive = $permission['user_inactive'];
                                    $dt_inactive = $permission['dt_inactive'];
                                    if($dt_inactive == ''){
                                        $status = 'Ativo';
                                    }else{
                                        $status = 'Inativo';
                                    }
                                    
                                    echo '<tr>
                                            <td>'.$id.'</td>
                                            <td>'.$name_permission.'</td>
                                            <td>'.$username.'</td>
                                            <td>'.date('d/m/Y', strtotime($dt_register)).'</td>
                                            <td>'.$status.'</td>
                                            <td>
                                              <a href="#" onClick="inactivePermission()"><i class="fa fa-trash">
                                            </td>
                                        </tr>';
                                }
                                ?>
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
                url: "index.php?action=inactivepermission?id=<?=$id?>",
                type: "POST",
                success: function(){
                    toastr.success('Permissão removido com sucesso.');
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


