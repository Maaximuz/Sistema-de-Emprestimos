<?php
$controller = new ControllerDashboard();
$user_id = $_SESSION['user_id'];

$getdatauser = $controller->getdatauser($user_id);

foreach ($getdatauser as $user) {
    $id = $user['id'];
    $username = $user['username'];
    $full_name = $user['full_name'];
    $email = $user['email'];
    $dt_register = $user['dt_register'];
    $name_permission = $user['name_permission'];
}
?>
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="./Assets/template/dist/img/LittleThings.png" alt="LittleThings" height="60" width="60">
</div>
<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php?action=dashboard" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php?action=dashboardclient" class="brand-link">
        <img src="./Assets/template/dist/img/LittleThingsWhite.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9;">
        <span class="brand-text font-weight-light">LittleThings</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./Assets/template/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="index.php?action=profile&id=<?php echo $_SESSION['user_id']; ?>" class="d-block"><?php echo $username;?></a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Busca" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Cliente</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">1</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="index.php?action=loan" class="nav-link">
                                <i class="fa fa-boxes nav-icon"></i>
                                <p>Empréstimos</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
        