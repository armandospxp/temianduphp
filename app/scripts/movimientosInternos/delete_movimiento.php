<?php
include_once (__DIR__."/../../controllers/MovimientoCont.php");

$movCont = new MovimientoCont();

$numero=$_POST["el_numero"];
$periodo=$_POST["el_periodo"];


$result=$movCont->eliminarMovimientoInterno ($numero, $periodo);
if ($result === "f") {
    echo '<div class="alert alert-danger" role="alert"><button type="button"'.
    ' class="close" data-dismiss="alert">&times;</button><strong>Error! Lo siento algo ha salido mal intenta nuevamente.</strong></div>';
}else{
    echo '<div class="alert alert-success" role="alert"><button type="button"'.
    ' class="close" data-dismiss="alert">&times;</button><strong>Bien hecho! El registro ha sido eliminado satisfactoriamente.</strong></div>';
}

