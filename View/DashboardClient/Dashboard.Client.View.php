<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$dt_atual = strftime('1 %h, %Y', strtotime('today'));
$id = $_SESSION['user_id'];

$controller = new ControllerDashboard();

$myloans = $controller->mytotalloans($id);
$mydevolutions = $controller->mytotaldevolutions($id);
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=dashboardclient">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Empréstimos</span>
                            <span class="info-box-number"><?php echo $myloans; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-exchange-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Devoluções</span>
                            <span class="info-box-number"><?php echo $mydevolutions; ?></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="height: 650px;">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Meus últimos empréstimos</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Item</th>
                                            <th>Quantidade</th>
                                            <th>Status</th>
                                            <th>Data Combinada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $getdataloans = $controller->getdataloans($id);
                                        
                                        foreach($getdataloans as $loans){
                                            $id = $loans['id'];
                                            $id_item = $loans['id_item'];
                                            $quantity_loan = $loans['quantity_loan'];
                                            $dt_combined = $loans['dt_combined'];
                                            $user_register = $loans['user_register'];
                                            $dt_register = $loans['dt_register'];
                                            $name_item = $loans['name_item'];
                                            $devolution = $loans['ds_devolution'];
                                            $dt_devolution = $loans['dt_devolution'];
                                            
                                            echo '  <tr>
                                                        <td>'.$id.'</td>
                                                        <td>'.$name_item.'</td>
                                                        <td>'.$quantity_loan.'</td>
                                                        <td>';
                                            
                                                        if($devolution == 'Devolvido'){
                                                            echo '<span class="badge badge-success">'.$devolution.'</span></td>';
                                                        }elseif($devolution == 'Atrasado'){
                                                            echo '<span class="badge badge-danger">'.$devolution.'</span></td>';
                                                        }elseif($devolution == 'Entregar Hoje'){
                                                            echo '<span class="badge badge-warning">'.$devolution.'</span></td>';
                                                        }else{
                                                            echo '<span class="badge badge-info">'.$devolution.'</span></td>';
                                                        }
                                                    
                                            echo '      <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">'.date('d/m/Y', strtotime($dt_combined)).'</div>
                                                        </td>
                                                    </tr>';
                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <a href="index.php?action=loan" class="btn btn-sm btn-secondary float-right">Ver minhas Ordens</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="height: 650px;">
                        <div class="card-header">
                            <h3 class="card-title">Recentemente Adicionados</h3>
                        </div>
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <?php 
                                    $controller = new ControllerLoan();
                                
                                    $getdataitems = $controller->dataitems();

                                    foreach ($getdataitems as $items){
                                        $id = $items['id'];
                                        $name = $items['name_item'];
                                        $desc_item = $items['desc_item'];
                                        $class_item = $items['class_item'];
                                        $quantity_item = $items['quantity_item'];
                                        $user_register = $items['user_register'];
                                        $dt_register = $items['dt_register'];
                                        $estoque = $items['estoque'];
                                        if($quantity_item == 'Sem estoque'){
                                            $status = '<a href="javascript:void(0)" class="product-title">'.$name.'<span class="badge badge-danger float-right">Indisponível</span></a>';
                                        }else{
                                            $status = '<a href="javascript:void(0)" class="product-title">'.$name.'<span class="badge badge-success float-right">Disponível</span></a>';
                                        }

                                        echo '  <li class="item">
                                                    <div class="product-info">'.$status.'
                                                        
                                                        <span class="product-description">
                                                            '.$desc_item.'
                                                        </span>
                                                    </div>
                                                </li>';

                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>