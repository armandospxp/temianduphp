<?php
include_once (__DIR__."/../../controllers/VisitaCont.php");

$tabla = "";
$listado_visita_cont = new VisitaCont();
$listado_visita = $listado_visita_cont->obtenerVisitantes();

for($i = 0; $i < count($listado_visita); $i ++) {

    $id = $listado_visita[$i]->getId();
    $documento = $listado_visita[$i]->getDocumenot();
    $nombre = $listado_visita[$i]->getNombre();
    $apellido = $listado_visita[$i]->getApellido();
    $id_nacionalidad = $listado_visita[$i]->getIdNacionalidad();
    $telefono = $listado_visita[$i]->getTelefono();

    $tabla .= '{"id":"' . $id . '",
    "jerarquia":"' . $jerarquia . '",
    "codigo":"' . $codigo . '",
    "descripcion":"' . $descripcion . '",
    "oficina":"' . $oficina . '",
    "tipo":"' . $tipo . '"},';
}

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );
echo '{"data":[' . $tabla . ']}';