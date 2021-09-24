<?php
include_once (__DIR__."/../../controllers/InicioCont.php");

$tabla = "";
$iniCont = new InicioCont();
$cantidadTotal = $iniCont->obtenerCantidadBienes();
$cantidadUltimaSemana = $iniCont->obtenerCantidadBienesUltimaSemana();

$tabla = '{"total":"' . $cantidadTotal . '",
    "ultimaSemana":"' . $cantidadUltimaSemana . '"},';

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );

echo '{"data":[' . $tabla . ']}';
