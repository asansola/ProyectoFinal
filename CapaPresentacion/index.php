<?php
include ("IncluirClases.php");
$title = "Pagina de Inicio";
$tipoPlatos = new TipoPlatoBLL ();
$vTipoPlatos = $tipoPlatos->Listar ();
$content = "<hr>";
$content .= "<div class='row'>" . "<div class='col-lg-12'>" . "<h3>Men&uacute;</h3>" . "</div>" . "</div>";
$content .= "<div class='row text-center'>";

foreach ( $vTipoPlatos as $tipo ) {
	
	$content .= "<div class='col-md-3 col-sm-6 hero-feature'>";
	$content .= "<div class='thumbnail'>";
	$content .= "<img src='img/$tipo[2]' alt=''  >";
	$content .= "<div class='caption'>";
	$content .= "<h3>$tipo[1]</h3>";
	$content .= "<p>$tipo[1]</p>";
	$content .= "<p>";
	$content .= "<a href='#' class='btn btn-primary'>Buy Now!</a> <a href='#'class='btn btn-default'>More Info</a>";
	$content .= "</p>";
	$content .= "</div>";
	$content .= "</div>";
	$content .= "</div>";
}

$content .= "</div>";
$content .= "<hr>";
//include 'breadcrumps.php';
//$content.= breadcrumbs();
include 'master.php';


		

    
		

	

