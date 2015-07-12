<?php
include ("IncluirClases.php");
$title = "Pagina de Inicio";
$tipoPlatos = new TipoPlatoBLL ();
$vTipoPlatos = $tipoPlatos->Listar ();
$content = "<!-- Jumbotron Header -->";
$content .= "<header class='jumbotron hero-spacer'>";
$content .= "<div id='carousel-example-generic' class='carousel slide'";
$content .= "data-ride='carousel'>";
$content .= "<!-- Indicators -->";
$content .= "<ol class='carousel-indicators'>";
$content .= "<li data-target='#carousel-example-generic' data-slide-to='0'";
$content .= "class='active'></li>";
$content .= "<li data-target='#carousel-example-generic' data-slide-to='1'></li>";
$content .= "<li data-target='#carousel-example-generic' data-slide-to='2'></li>";
$content .= "</ol>";

$content .= "<!-- Wrapper for slides -->";
$content .= "<div class='carousel-inner'>";
$content .= "<div class='item active'>";
$content .= "<img src='http://placehold.it/1200x315' alt='...'>";
$content .= "<div class='carousel-caption'>";
$content .= "<h3>Caption Text</h3>";
$content .= "</div>";
$content .= "</div>";
$content .= "<div class='item'>";
$content .= "<img src='http://placehold.it/1200x315' alt='...'>";
$content .= "<div class='carousel-caption'>";
$content .= "<h3>Caption Text</h3>";
$content .= "</div>";
$content .= "</div>";
$content .= "<div class='item'>";
$content .= "<img src='http://placehold.it/1200x315' alt='...'>";
$content .= "<div class='carousel-caption'>";
$content .= "	<h3>Caption Text</h3>";
$content .= "</div>";
$content .= "</div>";
$content .= "</div>";

$content .= "<!-- Controls -->";
$content .= "<a class='left carousel-control' href='#carousel-example-generic'";
$content .= "	role='button' data-slide='prev'> <span";
$content .= "class='glyphicon glyphicon-chevron-left'></span>";
$content .= "</a> <a class='right carousel-control'";
$content .= "	href='#carousel-example-generic' role='button' data-slide='next'> <span";
$content .= "	class='glyphicon glyphicon-chevron-right'></span>";
$content .= "</a>";
$content .= "</div>";
$content .= "<!-- Carousel -->";

$content .= "</header>";
$content .= "<hr>";
$content .= "<div class='row'>" . "<div class='col-lg-12'>" . "<h3>Men&uacute;</h3>" . "</div>" . "</div>";
$content .= "<div class='row text-center'>";

foreach ( $vTipoPlatos as $tipo ) {
	
	$content .= "<div class='col-md-3 col-sm-6 hero-feature'>";
	$content .= "<div class='thumbnail'>";
	$content .= "<img src='img/$tipo[2]' alt=''  >";
	$content .= "<div class='caption'>";
	$content .= "<h3>$tipo[1]</h3>";
	$content .= "<p>$tipo[1].</p>";
	$content .= "<p>";
	$url = strtolower ( $tipo [1] ) . '.php?id=' . $tipo [0]; // pasa el nombre a minusculas con el id de la categoria del plato.
	$url = preg_replace ( '/\s+/', '_', $url ); // sustituye el espacio en blanco del nombre por guion bajo
	$content .= "<a href='$url' class='btn btn-primary'>Ver men&uacute;</a>";
	$content .= "</p>";
	$content .= "</div>";
	$content .= "</div>";
	$content .= "</div>";
}

$content .= "</div>";
$content .= "<hr>";
include 'master.php';


		

    
		

	

