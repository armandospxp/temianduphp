<?php
include_once (__DIR__."/../../controllers/DependenciaCont.php");

$tabla = "";
$ruc = $_POST["ruc"];
$dependenciaCont = new dependenciaCont();
$dependencia = $dependenciaCont->obtenerDependencia($id);

$id = $dependencia->getId();
$entidad = $dependencia->getEntidad();
$reparticion = $dependencia->getReparticion();
$codigo = $dependencia->getCodigo();

$tabla = '{"id":"' . $id . '",
    "entidad":"' . $entidad . '",
    "reparticion":"' . $reparticion . '",
    "codigo":"' . $codigo . '"},';

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );

echo '{"data":[' . $tabla . ']}';
