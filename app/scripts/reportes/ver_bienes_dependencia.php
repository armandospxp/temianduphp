<?php
//include pdf_mc_table.php, not fpdf17/fpdf.php
include_once('ds_bienes_dependencia.php');
include_once(__DIR__ . "/../../controllers/BienCont.php");

//make new object
$ubicacion = htmlspecialchars($_GET["ubicacion"]);
$login=$_GET["login"];

$bienCont = new BienCont();

$bienes = $bienCont->obtenerBienesDependencia($ubicacion);

/*$json = $_GET["data"];

$login=$_GET["login"];
*/
$pdf = new DS_BienDependencia('P', 'mm', 'A4');
$pdf->SetTitle('PLANILLA DE BIENES POR DEPENDENCIA');

$ubicacion_descripcion="";
//CABECERA DE PAGINA
//$data = json_decode($json,true);
foreach($bienes as $detalle){
	if(!$ubicacion_descripcion){
		$ubicacion_descripcion = utf8_decode($detalle->getUbicacion());
	}
}

//PIE DE PAGINA
$usuario = utf8_decode($login);
$fecha = date("d/m/Y H:i:s");

$pdf->AliasNbPages('{pages}');

//add page, set font
$pdf->AddPage();
$pdf->SetFont('Arial', '', 7);


//set width for each column (11 columns)
$pdf->SetWidths(array(30, 30, 115));

//set alignment
$pdf->SetAligns(array('C', 'C', 'L'));

//set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(5);
/*
$data = json_decode($json,true);
*/
//reset font
$pdf->SetFont('Arial','',8);
//loop the data
/*foreach($data as $item){
	
	$pdf->SetX(15);
	//write data using Row() method containing array of values.
	$pdf->Row(Array(
		$item['rotulado'],
		$item['planCuenta'],
		utf8_decode($item['descripcion']),
	));
	
}*/
foreach ($bienes as $detalle) {

	$pdf->SetX(15);
	//write data using Row() method containing array of values.
	$pdf->Row(array(
		$detalle->getRotulado(),
		$detalle->getPlanCuenta(),
		utf8_decode($detalle->getDescripcion()),
	));
}
//output the pdf
$pdf->Output();
