<?php
$controller = new ControllerProfile();

$getdatauser = $controller->getdatauser($id);

foreach ($getdatauser as $user) {
    $id = $user['id'];
    $username = $user['username'];
    $full_name = $user['full_name'];
    $email = $user['email'];
    $dt_register = $user['dt_register'];
    $name_permission = $user['name_permission'];
}

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perfil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?action=dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Perfil do Usuário</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="./Assets/template/dist/img/avatar5.png" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?php
                                if (isset($full_name)) {
                                    echo $full_name;
                                } else {
                                    echo $username;
                                }
                                ?></h3>
                            <p class="text-muted text-center"><?php echo $name_permission; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Contribuições</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Itens Emprestados</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Informações Pessoais</a></li>
                            </ul>
                        </div>
                        <div class="card-body" style="height: 325px;">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" id="form">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nome Completo</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Insira seu Nome Completo" value="<?php echo $full_name; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Permissão</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" title="Apenas o administrador do sistema poderá alterar seu nível de permissão." placeholder="Permissão" value="<?php echo $name_permission; ?>" disabled="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Data de Registro</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" disabled="" placeholder="Data de Registro" value="<?php echo date('d/m/Y', strtotime($dt_register)); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Salvar Informações</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>
</div>
<script>
    $(function () {
        $.validator.setDefaults({
            submitHandler: function (form) {
                var data = $(form).serialize();

                $.ajax({
                    url: "index.php?action=changeinfo&id=<?= $_SESSION['user_id']; ?>",
                    type: 'POST',
                    datatype: 'json',
                    data: data,
                    success: function (data) {
                        toastr.warning('Atualizando suas credenciais.');
                        if (data === 'true') {
                            setInterval(function () {
                                toastr.success('Suas credenciais foram alteradas.');
                                window.location = 'index.php?action=profile&id=<?= $_SESSION['user_id']; ?>';
                            }, 3000);
                        } else {
                            toastr.error('Ocorreu um erro, entre em contato com a administração do sistema.');
                            window.location = 'index.php?action=profile&id=<?= $_SESSION['user_id']; ?>';
                        }
                    },
                    error: function (data) {
                        alert("Ocorreu um erro inesperado, entrar em contato com a administração do sistema!");
                    }
                });
            }
        });
        $('#form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                }
            },
            messages: {
                email: {
                    required: "Por favor, insira um e-mail.",
                    email: "Por favor, insira um e-mail válido."
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>