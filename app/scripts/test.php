<?php
include_once (__DIR__ . "/../config/ConnectionPg.php");

$conexionJoaju = new ConnectionPgJoaju();
$conexionTemiandu = new ConnectionPgTemiandu();

//// CABECERA
//$fecha = '11/06/2021';
//$remitenteId =  141;
//$destinatarioId =  22;
//$login='dpane';
//
//$movimientoInterno->setFecha($fecha);
//$movimientoInterno->setRemitenteId($remitenteId);
//$movimientoInterno->setDestinatarioId($destinatarioId);
//
////DETALLE
//$detalles = json_decode('[{"dep_id":141,"nro_orden":39,"motivo":"T"}]');
//
//foreach ($detalles as $bien) {
//  $dependenciaId = $bien->dep_id;
//  $numeroOrden =  $bien->nro_orden;
//  $motivo =  $bien->motivo;
//  $movimientoInterno->addDetalle(0, $dependenciaId, $numeroOrden, '', '', $motivo);
//}

//$respuesta = $movimientoCont->registrarMovimientoInterno($movimientoInterno, $login);
//
//$aux0=json_decode($respuesta,true);
//echo $aux0[0]["respuesta"];
//echo " - ".$aux0[0]["numero"];
//echo " - ".$aux0[0]["periodo"];
