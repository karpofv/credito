<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> </title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="">

  <link href="<?php echo $ruta_base; ?>css/all.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo $ruta_base; ?>css/bootstrap.min.css" media="screen" title="no title">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo $ruta_base; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <link rel="stylesheet" href="<?php echo $ruta_base; ?>css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $ruta_base; ?>css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo $ruta_base; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
  
<script>
//funciones para condicionar la entrada por teclado permitiendo solo los caracteres incluidos en letras = "     "
  //solo para numeros y letras
function soloCodigo(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "1234567890áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }

 //solo para letras
function soloLetras(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
 //solo para letras
function soloCorreos(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras ="1234567890._-abcdefghijklmnñopqrstuvwxyz";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
   //solo para especiales
function soloEspeciales(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " 0123456789.,-_/#()áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }

//solo para numeros
function soloNumeros(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "1234567890";
     especiales = "8-37-39-46";

     tecla_especial = false
     for(var i in especiales){
          if(key == especiales[i]){
              tecla_especial = true;
              break;
          }
      }

      if(letras.indexOf(tecla)==-1 && !tecla_especial){
          return false;
      }
  }
   </script>

</head>
