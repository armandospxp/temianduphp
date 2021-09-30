<?php
/* iniciar la sesión */
session_start();
if (!isset($_SESSION['temiandu']['auth'])) {
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TEMIANDU</title>
  <link rel="icon" type="image/png" href="../img/logo_comercial.png" />
  <?php include("../paths/head_files.php"); ?>

</head>

<body>

  <?php include("header.php"); ?>

  <div class="am-mainpanel">
    <div class="am-pagebody">
      <?php
      if (!empty($_GET['view'])) {
        switch ($_GET['view']) {
          case 'Inicio':
            require 'inicio/inicio.php';
            break;
          case 'dependencias':
            require 'dependencias/dependencias.php';
            break;
          case 'plan_cuentas':
            require 'planCuentas/planCuentas.php';
            break;
          case 'proveedores':
            require 'proveedores.php';
            break;
          case 'bienes':
            require 'bienes/bienes.php';
            break;
          case 'agregar_movimiento_interno':
            require 'agregarMovimientoInterno/agregarMovimientoInterno.php';
            break;
          case 'agregar_bien':
            require 'agregarBien/agregarBien.php';
            break;
          case 'asignar_responsabilidad':
            require 'asignarResponsabilidad/asignarResponsabilidad.php';
            break;
          case 'deslindar_responsabilidad':
            require 'deslindarResponsabilidad/deslindarResponsabilidad.php';
            break;
          case 'bienes_dependencia':
            require 'bienesDependencia/bienesDependencia.php';
            break;
          case 'planilla_responsabilidad':
            require 'planillaResponsabilidad/planillaResponsabilidad.php';
            break;
          case 'movimiento_interno':
            require 'movimientoInterno/movimientoInterno.php';
            break;
        }
      } elseif (!empty($_GET['edit'])) {
        require 'bienes/editarBien.php';
      } else {
        require 'inicio/inicio.php';
      }
      ?>
    </div><!-- am-pagebody -->
    <?php include("footer.php"); ?>
  </div><!-- am-mainpanel -->


</body>

</html>