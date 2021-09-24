<?php
include_once (__DIR__."/../../controllers/DependenciaCont.php");

$tabla = "";
$depCont = new DependenciaCont();
$dependencias = $depCont->obtenerDependencias();

for($i = 0; $i < count($dependencias); $i ++) {
  
  $id = $dependencias[$i]->getId();
  $jerarquia = $dependencias[$i]->getJerarquia();
  $codigo = $dependencias[$i]->getCodigo();
  $descripcion = $dependencias[$i]->getDescripcion();
  $oficina = $dependencias[$i]->getOficina();
  $tipo = $dependencias[$i]->getTipo();
    
  $tabla .= '{"id":"' . $id . '",
    "jerarquia":"' . $jerarquia . '",
    "codigo":"' . $codigo . '",
    "descripcion":"' . $descripcion . '",
    "oficina":"' . $oficina . '",
    "tipo":"' . $tipo . '"},';
}

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );
echo '{"data":[' . $tabla . ']}';
