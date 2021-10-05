/*#########################################################
############   PAGINA MOVIMIENTO INTERNO        ###########
###########################################################*/
//INCIO DE PAGINA
$(document).ready(function () {
  mostrarCalendario();
  cargarUbicacionOrigenModal();
  cargarUbicacionDestinoModal();
});

//VARIABLES
var detallesDatatable = new Array();
var numero_MIB = 0;
var periodo_MIB = 0;

var formulario = document.getElementById("frmGuardarMovimiento");

var dtBienes = $('#dtBienesMovimiento').DataTable({
  keys: true,
  searching: false,
  responsive: true,
  scrollCollapse: true,
  paging: false,
  oLanguage: {
    sEmptyTable: "No hay registros para mostrar."
  },
  language: {
    info: "Mostrando _START_ al _END_ de _TOTAL_ registros",
  },
  columnDefs: [
    {
      "targets": [0],
      "visible": false,
      "searchable": false
    },
    {
      "targets": [1],
      "visible": false,
      "searchable": false
    },
    {
      "targets": [4],
      "orderable": false,
      "width": "2%"
    },
    {
      "targets": [5],
      "orderable": false,
      "width": "2%"
    }

  ]
});

//CARGAR UBICACION ORIGEN EN EL FORMULARIO
function cargarUbicacionOrigenModal() {
  var table = $('#dtUbicacionesOrigenModal').DataTable({
    keys: true,
    iDisplayLength: 10,
    responsive: true,
    oLanguage: {
      sEmptyTable: "No hay registros para mostrar."
    },
    language: {
      searchPlaceholder: 'Buscar...',
      sSearch: '',
      lengthMenu: '_MENU_ items/página',
      paginate: {
        "previous": "Anterior",
        "next": "Siguiente"
      },
      info: "Mostrando _START_ al _END_ de _TOTAL_ registros",
    },
    order: [[1, "asc"]],
    destroy: true,
    ajax: {
      type: "post",
      url: "../scripts/dependencias/get_dependencias_dt_modal.php",
    },
    columns: [
      { data: "id", width: "1%" },
      { data: "entidad" },
      { data: "reparticion" },
      { data: "codigo" },
      { data: "descripcion", width: "5%" },
    ],
    columnDefs: [
      {
        "targets": [1],
        "visible": false,
        "searchable": false
      },
      {
        "targets": [2],
        "visible": false,
        "searchable": false
      },
      {
        "targets": [3],
        "visible": false,
        "searchable": false
      }
    ]
  });
  table
    .on('key', function (e, datatable, key, cell, originalEvent) {
      if (key === 13) {
        dtBienes.rows().remove().draw();
        var id = table.rows('.selected').data()[0].id;
        var descripcion = table.rows('.selected').data()[0].descripcion;
        var codigo = table.rows('.selected').data()[0].entidad + "-" + table.rows('.selected').data()[0].reparticion + "-" + table.rows('.selected').data()[0].codigo;

        $("#reg_ubicacion_origen_id").val(id);
        $("#reg_ubicacion_origen_codigo").val(codigo);
        $("#reg_ubicacion_origen").val(descripcion);
        $("#verUbicacionesOrigen").modal("hide");
      }
    })
    .on('key-focus', function (e, datatable, cell) {
      datatable.rows().deselect();
      datatable.row(cell.index().row).select();
    })
    .on('dblclick', 'tr', function () {
      dtBienes.rows().remove().draw();
      var id = table.rows('.selected').data()[0].id;
      var descripcion = table.rows('.selected').data()[0].descripcion;
      var codigo = table.rows('.selected').data()[0].entidad + "-" + table.rows('.selected').data()[0].reparticion + "-" + table.rows('.selected').data()[0].codigo;

      $("#reg_ubicacion_origen_id").val(id);
      $("#reg_ubicacion_origen_codigo").val(codigo);
      $("#reg_ubicacion_origen").val(descripcion);
      $("#verUbicacionesOrigen").modal("hide");

    });
}

//CARGAR LISTADO VISITAS EN FORMULARIO
function cargarUbicacionDestinoModal() {
  var table = $('#dtUbicacionesDestinoModal').DataTable({
    keys: true,
    iDisplayLength: 10,
    responsive: true,
    oLanguage: {
      sEmptyTable: "No hay registros para mostrar."
    },
    language: {
      searchPlaceholder: 'Buscar...',
      sSearch: '',
      lengthMenu: '_MENU_ items/página',
      paginate: {
        "previous": "Anterior",
        "next": "Siguiente"
      },
      info: "Mostrando _START_ al _END_ de _TOTAL_ registros",
    },
    order: [[1, "asc"]],
    destroy: true,
    ajax: {
      type: "post",
      url: "../scripts/dependencias/get_dependencias_dt_modal.php",
    },
    columns: [
      { data: "id", width: "1%" },
      { data: "entidad" },
      { data: "reparticion" },
      { data: "codigo" },
      { data: "descripcion", width: "5%" },
    ],
    columnDefs: [
      {
        "targets": [1],
        "visible": false,
        "searchable": false
      },
      {
        "targets": [2],
        "visible": false,
        "searchable": false
      },
      {
        "targets": [3],
        "visible": false,
        "searchable": false
      }
    ]
  });
  table
    .on('key', function (e, datatable, key, cell, originalEvent) {
      if (key === 13) {
        var id = table.rows('.selected').data()[0].id;
        var descripcion = table.rows('.selected').data()[0].descripcion;
        var codigo = table.rows('.selected').data()[0].entidad + "-" + table.rows('.selected').data()[0].reparticion + "-" + table.rows('.selected').data()[0].codigo;

        $("#reg_ubicacion_destino_id").val(id);
        $("#reg_ubicacion_destino_codigo").val(codigo);
        $("#reg_ubicacion_destino").val(descripcion);
        $("#verUbicacionesDestino").modal("hide");
      }
    })
    .on('key-focus', function (e, datatable, cell) {
      datatable.rows().deselect();
      datatable.row(cell.index().row).select();
    })
    .on('dblclick', 'tr', function () {
      var id = table.rows('.selected').data()[0].id;
      var descripcion = table.rows('.selected').data()[0].descripcion;
      var codigo = table.rows('.selected').data()[0].entidad + "-" + table.rows('.selected').data()[0].reparticion + "-" + table.rows('.selected').data()[0].codigo;

      $("#reg_ubicacion_destino_id").val(id);
      $("#reg_ubicacion_destino_codigo").val(codigo);
      $("#reg_ubicacion_destino").val(descripcion);
      $("#verUbicacionesDestino").modal("hide");

    });
}

//CARGAR BIENES POR UBICACION
function agregarBienUbicacion() {
  //ubicacion origen
  var ubicacion_id = document.getElementById("reg_ubicacion_origen_id").value;
  //construccion del rotulado
  var entidad = document.getElementById("reg_entidad").value;
  var reparticion = document.getElementById("reg_reparticion").value;
  var dependencia = document.getElementById("reg_dependencia").value;
  var numero_orden = completarCeroIzquierda(parseInt(document.getElementById("reg_numero_orden").value), 7);
  var rotulado = entidad + "-" + reparticion + "-" + dependencia + "-" + numero_orden;
  //motivo del movimiento
  var motivo = document.getElementById("reg_motivo").value;
  //acciones
  var accion = "<button style='cursor:pointer' type='button' class='btn btn-danger' title='Eliminar Bien' id=" + rotulado + " onclick=eliminarBien('" + rotulado + "')><i class='fa fa-trash'></i></button>";
  if (validarAgregarBien(rotulado)) {
    //se agregan los bienes al datatable, si existen y corresponde a la ubicacion de origen
    $.ajax({
      type: "post",
      url: "../scripts/bienes/get_bien_dependencia.php",
      data: "rotulado=" + rotulado + "&ubicacion=" + ubicacion_id,
      success: function (data) {
        var obj = JSON.parse(data);
        if (obj.data[0].rotulado == '') {
          document.getElementById("modalMensaje").innerHTML = "[ERROR] No Existe el Bien de Uso o no se encuentra en la ubicación de origen!";
          $('#msgValidacion').modal('show');
        } else {
          dtBienes.row.add([
            obj.data[0].dependenciaId,
            obj.data[0].numeroOrden,
            obj.data[0].rotulado,
            obj.data[0].descripcion.replace("&quot;", '\"'),
            motivo,
            accion
          ]).draw(false);
          iniciarNuevaCarga();
        }

      }
    });
  } else {
    document.getElementById("modalMensaje").innerHTML = "[ERROR] El Bien ya se encuentra cargado!";
    $('#msgValidacion').modal('show');
  }
}

function eliminarBien(rotulado) {
  dtBienes.row($("#" + rotulado).parents('tr')).remove().draw();
}

function iniciarNuevaCarga() {
  document.getElementById("reg_entidad").value = "";
  document.getElementById("reg_reparticion").value = "";
  document.getElementById("reg_dependencia").value = "";
  document.getElementById("reg_numero_orden").value = "";
  document.getElementById("reg_entidad").focus();
}

function cargarBienesMover() {
  var detalles = dtBienes.rows().data().toArray();
  var bien = "";
  detalles.forEach(element => {
    bien = '{"dep_id":' + element[0] + ',"nro_orden":' + element[1] + ',"motivo":"' + element[4] + '"}';
    detallesDatatable.push(bien);
  });
  detallesDatatable = '[' + detallesDatatable + ']';
}

formulario.addEventListener('submit', function (e) {
  e.preventDefault();
  cargarBienesMover();
  if (validarFormularioMovimiento()) {
    var datos = new FormData(formulario);
    fetch("../scripts/movimientosInternos/post_movimiento.php?detalles=" + detallesDatatable, {
      method: 'POST',
      body: datos
    })
      .then(res => res.json())
      .then(data => {
        if (data.respuesta === 't') {
          numero_MIB = data.numero;
          periodo_MIB = data.periodo;
          $('#msgConfirmacion').modal('show');
        } else if (data.respuesta === 'f') {
          $('#msgError').modal('show');
        }
      })
  }
});

//VALIDAR BIENES DE USO A MOVER
function validarAgregarBien(rotulado) {
  //validación para no duplicar bienes en datatable
  var control = true;
  var detalles = dtBienes.rows().data().toArray();
  detalles.forEach(element => {
    if (element[2].toUpperCase() === rotulado.toUpperCase()) {
      control = false;
    }
  });
  return control;
}

//VALIDAR FORMULARIO DE REGISRO 
function validarFormularioMovimiento() {
  var fecha = document.getElementById("reg_fecha_movimiento").value;
  var ubicacion_origen = document.getElementById("reg_ubicacion_origen").value;
  var ubicacion_destino = document.getElementById("reg_ubicacion_destino").value;
  var data = dtBienes.rows().data().toArray();

  if (fecha == null || fecha.length == 0 || verificar_fecha(fecha) == false) {
    document.getElementById("reg_fecha_movimiento").style.borderColor = "#b5352a";
    document.getElementById("reg_fecha_movimiento").style.boxShadow = "0 0 0 3px rgba(220, 53, 69, 0.5)";
    document.getElementById("modalMensaje").innerHTML = "[ERROR] Debe seleccionar una fecha válida para realizar un Movimiento Interno!";
    $('#msgValidacion').modal('show');
    return false;
  }

  if (ubicacion_origen == null || ubicacion_origen.length == 0) {
    document.getElementById("btnUbicacionOrigen").style.borderColor = "#b5352a";
    document.getElementById("btnUbicacionOrigen").style.boxShadow = "0 0 0 3px rgba(220, 53, 69, 0.5)";
    document.getElementById("modalMensaje").innerHTML = "[ERROR] Debe seleccionar una Ubicación de Origen para realizar un Movimiento Interno!";
    $('#msgValidacion').modal('show');
    return false;
  }

  if (ubicacion_destino == null || ubicacion_destino.length == 0) {
    document.getElementById("btnUbicacionDestino").style.borderColor = "#b5352a";
    document.getElementById("btnUbicacionDestino").style.boxShadow = "0 0 0 3px rgba(220, 53, 69, 0.5)";
    document.getElementById("modalMensaje").innerHTML = "[ERROR] Debe seleccionar una Ubicación de Destino para realizar un Movimiento Interno!";
    $('#msgValidacion').modal('show');
    return false;
  }

  if (ubicacion_origen == ubicacion_destino) {
    document.getElementById("btnUbicacionOrigen").style.borderColor = "#b5352a";
    document.getElementById("btnUbicacionOrigen").style.boxShadow = "0 0 0 3px rgba(220, 53, 69, 0.5)";
    document.getElementById("modalMensaje").innerHTML = "[ERROR] Obicación de Origen y Ubicación de Destino no pueden ser iguales!";
    $('#msgValidacion').modal('show');
    return false;
  }

  if ($.isEmptyObject(data)) {
    document.getElementById("modalMensaje").innerHTML = "[ERROR] No hay bienes cargados!";
    $('#msgValidacion').modal('show');
    return false;
  }

  return true;
}
//IMPRIMIR MOVIMIENTO INTERNO
function imprimirMovimiento() {
  var login = document.getElementById("login").value;
  window.open(
    "../scripts/movimientosInternos/ver_fc11.php?numero=" + numero_MIB + "&periodo=" + periodo_MIB + "&login=" + login,
    "_blank" // <- This is what makes it open in a new window.
  );
}
//RECARGAR PAGINA
function recargarPagina() {
  window.location.assign('?view=agregar_movimiento_interno');
}

//MOSTRAR MODAL DE UBICACIONES ORIGEN
$('#verUbicacionesOrigen').on('shown.bs.modal', function () {
  $("div.dataTables_filter input").focus();
});

//MOSTRAR MODAL DE UBICACIONES DESTINO
$('#verUbicacionesDestino').on('shown.bs.modal', function () {
  $("div.dataTables_filter input").focus();
});
