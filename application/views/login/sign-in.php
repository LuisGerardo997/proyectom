<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Log-in | Residencial Río</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url() ?>images/logo1.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url() ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url() ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url() ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url() ?>css/style.css" rel="stylesheet">

    <!-- Jquery Core Js -->
    <script src="<?=base_url() ?>plugins/jquery/jquery.min.js"></script>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Residencial<b>Río</b></a>
            <small>Sistema de información para el control de reservas y estadías</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action='' method="POST">
                    <div class="msg">Ingresa tus datos para iniciar sesión:</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user" id="user" placeholder="Nombre de usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div id="field_perfil"></div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Recuérdame</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                        <div class="col-xs-12 align-center">
                            <a href="forgot-password.html">Olvidaste tu contraseña?</a>
                            <?php if (isset($mensaje)){ ?> <script> alert('<?php echo $mensaje; ?>'); </script> <?php }; ?>
                        </div>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <script>
    var base_url = '<?php echo base_url(); ?>';
      $(document).ready(function(){
        var field = document.getElementById(field_perfil);
        field_perfil.setAttribute("style","display:none");
        $('#pass').on('focus',function(){
            var username = $('#user').val();
            $.post(base_url+'login/perfiles',
            {
                user:username,
            },
            function(data){
                field_perfil.setAttribute("style","display:block");
                var datos = eval(data);
                html = '<div class="input-group">';
                html += '<select name="perfil" class="form-control">';
                for(var i = 0; i < datos.length; i++){
                    html += '<option value="'+datos[i]['cod_perfil']+'">'+datos[i]['perfil']+'</option>"';
                }
                html += "</select></div>";
                $('#field_perfil').html(html);
            })

        })

        //if (username == )
      })
    </script> -->


    <!-- Bootstrap Core Js -->
    <script src="<?=base_url() ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url() ?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?=base_url() ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url() ?>js/admin.js"></script>
    <script src="<?=base_url() ?>js/pages/examples/sign-in.js"></script>
</body>

</html>
