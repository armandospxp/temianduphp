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
          case 'registrar_visita':
            require 'registrarVisita/registrarVisita.php';
            break;
          case 'reporte_visitas':
            require 'reporteVisita/reporteVisita.php';
            break;
            case 'ayuda':
                require 'ayuda/ayuda.php';
        }
      }else {
        require 'inicio/inicio.php';
      }
      ?>
    </div><!-- am-pagebody -->
    <?php include("footer.php"); ?>
  </div><!-- am-mainpanel -->


</body>

</html>