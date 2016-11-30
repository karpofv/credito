<?php
include_once("layout/partials/htmlheader.php");
//include_once 'includes/layout/head.php';
require 'includes/conf/general_parameters.php';
ini_set('display_errors', false);
ini_set('display_startup_errors', false);
if ($_GET[logaut] == '1') {
    session_cache_limiter('nocache,private');
    session_name($sess_name);
    session_start();
    $sid = session_id();
    session_destroy();
}
?>
<?php
session_start();
session_destroy();
?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Sistema</b>Administrado</a>
        </div>
        <!-- /.login-logo -->




        <form action="index2.php" id="login-validation" class="" method="post" enctype="multipart/form-data">
            <!-- notificacion de error -->
            <!-- fin notificacion de error -->
            <div id="login-form" class="content-box bg-default">
                <div class="content-box-wrapper pad20A">
                    <!--  <img class="mrg25B center-margin radius-all-100 display-block" id="icon_perfil" src="assets/images/icono_perfil.gif" alt="">
                    -->
                    <br>
                    <div class="form-group">
                        <div class="input-group"> 
                        <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-user"></i>
                        </span>
                        <input title="Ingrese su Usuario de Acceso" type="text" name="user" id="user" class="form-control" id="exampleInputEmail1" placeholder="Ingresa tu usuario" required="required"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon addon-inside bg-gray">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input title="Ingrese su Clave de Acceso" type="password" name="pass" id="pass" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu clave" required="required">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
                    </div>
                    <div class="row">
                        <div class="checkbox-primary col-md-6" id="check_remember">
                            <label>
                                <input type="checkbox" id="loginCheckbox1" class="custom-checkbox"> Recordarme </label>
                        </div>
                        <div class="text-right col-md-6"> <a href="#" class="switch-button" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">Recuperar la clave?</a> </div>
                    </div>
                </div>
            </div>
            <div id="login-forgot" class="content-box bg-default hide">
                <div class="content-box-wrapper pad20A">
                    <div class="form-group">
                        <label for="exampleInputEmail2">Ingresa tu correo:</label>
                        <div class="input-group"> 
                        <span class="input-group-addon addon-inside bg-gray">
                            <i class="glyph-icon icon-envelope-o"></i>
                        </span>
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Ingresa tu correo">
                        </div>
                    </div>
                </div>
                <div class="button-pane text-center">
                    <button type="submit" class="btn btn-md btn-primary">Recuperar la clave</button> 
                    <a href="#" class="btn btn-md btn-link switch-button" switch-target="#login-form" switch-parent="#login-forgot" title="Cancel">Cancel</a> 
                </div>
            </div>
        </form> 

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<div class="col-lg-4"></div>
<div class="col-lg-4"><?php if (isset($_GET['error_login'])) {
                $error = $_GET['error_login'];
                ?>
                <div class="callout callout-danger">
                <p><?php echo $error_login_ms[$error]; ?></p>
              </div>
                <?php
                }
                ?></div>
                <div class="col-lg-4"></div>
</body>
<?php
//include_once("includes/layout/foot.php");
?>
