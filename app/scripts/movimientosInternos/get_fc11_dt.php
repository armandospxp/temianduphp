<?php
include_once(__DIR__ . "/../../controllers/MovimientoCont.php");

$tabla = "";
$movCont = new MovimientoCont();

if (!empty($_GET['numero'])) {
    $numero = htmlspecialchars($_GET["numero"]);
    $periodo = htmlspecialchars($_GET["periodo"]);
    $fc11 = $movCont->obtenerMovimientoInterno($numero, $periodo);
    $numero = $fc11->getNumero();
    if($numero<>null){
        $periodo = $fc11->getAnho();
        $fecha = $fc11->getFecha();
        $remitente = $fc11->getRemitente();
        $accion = "<button style='cursor:pointer' type='submit' class='btn btn-primary' title='Ver Movimiento' onclick=verFC11(" . $numero .
            "," . $periodo . ")><i class='fa fa-eye'></i></button>" .
            " <button style='cursor:pointer' type='submit' class='btn btn-secondary' title='Descargar Movimiento' onclick=descargarFC11('" . $numero .
            "','" . $periodo . "') ><i class='fa fa-download'></i></button>" .
            " <button type='submit' class='btn btn-danger' title='Borrar Movimiento' onclick=obtenerDatosEliminar('" . $numero .
            "','" . $periodo . "','numero') style='cursor:pointer' data-toggle='modal' data-target='#eliminarMovimiento'><i class='fa fa-trash'></i></button>";
            
        $tabla .= '{"numero":"' . $numero . '",
            "periodo":"' . $periodo . '",
            "fecha":"' . $fecha . '",
            "remitente":"' . $remitente . '",
            "accion":"' . $accion . '"},';
    }

} else {
    $desde = htmlspecialchars($_GET["fechaDesde"]);
    $hasta = htmlspecialchars($_GET["fechaHasta"]);

    $movimientos = $movCont->obtenerMovimientosInternosPeriodo($desde, $hasta);
    if(count($movimientos)<>0){
        for ($i = 0; $i < count($movimientos); $i++) {
    
            $numero = $movimientos[$i]->getNumero();
            $periodo = $movimientos[$i]->getAnho();
            $fecha = $movimientos[$i]->getFecha();
            $remitente = $movimientos[$i]->getRemitente();
            $accion = "<button style='cursor:pointer' type='submit' class='btn btn-primary' title='Ver Movimiento' onclick=verFC11(" . $numero .
                "," . $periodo . ")><i class='fa fa-eye'></i></button>" .
                " <button style='cursor:pointer' type='submit' class='btn btn-secondary' title='Descargar Movimiento' onclick=descargarFC11('" . $numero .
                "','" . $periodo . "') ><i class='fa fa-download'></i></button>" .
                " <button type='submit' class='btn btn-danger' title='Borrar Movimiento' onclick=obtenerDatosEliminar('" . $numero .
                "','" . $periodo . "','periodo') style='cursor:pointer' data-toggle='modal' data-target='#eliminarMovimiento'><i class='fa fa-trash'></i></button>";
    
            $tabla .= '{"numero":"' . $numero . '",
                "periodo":"' . $periodo . '",
                "fecha":"' . $fecha . '",
                "remitente":"' . $remitente . '",
                "accion":"' . $accion . '"},';
        }
    
    }    
}

$tabla = substr($tabla, 0, strlen($tabla) - 1);
echo '{"data":[' . $tabla . ']}';
