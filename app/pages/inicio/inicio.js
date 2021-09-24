/*#########################################################
##################   PAGINA INICIO   ######################
###########################################################*/
//INICIO DE PAGINA
$(document).ready(function () {
    cargarCantidades();
    cargarHistorialCargaUsuario();
    setInterval(function () { cargarIntervalos(); }, 60000)
});

//CARGAR CANTIDAD TOTAL DE BIENES Y CARGADOS EN LA ULTIMA SEMANA
function cargarCantidades() {
    $.ajax({
        type: "post",
        url: "../scripts/inicio/get_cantidades.php",
        success: function (data) {
            var obj = JSON.parse(data);
            document.getElementById("ini_cantidad_total").innerHTML = obj.data[0].total;
            document.getElementById("ini_ultima_semana").innerHTML = obj.data[0].ultimaSemana;
        }
    });
}

//CARGAR HISTORIAL DE CARGA POR USUARIO
function cargarHistorialCargaUsuario() {
    $('#dtHistorialUsuario').dataTable({
        iDisplayLength: 10,
        responsive: true,
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
        ordering:false,
        searching:false,
        destroy: true,
        ajax: {
            type: "post",
            url: "../scripts/inicio/get_historial_usuario_dt.php",
        },
        columns: [
            { data: "usuario", width: "1%" },
            { data: "nombre" },
            { data: "carga"},
            { data: "fecha"},
        ]
    });
}

//INTERVALO DE ACTUALIZACION DE LA PAGINA DE INICIO
function cargarIntervalos() {
    cargarCantidades();
    cargarHistorialCargaUsuario();
}