<?php

$active_inicio = "";

$active_sistema = "";

include("aside.php");
//include("../../paths/foot_files.php");
$title = "REGISTRAR VISITA - TEMIANDU";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php //include("/header.php"); ?>
    <div class="am-pagetitle">
        <h5 class="am-title"><?php echo $title ?></h5>
    </div><!-- am-pagetitle -->
<form method="post" id="registro_visita" action="">
<div class="container">
    <div class="card ">
    <div class="card-header card-header-default justify-content-between bg-header-sipat">
      <h6 class="card-body-title-secundary"><span class="fa fa-search"></span> NUEVA VISITA</h6>
      <div class="card-option tx-24">
      </div><!-- card-option -->
    </div><!-- card-header -->

    <div class="card-body bg-body-sipat">
        <input type="hidden" value="" name="id_visita" id="id_visita">
        <input type="hidden" value="" name="cedula_a" id="cedula_a">
        <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Fecha y Hora: <span class="tx-danger">*</span></label>
          <div class="col col-sm-2 input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="datepicker form-control" autocomplete="off" class="form-control" id="fecha" name="fecha" placeholder="FECHA" readonly required>
          </div>
          <div class="col col-sm-2 input-group">
              <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
              <input type="form-control col-sm-2" class="form-control"  autocomplete="off" id="hora_entrada" name="hora_entrada" placeholder="HORA ENTRADA" required>
        </div><!-- row -->
          <div class="col col-sm-2 input-group">
              <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
            <input type="datepicker form-control" class="form-control" autocomplete="off" id="hora_salida" name="hora_salida" placeholder="HORA SALIDA">
          </div>
        </div>
        <!-- row -->
        <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Visitante: <span class="tx-danger">*</span></label>
          <div class="col col-sm-2 input-group">
             <input type="text" class="form-control" id="cedula_b" autocomplete="off" name="cedula_b" placeholder="CI" style="text-transform:uppercase" required>
                <!button id="btnBuscarVisitante" style="cursor:pointer;" class="btn bd bg-white tx-gray-600" type="button" type="button" data-toggle="modal" data-target="#buscarVisitante"><!i class="fa fa-search"><!/i><!/button>
          </div>
          <div class="col col-sm-4 input-group">
              <input type="text" class="form-control" autocomplete="off"  type="form-control" id="visitante" name="visitante" placeholder="VISITANTE" style="text-transform:uppercase" required readonly>
              <span class="input-group-btn">
                <button id="btnAgregarVisitante" onclick="foco_cedula()" style="cursor:pointer;" class="btn btn-info" type="button" type="button" data-toggle="modal" data-target="#agregarVisitante"><i class="fa fa-plus"></i></button>
              </span>
        </div><!-- row -->
        </div>
             <div id="agregarVisitante" class="modal fade show">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><span class="fa fa-plus"></span> NUEVO VISITANTE</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body pd-20" style="width: 650px;">
                 <div class="card">
      <div class="card-body" style="width: 100%;">
                <script src="registrarVisita/registrarVisita.js"></script>
    <div class="card">
        <form id="crear_visitante" method="POST" action="{% url 'crear_visitante' %}">
        <div class="card">
      <div class="card-body">
          <div class="card" id="errores" name="errores">
              <p class="alert-danger" id="m_registrar" class="mg-b-5"></p>
          </div>
              <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Cedula: <span class="tx-danger">*</span></label>
          <div class="col-sm-6 mg-t-10 mg-sm-t-0">
            <div class="input-group" id="cedula">
                <input type="text" autocomplete="off" class="form-control" id="cedula_3" name="cedula_3" placeholder="CEDULA" style="text-transform:uppercase;" required>
            </div>
              <p class="alert-danger" id="m_cedula" class="mg-b-5"></p>
          </div>
    </div>
    <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Nombre: <span class="tx-danger">*</span></label>
          <div class="col-sm-6 mg-t-10 mg-sm-t-0">
            <div class="input-group">
                <input type="text" autocomplete="off" class="form-control" id="nombre" name="nombre" placeholder="NOMBRE" style="text-transform:uppercase">
            </div>
              <p class="alert-danger" id="m_nombre" class="mg-b-5"></p>
          </div>
    </div>
        <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Apellido: <span class="tx-danger">*</span></label>
          <div class="col-sm-6 mg-t-10 mg-sm-t-0">
            <div class="input-group">
                <input type="text" autocomplete="off" class="form-control" id="apellido" name="apellido" placeholder="APELLIDO" style="text-transform:uppercase">
            </div>
              <p class="alert-danger" id="m_apellido" class="mg-b-5"></p>
          </div>
        </div>
          <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Nacionalidad: <span class="tx-danger">*</span></label>
          <div class="col-sm-6 mg-t-10 mg-sm-t-0">
            <div class="input-group">
                <select class="form-control select2-sm" id="nacionalidad" name="nacionalidad" placeholder="NACIONALIDAD" required style="text-transform:uppercase"></select>
            </div>
              <p class="alert-danger" id="m_nacionalidad" class="mg-b-5"></p>
          </div>
        </div>
            <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Telefono: </label>
          <div class="col-sm-6 mg-t-10 mg-sm-t-0">
            <div class="input-group">
                <input type="hidden" id="edit" name="edit" value="2">
                <input type="text" autocomplete="off" class="form-control" id="telefono" maxlength="12" name="telefono" placeholder="telefono" style="text-transform:uppercase" >
            </div>
          </div>
            </div>

<!div class="row row-xs mg-t-20">
    <!button type="button" onclick="registro_visitante()" class="btn btn-success mg-r-5" id="GuardarVisitante"><!/button>
<!/div>
</div>
        </div>
            </form>
      </div>

<div class="modal fade" id="msgValidacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content bd-0">

            <form class="form-horizontal">

                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Información</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body pd-25">
                   <div class="alert alert-danger" role="alert">
                    <p id="modalMensaje" class="mg-b-5"></p>
                  </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Aceptar</button>
                </div>
            </form>


        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

    </div>
    </div>
            </div>
          <div class="modal-footer">
               <button type="button" onclick="registro_visitante()" class="btn btn-success mg-r-5" id="GuardarVisitante">Guardar</button>
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
            <div id="buscarVisitante" class="modal fade show">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><span class="fa fa-search"></span>Búsqueda de Visitantes</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body pd-20" style="
    width: 100%;">
                <table class="table-bordered table-responsive table display nowrap dataTable no-footer dtr-inline" id="tblBusquedaVisitantes" style="width: 100%; cursor: pointer;">
                    <thead>
                    <tr>
                        <th>CI:</th>
                        <th>Nombre:</th>
                        <th>Apellido:</th>
                        <th>Teléfono:</th>
                    </tr>
                    </thead>
                </table>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
          <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Destino: <span class="tx-danger">*</span></label>
          <div class="col-sm-6 mg-t-10 mg-sm-t-0">
            <div class="input-group">
                <input type="text" class="form-control" id="destino" onkeypress="TabKey(e, 'observaciones')" style="text-transform:uppercase" name="destino" placeholder="DESTINO" required readonly>
              <span class="input-group-btn">
                <button id="btnBuscarDestino" style="cursor:pointer;" class="btn bd bg-white tx-gray-600" type="button" data-toggle="modal" data-target="#buscarDestino"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
              <div id="buscarDestino" class="modal fade show">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><span class="fa fa-search"></span>Busqueda de Dependencia</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body pd-20" style="
    width: 100%;">
                <table class="table-bordered table-responsive table display nowrap dataTable no-footer dtr-inline" style="width: 100%;cursor: pointer;" id="tblBusquedaDestino">
                    <thead>
                        <th>Id:</th>
                        <th>Dependencia:</th>
                    </thead>
                </table>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
        </div><!-- row -->
        <div class="row row-xs mg-t-20">
          <label class="col-sm-2 form-control-label">Observaciones:</label>
          <div class="col-sm-6 mg-t-10 mg-sm-t-0">
              <textarea class="form-control" cols="2" placeholder="INGRESE ALGUNA OBSERVACION" style= "text-transform:uppercase;" name="observaciones" id= "observaciones"></textarea>

          </div>
        </div><!-- row -->
    <!-- card -->
<div class="form-layout-footer"style="
    margin-left: 30px;
    margin-top: 30px;">
    <button type="button" onclick="control_frm_visita()" class="btn btn-success mg-r-5" id="guardarVisita">Guardar</button>
    <button type="button" onclick="limpiar_campos()" class="btn btn-secondary mg-r-5">Cancelar</button>
</div>
        </div>
    </div>
  </div>
  </form>
    <div class="container container-fluid" style="
    margin-top: 10px;
">
    <div class="card">
    <div class="card-header card-header-default justify-content-between bg-header-sipat">
      <h6 class="card-body-title-secundary"><span class="fa fa-search"></span> LISTADO VISITANTES DEL DIA</h6>
      <div class="card-option tx-24">

      </div><!-- card-option -->
    </div><!-- card-header -->

      <div class="card-body">
          <table class="table table-responsive" style="width: 100%" id="tblListadoVisitas">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>N° DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>NACIONALIDAD</th>
                        <th>DEPENDENCIA DESTINO</th>
                        <th>FECHA</th>
                        <th>HORA ENTRADA</th>
                        <th>HORA SALIDA</th>
                        <th>OBSERVACIONES</th>
                        <th>ACCIONES</th>
                    </tr>
                    </thead>
          <tbody>
          </tbody>
                </table>
    </div>
    </div>
    </div>
    <div class="modal fade" id="msgError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content bd-0">
            <form class="form-horizontal">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Información</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                   <div class="alert alert-danger" role="alert">
                    <p id="modalMensajeVisita" class="mg-b-5"></p>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Aceptar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
     <div class="modal fade show" name= "eliminarVisita" id="eliminarVisita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <form class="form-horizontal">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Información</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    {% include 'visitas/visita_delete.html' %}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" onclick="eliminar_visita()" type="button">Si, eliminar</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
            </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

                 <div id="error_visitante" class="modal fade show">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><span class="icon ion-information-circled"></span> ERROR VISITANTE</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body pd-20" style="width: 650px;">
                 <div class="card">
      <div class="card-body" style="width: 100%;">
        <h6 class="text-danger text-center">No se encuentra registrado, favor registre primero en el sistema</h6>
    </div>
    </div>
            </div>
          <div class="modal-footer">
            <button type="button" id="btn_modal_error_visitante" name="btn_modal_error_visitante" onclick="foco_cedula()" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->

<?php include(__DIR__ . "/../../paths/foot_files.php"); ?>