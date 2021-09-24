<?php
include_once(__DIR__ . "/../../controllers/InicioCont.php");

$tabla = "";
$iniCont = new InicioCont();
$historial = $iniCont->obtenerHistorialCargaUsuario();

for ($i = 0; $i < count($historial); $i++) {
    $usuario = $historial[$i]->getUsuario();
    $nombre = $historial[$i]->getNombre();
    $carga = $historial[$i]->getCarga();
    $fecha = $historial[$i]->getUltimaFechaCarga();
    
    $tabla .= '{"usuario":"' . $usuario . '",
        "nombre":"' . $nombre . '",
        "fecha":"' . $fecha . '",
        "carga":' . $carga . '},';
}

$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';
