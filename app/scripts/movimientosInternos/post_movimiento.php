<?php
include_once(__DIR__ . "/../../controllers/MovimientoCont.php");
include_once(__DIR__ . "/../../models/MovimientoInterno.php");

$movimientoCont = new MovimientoCont();
$movimientoInterno = new MovimientoInterno();

// CABECERA
$fecha = $_POST["reg_fecha_movimiento"];
$remitenteId =  $_POST["reg_ubicacion_origen_id"];
$destinatarioId =  $_POST["reg_ubicacion_destino_id"];

$movimientoInterno->setFecha($fecha);
$movimientoInterno->setRemitenteId($remitenteId);
$movimientoInterno->setDestinatarioId($destinatarioId);
$login = $_POST["login"];

//DETALLE
$detalles = json_decode($_GET["detalles"]);

foreach ($detalles as $bien) {
  $dependenciaId = $bien->dep_id;
  $numeroOrden =  $bien->nro_orden;
  $motivo =  $bien->motivo;
  $movimientoInterno->addDetalle(0, $dependenciaId, $numeroOrden, '', '', $motivo);
}

//$respuesta = json_decode($movimientoCont->registrarMovimientoInterno($movimientoInterno, $login),true);

$respuesta = $movimientoCont->registrarMovimientoInterno($movimientoInterno, $login);
echo $respuesta;