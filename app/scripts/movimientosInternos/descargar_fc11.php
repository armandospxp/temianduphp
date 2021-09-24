<?php
include("ds_fc11.php");
include_once(__DIR__ . "/../../controllers/MovimientoCont.php");
//make new object
$numero = htmlspecialchars($_GET["numero"]);
$periodo = htmlspecialchars($_GET["periodo"]);
$login = $_GET["login"];

$movCont = new MovimientoCont();
$fc11 = $movCont->obtenerMovimientoInterno($numero, $periodo);

$pdf = new DS_FC11('P', 'mm', 'A4');
$pdf->SetTitle('Formulario F.C. 11 - Movimiento Interno de Bienes de Uso');


//CABECERA DE PAGINA
$numero_movimiento = $fc11->getNumero() . '/' . $fc11->getAnho();
$remitente = utf8_decode($fc11->getRemitente());
$destinatario =  utf8_decode($fc11->getDestinatario());
$fecha_movimiento = utf8_decode($fc11->getFecha());

//PIE DE PAGINA
$usuario = utf8_decode($login);
$fecha = date("d/m/Y H:i:s");
$pdf->AliasNbPages('{pages}');

//add page, set font
$pdf->AddPage();
$pdf->SetFont('Arial', '', 7);

//set width for each column (11 columns)
$pdf->SetWidths(array(32, 116, 10, 7, 8, 10));

//set alignment
$pdf->SetAligns(array('L', 'L', 'C', 'C', 'C', 'C'));

//set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(5);

//reset font
$pdf->SetFont('Arial', '', 8);
//loop the data
$inservible = '';
$prestamo = '';
$traspaso = '';
$faltante = '';
foreach ($fc11->getDetalles() as $detalle) {
	if ($detalle->getMotivo() == 'I') {
		$inservible = 'X';
	} else if ($detalle->getMotivo() == 'P') {
		$prestamo = 'X';
	} else if ($detalle->getMotivo() == 'T') {
		$traspaso = 'X';
	} else if ($detalle->getMotivo() == 'F') {
		$faltante = 'X';
	}
	$pdf->SetX(15);
	//write data using Row() method containing array of values.
	$pdf->Row(array(
		$detalle->getRotulado(),
		utf8_decode($detalle->getDescripcion()),
		$inservible,
		$prestamo,
		$traspaso,
		$faltante,
	));
	$inservible = '';
	$prestamo = '';
	$traspaso = '';
	$faltante = '';
}
//output the pdf
$pdf->Output($dest='D', $name='MOVIMIENTO INTERNO DE BIENES DE USO.pdf', $isUTF8=true);
