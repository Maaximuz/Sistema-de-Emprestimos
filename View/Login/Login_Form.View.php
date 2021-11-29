<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index.php?action=login" class="h1"><b>Little</b>Things</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Entrar para a sessão</p>
                <form class="form" id="form">
                    <div class="input-group mb-3">
                      <input type="username" id="username" name="username" class="form-control" placeholder="Nome de usuário">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-user"></span>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" id="pass" name="pass" class="form-control" placeholder="Senha">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <div class="icheck-primary">
                          <input type="checkbox" id="remember">
                          <label for="remember">
                            Lembrar-me
                          </label>
                        </div>
                      </div>
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                      </div>
                    </div>
                </form>
                <p class="mb-1">
                  <a href="index.php?action=forgotpass">Esqueci a senha</a>
                </p>
                <p class="mb-0">
                  <a href="index.php?action=register" class="text-center">Registre-se</a>
                </p>
            </div>
        </div>
    </div>
</body>
<script>
    $(function () {
        $.validator.setDefaults({
            submitHandler: function (form) {
                var data = $(form).serialize();
                var username = document.getElementById('username').value;

                $.ajax({
                    url: "index.php?action=verifylogin",
                    type: 'POST',
                    datatype: 'json',
                    data: data,
                    success: function(data){
                      toastr.warning('Verificando suas credenciais.');
                      setInterval(function(){
                          if(data === 'admin'){
                              toastr.success('Bem-vindo '+ username +' .');
                              window.location = 'index.php?action=dashboard';
                          }else if(data === 'client'){
                              toastr.success('Bem-vindo '+ username +' .');
                              window.location = 'index.php?action=dashboardclient';
                          }else{
                              toastr.error('Usuário ou senha incorretos.');
                              window.location = 'index.php?action=login';
                          }
                      }, 3000);
                    },
                    error: function(data){
                      alert( "Ocorreu um erro inesperado, entrar em contato com a administração do sistema!" );
                    }
                });
            }
        });
        $('#form').validate({
          rules: {
            username: {
              required: true
            },
            pass: {
              required: true
            }
          },
          messages: {
            username: {
              required: "Por favor, insira um nome de usuário."
            },
            pass: {
              required: "Por favor, insira uma senha."
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
