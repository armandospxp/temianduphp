<?php
include_once (__DIR__."/../../controllers/VisitaCont.php");

$tabla = "";
$listado_visita_cont = new VisitaCont();
$listado_visita = $listado_visita_cont->obtenerConsultaDtVisita();

for($i = 0; $i < count($listado_visita); $i ++) {
  
  $id = $listado_visita[$i]->getId();
  $numero_documento = $listado_visita[$i]->getJerarquia();
  $nacionalidad = $listado_visita[$i]->getCodigo();
  $destino = $listado_visita[$i]->getDescripcion();
  $fecha = $listado_visita[$i]->getOficina();
  $tipo = $listado_visita[$i]->getTipo();
    
  $tabla .= '{"id":"' . $id . '",
    "jerarquia":"' . $jerarquia . '",
    "codigo":"' . $codigo . '",
    "descripcion":"' . $descripcion . '",
    "oficina":"' . $oficina . '",
    "tipo":"' . $tipo . '"},';
}

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );
echo '{"data":[' . $tabla . ']}';
