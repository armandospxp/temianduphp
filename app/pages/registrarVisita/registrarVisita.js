/*#########################################################
############   PAGINA REGISTAR VISITA      ###########
###########################################################*/
//INCIO DE PAGINA*
// $(document).ready(function () {
//   mostrarCalendario();
//   // cargarUbicacionOrigenModal();
//   // cargarUbicacionDestinoModal();
// });
window.onload = function (){
    mostrarCalendario();
    mostrarHoraEntrada();
};

//VARIABLES
var detallesDatatable = new Array();
var numero_MIB = 0;
var periodo_MIB = 0;
let nombre_global;

/* var formulario = document.getElementById("frmGuardarMovimiento");

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
 */

//funcion para registrar nuevo visitante
function registro_visitante(){
  var resultado = validar_campos_editar();
  if (resultado==true){
      $.ajax({
      data: {
          'cedula': $('#cedula_3').val(),
          'nombre': $('#nombre').val(),
          'apellido': $('#apellido').val(),
          'telefono': $('#telefono').val(),
          'nacionalidad': $('#nacionalidad').val(),
      },
      url: '/visitas/nuevo_visitante/',
      type: "post",
      success: function(response){

          let nombre_visitante = $('#nombre').val()+' '+$('#apellido').val()
          let cedula = $('#cedula_3').val();
          $('#cedula_b').val(cedula);
          $('#visitante').val(nombre_visitante)
          $('#cedula_3').val('');
          $('#nombre').val('');
          $('#apellido').val('');
          $('#cedula_a').val(cedula);
          Swal.fire(
                'Se ha guardado correctamente el nuevo visitante!',
                '',
                'success'
              ).then(function (){
                  $('#agregarVisitante').modal('hide');
              })
      },
          error: function (){
          document.getElementById("m_cedula").innerHTML = "[ERROR] Ya se registró el visitante en el sistema";
          $('#cedula_3').val('');
          $('#nombre').val('');
          $('#apellido').val('');
          $('#telefono').val('');
      }

  })
  }else {
      // $('#msgValidacion').modal('show');
     // $('#agregarVisitante').modal('show');
  }
  }
  //validar campos
function validar_campos_editar(){
    var cedula = document.getElementById("cedula_3").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var nacionalidad = document.getElementById("nacionalidad").value;

    if (cedula == null || cedula.length == 0) {
      document.getElementById("m_cedula").innerHTML = "[ERROR] Campo cédula no puede estar en blanco";
      return false;
    }

    if (nacionalidad == null || nacionalidad.length == 0) {
      document.getElementById("m_nacionalidad").innerHTML = "[ERROR] Campo nacionalidad no puede estar en blanco";
      return false;
    }

    if (nombre == null || nombre.length == 0) {
      document.getElementById("m_nombre").innerHTML = "[ERROR] Campo nombre no puede estar en blanco";
      return false;
    }

    if (apellido == null || apellido.length == 0) {
      document.getElementById("m_apellido").innerHTML = "[ERROR] Campo apellido no puede estar en blanco";
      return false;
    }

    // if ($.isEmptyObject(data)) {
    //   document.getElementById("modalMensaje").innerHTML = "[ERROR] No hay elementos cargados!";
    //   $('#msgValidacion').modal('show');
    //   return false;
    // }
    return true;
  }

//funcion que trabaja para parsear codigo mrz(se llamo equivocadamene ocr)
function ocr() {
    $('#cedula').on('change', function (e) {
        var campo_texto=$('#cedula_3').val()
        console.log(campo_texto)
        if (campo_texto.length > 14){
            console.log(campo_texto);
            if (campo_texto.substr(0, 1)!=='P'){
                var id = campo_texto.substr(5,7);
                var codigo_nacionalidad = campo_texto.substr(45, 3);
                var nombre_apellido= campo_texto.substr(59);
                var final_primer_apellido = nombre_apellido.search(';');
                var primer_apellido = nombre_apellido.substr(1, final_primer_apellido-1);
                var resto_nombre = nombre_apellido.substr(final_primer_apellido+1)
                var final_segundo_apellido = resto_nombre.search(';');
                var resto_nombre2 = resto_nombre.substr(final_segundo_apellido+2);
                var segundo_apellido = resto_nombre.substr(resto_nombre+1, final_segundo_apellido);
                var apellido_completo = primer_apellido + ' '+ segundo_apellido;
                var fin_primer_nombre = resto_nombre2.search(';');
                var primer_nombre = resto_nombre2.substr(0, fin_primer_nombre);
                var segundo_nombre = resto_nombre2.substr(fin_primer_nombre+1);
                console.log(segundo_nombre);
                console.log(segundo_nombre.search(';'))
                if (segundo_nombre.search(';')!=-1){
                    segundo_nombre = segundo_nombre.substr(0, segundo_nombre.search(';'));
                }
                var nombre_completo = primer_nombre +' ' +segundo_nombre;
                console.log(id);
                console.log(apellido_completo);
                // console.log(resto_nombre2);
                // console.log(primer_nombre);
                // console.log(segundo_nombre);
                console.log(nombre_completo);
                $('#cedula_3').val(id);
                // $('#cedula').val(id);
                $('#nombre').val(nombre_completo);
                $('#apellido').val(apellido_completo);
                $('#nacionalidad').val(codigo_nacionalidad);
                $('#telefono').focus();
        }else{
            console.log('es un pasaporte');
            let indice_id = campo_texto.search(';;;;;;;;;;;;;;');
            let id = campo_texto.substr(indice_id+14, 9);
            console.log(id);
            let indice_apellido = campo_texto.search(';');
            let apellido_completo = campo_texto.substr(indice_apellido+4, campo_texto.search(';;')-4);
            if (apellido_completo.search(';')!==-1){
                let indice_primer_apellido = apellido_completo.search(';');
                let primer_apellido = apellido_completo.substr(0, indice_primer_apellido);
                console.log(primer_apellido);
                let segundo_apellido = apellido_completo.substr(indice_primer_apellido+1);
                console.log(segundo_apellido);
                var apellido_completo1 = primer_apellido+' '+segundo_apellido;
            }
            let indice_nombre = campo_texto.search(';;');
            let nombre_completo = campo_texto.substr(indice_nombre+2, indice_id-16);
            console.log(nombre_completo);
            if (nombre_completo.search(';')!==-1){
                let indice_primer_nombre = nombre_completo.search(';');
                let primer_nombre = nombre_completo.substr(0, indice_primer_nombre);
                console.log(primer_nombre);
                let segundo_nombre = nombre_completo.substr(indice_primer_nombre+1);
                console.log(segundo_nombre);
                var nombre_completo1 = primer_nombre+' '+segundo_nombre;
            }

                $('#cedula').val(id);
                $('#nombre').val(nombre_completo1);
                $('#apellido').val(apellido_completo1);
                $('#nacionalidad').val(codigo_nacionalidad);
                $('#telefono').focus();
        }
        }
    });
};
/* //IMPRIMIR MOVIMIENTO INTERNO
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
 */
function limpiar_campos(){
    $('#cedula_b').val('');
    $('#visitante').val('');
    $('#destino').val('');
    $('#observaciones').val('');
    $('#cedula_3').val('');
    $('#nombre').val('');
    $('#apellido').val('');
    $('#nacionalidad').val('');
    $('#telefono').val('');
    location.reload();
}

function control_frm_visita() {
    if (validar_campos() == true) {
        $.ajax({
            data: {
                'fecha': $('#fecha').val(),
                'hora_entrada': $('#hora_entrada').val(),
                'hora_salida': $('#hora_salida').val(),
                'cedula': $('#cedula_a').val(),
                'visitante': $('#visitante').val(),
                'destino': $('#destino').val(),
                'observaciones': $('#observaciones').val(),
                success: function(response){
                    $('#cedula_b').val('');
                    $('#cedula_a').val('');
                    $('#visitante').val('')
                    $('#destino').val('')
                    $('#observaciones').val('')
                    $('#hora_salida').val('');
                    $('#nombre').val('');
                    $('#apellido').val('');
                    Swal.fire(
                        'Se ha guardado correctamente!',
                        '',
                        'success'
                    ).then(function (){
                        location.reload();
                    })
                },
            },
            url: '/visitas/nuevo/',
            type: "post"})
    } else {
        $('#msgError').modal('show');
    }
    function validar_campos() {
        var visitante = document.getElementById("visitante").value;
        var destino = document.getElementById("destino").value;
        var hora_entrada = document.getElementById("hora_entrada").value;
        var fecha = document.getElementById("fecha").value;

        if (visitante == null || visitante.length == 0 || visitante.value == "") {
            document.getElementById("modalMensajeVisita").innerHTML = "[ERROR] Campo Visitante no puede estar en blanco";
            return false;
        }
        if (hora_entrada == null || hora_entrada.length == 0) {
            document.getElementById("modalMensajeVisita").innerHTML = "[ERROR] Campo hora entrada no puede estar en blanco";
            return false;
        }
        if (fecha == null || fecha.length == 0) {
            document.getElementById("modalMensajeVisita").innerHTML = "[ERROR] Campo hora entrada no puede estar en blanco";
            return false;
        }

        if (destino == null || destino.length == 0) {
            document.getElementById("modalMensajeVisita").innerHTML = "[ERROR] Campo Destino no puede estar en blanco";
            return false;
        }
        return true;
    }
}

function mostrarCalendario() {
    // Datepicker
    var d = new Date();
    var fecha = d.getDate();
    $('#fecha').datepicker({
        dateFormat: 'dd/mm/yy',
        showOtherMonths: true,
        selectOtherMonths: true,
    }).datepicker("setDate", new Date());
}

function  mostrarHoraEntrada(){
    //jquery timepicker
    var d = new Date();
    var hora = d.getHours();
    hora = ("0" + hora).slice(-2);
    var minuto = d.getMinutes();
    minuto = ("0" + minuto).slice(-2);
    var hora_actual = hora+':'+minuto;
    $('#hora_entrada').datetimepicker({
        format: 'HH:mm',
    }).val(hora_actual);


}