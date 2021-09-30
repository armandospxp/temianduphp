<?php
  session_start ();
  if (isset ( $_SESSION ['temiandu'] ['auth'] )) {
    header ( 'location:home.php' );
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>LOGIN TEMIANDU</title>
    <link rel="icon" type="image/png" href="../img/logo_comercial.png" />
    <!-- vendor css -->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="../../css/amanda.css">
  </head>

  <body>

<div class="am-signin-wrapper">
  <div class="am-signin-box">
    <div class="row no-gutters">
      <div class="col-lg-5">
        <div>
            <h2>TEMIANDU</h2>
            <p>Sistema de Gestión de Portería</p>
            <p>Para registrar y ver los movimientos de Portería.</p>

            <hr>
            <p>Desarrollado por: A&P<br>DTIC</p>
        </div>
      </div>
      <div class="col-lg-7">
        <h5 class="tx-gray-800 mg-b-25">Identificarse</h5>
        <div id="resultadoLoguearse"></div>
        <form action="../scripts/login.php" method="POST">
              
        <div class="form-group" >
          <label class="form-control-label">Usuario:</label>
          <input type="text" name="usuario" class="form-control" placeholder="Ingrese su usuario" required>
        </div><!-- form-group -->

        <div class="form-group">
          <label class="form-control-label">Contraseña:</label>
          <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
        </div><!-- form-group -->

        <button type="submit" class="btn btn-block">Aceptar</button>
        </form>
      </div><!-- col-7 -->
    </div><!-- row -->
      <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright © 2021. Todos los derechos reservados. Dirección de Tecnología de la información y Comunicación.</p>
  </div><!-- signin-box -->
</div><!-- am-signin-wrapper -->

<script src="../../lib/jquery/jquery.js"></script>
<script src="../../lib/popper.js/popper.js"></script>
<script src="../../lib/bootstrap/bootstrap.js"></script>
<script src="../../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

<script src="../../js/amanda.js"></script>

</body>
</html>
