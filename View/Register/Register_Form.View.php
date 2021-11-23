<script src="./Functions/Js/Register/Register_Validator.js"></script>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index.php?action=login" class="h1"><b>Little</b>Things</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Registrar novo usuário</p>
                <form class="form" id="form">
                    <div class="form-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Usuário">
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass"  name="pass" class="form-control" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <input type="password" id="confirmpass" name="confirmpass" class="form-control" placeholder="Repetir Senha">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="terms" name="terms">
                            <label for="terms" class="custom-control-label">
                             Eu aceito os <a href="index.php?action=termopolitica" target="_self">termos de uso.</a>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Registrar</button>
                    </div>
<!--                    <div class="social-auth-links text-center">
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i>
                            Entrar usando o Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i>
                            Entrar usando o Google+
                        </a>
                    </div>-->
                </form>
              <a href="index.php?action=login" class="text-center">Eu já tenho cadastro</a>
            </div>
        </div>
    </div>
    <script>
    $(function () {
        $.validator.setDefaults({
            submitHandler: function (form) {
              var data = $(form).serialize();
              
              $.ajax({
                  url: "index.php?action=registeruser",
                  type: 'POST',
                  datatype: 'json',
                  data: data,
                  success: function(data){
                    var count = 4;
                    setInterval(function(){
                        count--;
                        if(count === 0){
                            window.location.href = 'index.php?action=login';
                        }else{
                            toastr.success('Cadastro realizado com sucesso. Voltando a tela de login em '+count+' segundos.');
                        }
                    }, 3000);
                  },
                  error: function(data){
                    alert( "Cadastro não realizado!" );
                  }
              });  
            }
        });
        $('#form').validate({
          rules: {
            username: {
              required: true,
              maxlength: 15,
              remote: {
                url: "index.php?action=verifyusername",
                type: "POST",
                data: {
                    username: function () { return $('#form :input[name="username"]').val(); }
                }
              }
            },
            email: {
              required: true,
              email: true,
              remote: {
                url: "index.php?action=verifyemail",
                type: "POST",
                data: {
                    email: function () { return $('#form :input[name="email"]').val(); }
                }
              }
            },
            pass: {
              required: true,
              minlength: 6
            },
            confirmpass: {
              equalTo: "#pass"
            },
            terms: {
              required: true
            }
          },
          messages: {
            username: {
              required: "Por favor, insira um nome de usuário.",
              maxlength: "Por favor, o nome de usuário deve ter no máximo 15 caracteres.",
              remote: jQuery.validator.format("{0} já está em uso!")
            },
            email: {
              required: "Por favor, insira um e-mail.",
              email: "Por favor, insira um e-mail válido.",
              remote: jQuery.validator.format("{0} já está em uso!")
            },
            pass: {
              required: "Por favor, insira uma senha.",
              minlength: "Sua senha deverá conter mais de 6 caracteres."
            },
            confirmpass: {
              equalTo: "As senhas devem coincidir."
            },
            terms: "Por favor, aceite os termos."
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
</body>