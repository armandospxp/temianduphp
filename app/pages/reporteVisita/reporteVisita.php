<?php

$active_inicio = "";

$active_sistema = "";

include("aside.php");
//include("../../paths/foot_files.php");
$title = "LISTADO VISITAS - TEMIANDU";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php //include("/header.php"); ?>
    <div class="am-pagetitle">
        <h5 class="am-title"><?php echo $title ?></h5>
    </div><!-- am-pagetitle -->
    <title>LISTADO VISITAS - TEMIANDU</title>
     <!-- Page Wrapper -->
        <div class="card" style="background-color:transparent">
            <div class="card-body">
                    <form class="form-horizontal" method="get">
                        <h6 class="card-body-title">Busqueda por rango de fecha</h6>
                        <div class="form-layout">
                            <div class="row-mg-b-5">
                                <div class="d-flex align-items-center justify-content-center ht-md-80 bd col-sm-6 mg-t-10 mg-sm-t-0" style="width: 100%">
                                    <div class="d-md-flex pd-y-20 pd-md-y-0" style="width: 100%">
                                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        <input class="datepicker form-control" name="fecha_desde" autocomplete="off" placeholder="INGRESE FECHA DESDE">
                                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        <input class="datepicker2 form-control" name="fecha_hasta" autocomplete="off" placeholder="INGRESE FECHA HASTA">
                                    </div>
                                    <button style="cursor:pointer" id="btnBuscarResponsable_fc10" class="btn btn-info pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <br>
                 <form class="form-horizontal" method="get">
                        <h6 class="card-body-title">Busqueda por Visitante</h6>
                        <div class="form-layout">
                            <div class="row-mg-b-5">
                                <div class="d-flex align-items-center justify-content-center ht-md-80 bd col-sm-6 mg-t-10 mg-sm-t-0" style="width: 100%">
                                    <div class="d-md-flex pd-y-20 pd-md-y-0" style="width: 100%">
                                        <input class="form-control" id="visitante" name="visitante" autocomplete="off" placeholder="VISITANTE">
                                        <span class="input-group-btn">
                                            <button id="btnBuscarVisitante" style="cursor:pointer;" class="btn bd bg-white tx-gray-600" type="button" data-toggle="modal" data-target="#buscarVisitante" autofocus="autofocus"><i class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                    <button style="cursor:pointer" id="btnBuscarResponsable_fc10" class="btn btn-info pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript">
                </script>
          </div>
        </div><!-- row -->
        <br>
    <div class="container">
            <div class="card">
                <div class="card-header card-header-default justify-content-between bg-header-sipat">
                <h6 class="card-body-title-secundary"><span class="fa fa-search"></span> LISTADO VISITAS</h6>
                <div class="card-option tx-24">
                    <a href="{% url 'reporte_visitas' %}">
              <button style="cursor:pointer" type="submit" class="btn btn-primary btn btn-info pd-y-13 pd-x-20 bd-0 mg-md-l-10 mg-t-10 mg-md-t-0">
                <i class="fa fa-download"></i>
                  Imprimir
              </button>
            </a>
                </div><!-- card-option -->
            </div><!-- card-header -->
            <div class="card-body bg-body-sipat">
            <div id="dataTables_filter">
        <label>
                Buscar: .  <input id="searchTerm" type="search" onkeyup="doSearch()" />
            </label>
            </div>
                <table class="table table-responsive dataTable no-footer" id="tblListadoVisitasCustom" name="tblListadoVisitasCustom">
                    <thead>
                        <th>#</th>
                        <th>N° DE CEDULA</th>
                        <th>VISITANTE</th>
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
            <td style="display: flex;">
				<a class="btn btn-info" href="{% url 'editar_visita' visita.id_visita %}">
                    <i class="icon ion-edit"></i>
                </a>
                <btn class="btn btn-danger" id="btneliminar" data-toggle="modal" data-target="#eliminarVisitacustom" onclick="function registar_id_eliminar_custom(b={{ visita.id_visita }}) {
                    console.log(b);
                    $('#id_visita_eliminar').val(b);
                        }
                        registar_id_eliminar_custom({{ visita.id_visita }})"><i class="fa fa-trash"></i>
                </btn>
			</td>
    </tr>
    </tbody>
                </table>
        </div>
                <div id="buscarVisitante" class="modal fade show">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
          <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><span class="fa fa-search"></span>Busqueda de Visitante</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body pd-20" style="width: 100%">
                <table class="table-bordered table-responsive table display nowrap dataTable no-footer dtr-inline" style="width: 100%; cursor: pointer" id="tblBusquedaVisitantes">
                    <thead>
                        <th>Cedula:</th>
                        <th>Nombre:</th>
                        <th>Apellido:</th>
                        <th>Telefono:</th>
                    </thead>
                </table>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
        </div>
    </div>
         <div class="modal fade show" name= "eliminarVisitacustom" id="eliminarVisitacustom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                    <button class="btn btn-danger" onclick="eliminar_visita_custom()" type="button">Si, eliminar</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
</script>