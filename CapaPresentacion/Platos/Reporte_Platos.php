<?php
define('FPDF_FONTPATH','../fpdf/font/');
require_once('../fpdf/fpdf.php');
include ("IncluirClases.php");


class Reporte_Platos extends FPDF {
	function tabla($cabecera, $datos) {
		$this->cabecera( $cabecera );
		$this->datos( $datos );
	}
	function cabecera($cabecera)
	{
		//Cabecera
		$this->SetFillColor(255,0,0) ;
		$this->SetTextColor(255) ;
		$this->SetDrawColor(128,0,0);
		$this->SetFont('Arial','B',15);
		foreach($cabecera as $columna) {
		$this->Cell(40,7,utf8_decode($columna),1,0,'C',1);
		}
		$this->Ln();
	}
	function datos($datos)
	{
		//Datos
		$this->SetTextColor(1) ;
		$this->SetDrawColor(128,0,0) ;
		$this->SetFont('Arial' ,'',12) ;
		foreach($datos as $dato) {
			foreach($dato as $columna) {
				
				$this->Cell(40,7,utf8_decode($columna),1,0,'C');
			}
			$this->Ln() ;
		}
	}
}
$pdf = new Reporte_Platos();
$pdf->AddPage();
$cabecera = array(
		"Nombre Plato",
		"Precio",
		"Foto",
		"Tipo Plato" 
);

// crea clase de platos consulta

$platoBll= new PlatoBLL();
$datos = array();
$datos=$platoBll->Listar();
$datosMostrar=array();
foreach ($datos as $plato) {
	$lineaPlato=array($plato[1],$plato[2],$plato[3],$plato[4]);
	$datosMostrar[]=$lineaPlato;
}


$pdf->tabla( $cabecera, $datosMostrar );
$pdf->Output();
?>
