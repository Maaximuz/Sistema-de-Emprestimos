<?php
$controller = new ControllerLoan();

$user_id = $_SESSION['user_id'];


?>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Empréstimo</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?action=dashboardclient">Home</a></li>
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
                                            <th>Quantidade</th>
                                            <th>Status</th>
                                            <th>Data de Empréstimo</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $getdataloans = $controller->getdataloans($user_id);

                                        foreach ($getdataloans as $loans) {
                                            $id = $loans['id'];
                                            $id_item = $loans['id_item'];
                                            $quantity_loan = $loans['quantity_loan'];
                                            $dt_combined = $loans['dt_combined'];
                                            $dt_atual = new DateTime($dt_register);
                                            $dt_dif1 = new DateTime($dt_combined);
                                            if ($dt_combined == '0000-00-00') {
                                                $status = 'Sem data prevista';
                                            } else {
                                                $interval = $dt_atual->diff($dt_dif1);
                                                if ($interval->d <= 0) {
                                                    $status = 'Normal';
                                                } elseif ($interval->h <= 0) {
                                                    $status = 'Atrasado';
                                                }
                                            }
                                            $user_register = $loans['user_register'];
                                            $dt_register = $loans['dt_register'];
                                            $name_item = $loans['name_item'];

                                            echo '<tr>
                                                        <td>' . $id . '</td>
                                                        <td>' . $name_item . '</td>
                                                        <td>' . $quantity_loan . '</td>
                                                        <td>' . $status . '</td>
                                                        <td>' . date('d/m/Y', strtotime($dt_register)) . '</td>
                                                        <td>
                                                          <a href="index.php?action=devolution&id='.$id.'"><i class="fas fa-sync-alt" title="Devolver Item">
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
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h4 class="modal-title">Adicionar Empréstimo</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name_item">Item</label>
                                        <select id="item" name="item" class="form-control">
                                            <option></option>
                                            <?php
                                            $dataitems = $controller->dataitems();
                                            
                                            foreach ($dataitems as $items) {
                                                $id = $items['id'];
                                                $name = $items['name_item'];
                                                $desc_item = $items['desc_item'];
                                                $class_item = $items['class_item'];
                                                $quantity_item = $items['quantity_item'];
                                                $user_register = $items['user_register'];
                                                $dt_register = $items['dt_register'];
                                                $estoque = $items['estoque'];

                                                if ($estoque == 'Sem estoque') {
                                                    //
                                                } else {
                                                    echo '<option value=' . $id . ' title="Nome: ' . $name . ', Descrição: ' . $desc_item . ', Quantidade: ' . $quantity_item . '">' . $name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity_item">Quantidade</label>
                                        <input type="number" id="quantity_item" name="quantity_item" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc_item">Data Combinada</label>
                                        <input type="date" id="dt_combined" name="dt_combined" class="form-control" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" onClick="addloan()">Emprestar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function addloan() {
        var data = $(form).serialize();

        $.ajax({
            url: "index.php?action=addloan",
            type: "POST",
            datatype: 'json',
            data: data,
            success: function (data) {
                if (data === 'true') {
                    toastr.success('Empréstimo adicionado com sucesso.');
                    setInterval(function () {
                        location.reload();
                    }, 3000);
                } else if (data === 'date') {
                    toastr.warning("A Data combinada deverá ser maior que a data atual!");
                } else {
                    toastr.error("Ocorreu um erro inesperado, entrar em contato com a administração do sistema!");
                }
            },
            error: function (data) {
                toastr.error("Ocorreu um erro inesperado, entrar em contato com a administração do sistema!");
            }
        });
    };
</script>


