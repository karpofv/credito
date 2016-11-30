<?php
$confInv = $_GET["confInv"];
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
require("../includes/conf/auth.php");
$Quien = $_SESSION['usuario_nivel'];
if ($_SESSION['usuario_nivel'] != 'Empleado') {
  header("Location: ../index.php?error_login=5");
  exit;
} else {
  $permiso = $_SESSION['usuario_login'];
}
include_once("../layout/partials/htmlheader.php");
include_once '../includes/tools.php';
include_once '../includes/conexion.php';
include_once('modelo/class.consultas.php');
$consultas = new Consultas();
$consultasPermiso = new paraTodos();
$filas = $consultas->evaluarCodigo();
foreach ($filas as $fila) {
  $cod = $fila[0];
}
$intento = $_POST[sube] + 1;
if ($_POST[searchbox]) {
  if ($cod == $_POST[searchbox]) {
    $modifico = "UPDATE usuarios SET Registro='1', Fecha=Now() WHERE Cedula='$_SESSION[ci]'";
    mysql_query($modifico);
    $res_ = $consultasPermiso->arrayConsulta("Nivel", "usuarios", "Cedula=$_SESSION[ci]");
    foreach ($res_ as $rownivelEmp) {
      $_SESSION['usuario_permisos'] = "$rownivelEmp[Nivel]";
      $_SESSION['dmn'] = "351";
      $_SESSION['ver'] = "1";
    }
    header("Location: accion.php");
  } else {
    $mssg = "C&oacute;digo es incorrecto, intentos fallidos: " . $intento;
    if ($intento == 2) {
      $modifico = "UPDATE usuarios SET Codigo='kjfhdk;fjhs;fkjs', Registro='0' WHERE Cedula='$_SESSION[ci]'";
      mysql_query($modifico);
      header("Location: ../index.php?error_login=5");
    }
  }
}
$ruta = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/" . $_SESSION[ci] . ".jpg";
$urlexists = paraTodos::url_exists($ruta);
if ($urlexists == 'true') {
  $FOTO = "http://www.unellez.edu.ve/portal/servicios/siproma/sistema/fotos/" . $_SESSION[ci] . ".jpg";
} else {
  $FOTO = "../assets-minified/images/icono_perfil.png";
}
?>
<body class="hold-transition lockscreen">

  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name"><?php echo $_SESSION['usuario_perfil']?></div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="<?php echo $FOTO;?>" alt="User Image">
      </div>
      <!-- /.lockscreen-image -->
      <!-- lockscreen credentials (contains the form) -->

      <form class="lockscreen-credentials" class="form-inline" method="post" action="index.php" name="login" id="form">
        <div class="input-group">
         <input type="hidden" name="dmn" id="dmn" value="351">
         <input type="hidden" name="ver" id="ver" value="1">
         <input type="hidden" name="sube" id="sube" value="<?php echo $intento; ?>">

         <input type="text" id="searchbox" maxlength="5" name="searchbox" class="form-control" value="<?php echo $cod; ?>">
         <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
  </div>

  <?php if ($mssg != '') { ?>
  <div class="col-sm-4">
  </div>
  <div class="col-sm-4">
    <ul class="noty-wrapperr i-am-new" id="noty_top">
      <li class="bg-red" style="cursor: pointer;">
        <div class="noty_bar" id="noty_1145500552142139600">
          <div class="noty_message">
            <span class="noty_text">
              <i class="glyph-icon icon-cog mrg5R"></i><?php if ($mssg != '') {
                echo $mssg;
              } ?></span>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="col-sm-4">
    </div>
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $ruta_base; ?>assets-minified/demo-widgets.css">
    <script type="text/javascript" src="<?php echo $ruta_base; ?>assets-minified/demo-widgets.js"></script>
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="<?php echo $ruta_base; ?>assets-minified/js/skel.min.js"></script>
    <script src="<?php echo $ruta_base; ?>assets-minified/js/init.js"></script>
    <?php
    include_once("../layout/partials/footer.php");
    ?>























  














