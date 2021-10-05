<?php
include_once (__DIR__."/../../controllers/InicioCont.php");

$tabla = "";
$iniCont = new InicioCont();
$cantidadTotal = $iniCont->obtenerCantidadVisitas();
$cantidadUltimaSemana = $iniCont->obtenerCantidadVisitasUltimaSemana();

$tabla = '{"total":"' . $cantidadTotal . '",
    "ultimaSemana":"' . $cantidadUltimaSemana . '"},';

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );

echo '{"data":[' . $tabla . ']}';
