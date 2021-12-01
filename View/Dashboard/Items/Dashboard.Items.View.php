<?php 
$controller = new ControllerItems();
?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Items</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Items</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <button class="btn btn-app m-0" type="button" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-barcode"></i>Adicionar</button>
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
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Classificação</th>
                                            <th>Quantidade</th>
                                            <th>Cadastrado por</th>
                                            <th>Cadastrado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $getdataitems = $controller->getdataitems();

                                            foreach ($getdataitems as $items){
                                                $id = $items['id'];
                                                $name_item = $items['name_item'];
                                                $desc_item = $items['desc_item'];
                                                $class_item = $items['class_item'];
                                                $quantity_item = $items['quantity_item'];
                                                if($quantity_item == '0'){
                                                    $status = 'ND';
                                                }else{
                                                    $status = $quantity_item;
                                                }
                                                $user_register = $items['user_register'];
                                                $dt_register = $items['dt_register'];
                                                $username = $items['username'];

                                                echo '<tr>
                                                        <td>'.$id.'</td>
                                                        <td>'.$name_item.'</td>
                                                        <td>'.$desc_item.'</td>
                                                        <td>'.$class_item.'</td>
                                                        <td>'.$status.'</td>
                                                        <td>'.$username.'</td>
                                                        <td>'.date('d/m/Y', strtotime($dt_register)).'</td>
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
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h4 class="modal-title">Adicionar Item</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_item">Nome</label>
                                        <input type="text" id="name_item" name="name_item" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc_item">Descrição</label>
                                        <textarea type="text" id="desc_item" name="desc_item" class="form-control" style="resize: none;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_item">Classificação</label>
                                        <input type="text" id="class_item" name="class_item" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity_item">Quantidade</label>
                                        <input type="number" id="quantity_item" name="quantity_item" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" onClick="additem()">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function additem() {
        var data = $(form).serialize();
        
        $.ajax({
            url: "index.php?action=additem",
            type: "POST",
            datatype: 'json',
            data: data,
            success: function (data) {
                if(data === 'true'){
                    toastr.success('Item adicionado com sucesso.');
                    setInterval(function () {
                    location.reload();
                    }, 3000);
                }else{
                    toastr.error("Ocorreu um erro inesperado, entrar em contato com a administração do sistema!");
                }
            },
            error: function (data) {
                toastr.error("Ocorreu um erro inesperado, entrar em contato com a administração do sistema!");
            }
        });
    }
</script>


