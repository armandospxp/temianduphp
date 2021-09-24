<?php
/*-------------------------
  @author: 
  Autor: Diego Pane
	Mail: diegopane04@gmail.com
---------------------------*/

$active_inicio = "active";

$active_sistema = "";
$active_dependencias = "";
$active_plan_cuentas = "";

$active_inventario = "";
$active_agregar_bien = "";
$active_agregar_movimiento_interno = "";
$active_bienes = "";
$active_movimiento_interno = "";

$active_responsabilidad = "";
$active_asignar_responsabilidad = "";
$active_deslindar_responsabilidad = "";
$active_planilla_responsabilidad = "";

$active_reportes = "";
$active_bienes_dependencia = "";

include("aside.php");

$title = "Inicio";
?>

<div class="am-pagetitle">
  <h5 class="am-title"><?php echo $title ?></h5>
</div><!-- am-pagetitle -->

<div class="row row-sm">

  <!-- CANTIDAD TOTAL DE BIENES  -->
  <div class="col-lg-4">
    <div class="card" style="box-shadow: 2px 2px 5px #999;">
      <div class="wd-100p ht-150"></div>
      <div class="overlay-body pd-x-20 pd-t-20">
        <div class="d-flex justify-content-between">
          <div>
            <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Total de Bienes cargados</h6>
            <p class="tx-12"><?php echo date("F j, Y, g:i a"); ?></p>
          </div>
        </div><!-- d-flex -->
        <h2 id="ini_cantidad_total" class="mg-b-5 tx-inverse tx-lato"></h2>
        <p class="tx-12 mg-b-0">Desde el inicio.</p>
      </div>
    </div><!-- card -->
  </div><!-- col-4 -->

  <!-- CANTIDAD DE BIENES EN LOS ÚLTIMOS 7 -->

  <div class="col-lg-4">
    <div class="card" style="box-shadow: 2px 2px 5px #999;">
      <div class="wd-100p ht-150"></div>
      <div class="overlay-body pd-x-20 pd-t-20">
        <div class="d-flex justify-content-between">
          <div>
            <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Bienes cargados en la semana</h6>
            <p class="tx-12"><?php echo date("F j, Y, g:i a"); ?></p>
          </div>
        </div><!-- d-flex -->
        <h2 id="ini_ultima_semana" class="mg-b-5 tx-inverse tx-lato"></h2>
        <p class="tx-12 mg-b-0">Últimos 7 días.</p>
      </div>
    </div><!-- card -->
  </div><!-- col-4 -->


</div><!-- row -->

<!-- HISTORIAL DE CARGA DE BIENES POR USUARIO  -->

<div class="row row-sm mg-t-15 mg-sm-t-20">
  <div class="col-lg-8">
    <div class="card" style="box-shadow: 2px 2px 5px #999;">
      <div class="card-header bg-transparent pd-20">
        <h6 class="card-title tx-uppercase tx-12 mg-b-0">Historial de carga de bienes por usuario</h6>
      </div><!-- card-header -->

      <div class="card-body">
        <div class="table-wrapper">
          <table id="dtHistorialUsuario" class="" style="width: 100%;">
            <thead>
              <tr>
                <th class="wd-5p">USUARIO</th>
                <th class="wd-5p">NOMBRE</th>
                <th class="wd-5p">CARGA</th>
                <th class="wd-5p">FECHA DE ÚLTIMA CARGA</th>
              </tr>
            </thead>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card-body -->

      <div class="card-footer tx-12 pd-y-15 bg-transparent bd-t bd-gray-200">
        <a><i class="fa fa-users mg-r-5"></i>Historial de todas las transacciones</a>
      </div><!-- card-footer -->
    </div><!-- table-responsive -->

  </div><!-- card -->
</div><!-- col-8 -->

<?php include("../paths/foot_files.php"); ?>

<script type="text/javascript" src="inicio/inicio.js"></script>