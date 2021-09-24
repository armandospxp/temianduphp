<?php
include_once (__DIR__."/../../controllers/MovimientoCont.php");
$tabla = "";
$numero = $_GET["numero"];
$periodo = $_GET["periodo"];

$movCont = new MovimientoCont();
$movimiento = $movCont->obtenerMovimientoInterno($numero, $periodo);

$numero = $movimiento->getNumero();
$periodo = $movimiento->getAnho();

$tabla = '{"numero":"' . $numero . '",
    "periodo":"' . $periodo . '"},';

$tabla = substr ( $tabla, 0, strlen ( $tabla ) - 1 );

echo '{"data":[' . $tabla . ']}';
