<?php
include(__DIR__ . "/modals/ver_ubicaciones_origen.php");
include(__DIR__ . "/modals/ver_ubicaciones_destino.php");
include(__DIR__ . "/modals/msg_confirmacion.php");
include(__DIR__ . "/modals/msg_error.php");
include(__DIR__ . "/modals/msg_validacion.php");

$active_inicio = "";

$active_sistema = "";
$active_dependencias = "";
$active_plan_cuentas = "";

$active_inventario = "active show-sub";
$active_agregar_bien = "";
$active_agregar_movimiento_interno = "active";
$active_bienes = "";
$active_movimiento_interno = "";

$active_responsabilidad = "";
$active_asignar_responsabilidad = "";
$active_deslindar_responsabilidad = "";
$active_planilla_responsabilidad = "";

$active_reportes = "";
$active_bienes_dependencia = "";

include("aside.php");

$title = "Agregar Movimiento Interno";
?>

<div class="am-pagetitle">
  <h5 class="am-title"><?php echo $title ?></h5>
</div><!-- am-pagetitle -->

<div class="card">
  <form class="form-horizontal" method="post" id="frmGuardarMovimiento" name="frmGuardarMovimiento">
    <div class="card-header card-header-default justify-content-between bg-header-sipat">
      <h6 class="card-body-title-secundary"><span class="fa fa-search"></span> Nuevo Movimiento</h6>
      <div class="card-option tx-24">
      </div><!-- card-option -->
    </div><!-- card-header -->

    <div class="card-body bg-body-sipat">
      <div id="resultadoRegistrarMovimiento"></div>
      <div class="card">

        <div class="card bd-0">
          <div class="card-body bg-body-sipat">
            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label" style="text-align: right;" for="reg_movimiento_fecha">Fecha: <span class="tx-danger">*</span></label>
              <div class="input-group col-sm-2 mg-t-10 mg-sm-t-0">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input id="reg_fecha_movimiento" name="reg_fecha_movimiento" type="text" size="10" class="form-control fc-datepicker" placeholder="DD/MM/YYYY" autofocus="autofocus">
              </div>

            </div><!-- row -->

            <div class="row row-xs">
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="hidden" class="form-control" id="reg_ubicacion_origen_id" name="reg_ubicacion_origen_id">
              </div>
            </div><!-- row -->

            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label" style="text-align: right;">Ubicación Origen: <span class="tx-danger">*</span></label>
              
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <div class="input-group">
                  <input type="text" class="form-control" id="reg_ubicacion_origen" name="reg_ubicacion_origen" placeholder="UBICACIÓN ORIGEN" readonly>
                  <span class="input-group-btn">
                    <button id="btnUbicacionOrigen" style="cursor:pointer;" class="btn bd bg-white tx-gray-600" type="button" data-toggle="modal" data-target="#verUbicacionesOrigen"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </div>
            </div><!-- row -->

            <div class="row row-xs">
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input type="hidden" class="form-control" id="reg_ubicacion_destino_id" name="reg_ubicacion_destino_id">
              </div>
            </div><!-- row -->

            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label" style="text-align: right;">Ubicación Destino: <span class="tx-danger">*</span></label>
              
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <div class="input-group">
                  <input type="text" class="form-control" id="reg_ubicacion_destino" name="reg_ubicacion_destino" placeholder="UBICACIÓN DESTINO" readonly>
                  <span class="input-group-btn">
                    <button id="btnUbicacionDestino" style="cursor:pointer;" class="btn bd bg-white tx-gray-600" type="button" data-toggle="modal" data-target="#verUbicacionesDestino"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </div>
            </div><!-- row -->

            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label" style="text-align: right;">Motivo: <span class="tx-danger">*</span></label>
              <div class="col-sm-2 mg-t-10 mg-sm-t-0">
                <select style="cursor:pointer;" class="form-control" id="reg_motivo" name="reg_motivo">
                  <option value="F">FALTANTE</option>
                  <option value="I">INSERVIBLE</option>
                  <option value="P">PRESTAMO</option>
                  <option value="T" selected>TRASPASO</option>
                </select>
              </div>
            </div><!-- row -->

            <div class="row row-xs mg-t-20">
              <label class="col-sm-2 form-control-label" style="text-align: right;">Bien de Uso: </label>
              <div class="col-sm-1 mg-t-10 mg-sm-t-0 input-group">
                <input type="text" style="text-align: center;" class="form-control" for="reg_entidad" id="reg_entidad" name="reg_entidad" title="Entidad" maxlength="2" onkeypress='return validarCampoNumerico(event)'>
              </div>
              <div class="col-sm-1 mg-t-10 mg-sm-t-0 input-group">
                <input type="text" style="text-align: center;" class="form-control" for="reg_reparticion" id="reg_reparticion" name="reg_reparticion" title="Repartición" maxlength="2" onkeypress='return validarCampoNumerico(event)'>
              </div>
              <div class="col-sm-1 mg-t-10 mg-sm-t-0 input-group">
                <input type="text" style="text-align: center;" class="form-control" for="reg_dependencia" id="reg_dependencia" name="reg_dependencia" title="Dependencia" maxlength="3" onkeypress='return validarCampoNumerico(event)'>
              </div>
              <div class="col-sm-1 mg-t-10 mg-sm-t-0 input-group">
                <input type="text" style="text-align: center;" class="form-control" for="reg_numero_orden" id="reg_numero_orden" name="reg_numero_orden" title="N° de orden" maxlength="7" onkeypress='return validarCampoNumerico(event)'>
              </div>
              <div class="col-sm-1 mg-t-10 mg-sm-t-0 input-group">
                <button id="btnAgregarBien" type="button" style="cursor:pointer;" class="btn btn-primary mg-r-5" onclick="agregarBienUbicacion();"><i class='fa fa-plus'></i> Agregar Bien</button>
              </div><!-- form-layout-footer -->
            </div><!-- row -->


          </div><!-- card-body -->
        </div><!-- card -->

        <div class="row row-sm mg-t-15 mg-sm-t-20"></div>

        <div class="card bd-0">
          <div class="card-body bg-body-sipat">
            <div class="table-wrapper">
              <table id="dtBienesMovimiento" id="dtBienesMovimiento" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th style="display:none;">DEPENDENCIA_ID</th>
                    <th style="display:none;">NUMERO_ORDEN</th>
                    <th class="wd-5p">ROTULADO</th>
                    <th class="" >DESCRIPCION</th>
                    <th class="wd-5p" >MOTIVO</th>
                    <th class="wd-5p" >ACCIÓN</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div><!-- table-wrapper -->
          </div>
        </div><!-- card -->

        <div class="row row-xs">
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="hidden" class="form-control" id="login" name="login" value="<?php echo $_SESSION["temiandu"]["login"]; ?>">
          </div>
        </div><!-- row -->

        <div class="form-layout-footer mg-t-30">
          <button type="submit" style="cursor:pointer;" class="btn btn-success mg-r-5">Guardar</button>
          <button style="cursor:pointer;" class="btn btn-secondary" onclick="recargarPagina();">Cancelar</button>
        </div><!-- form-layout-footer -->

      </div><!-- card -->


    </div><!-- card-body -->
  </form>
</div><!-- card -->


<?php include(__DIR__ . "/../../paths/foot_files.php"); ?>

<script type="text/javascript" src="../js/utilidadesGUI.js"></script>
<script type="text/javascript" src="agregarMovimientoInterno/agregarMovimientoInterno.js"></script>
