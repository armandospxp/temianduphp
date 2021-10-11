<?php
include_once (__DIR__."/../../controllers/DependenciaCont.php");

$tabla = "";
$depCont = new DependenciaCont();
$dependencias = $depCont->obtenerDependenciasModal();

for($i = 0; $i < count($dependencias); $i ++) {
  
  $id = $dependencias[$i]->getId();
  $descripcion = $dependencias[$i]->getDescripcion();

  $accion = "<button type='submit' class='btn btn-primary' title='Seleccionar' onclick=obtenerDatos('".$id.
            "')></button>";
  $tabla .= '{"id":"' . $id . '",
    "dependencia":"' . $descripcion . '"},';
}

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );
echo '{"data":[' . $tabla . ']}';
