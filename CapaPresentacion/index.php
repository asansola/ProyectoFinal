<?php
include ('IncluirClases.php');
$title = 'Pagina de Inicio';
$tipoPlatos = new TipoPlatoBLL ();
$vTipoPlatos = $tipoPlatos->Listar ();
$content = "<!-- Jumbotron Header -->
<header class='jumbotron hero-spacer'>
<div id='carousel-example-generic' class='carousel slide'
data-ride='carousel'>
<!-- Indicators -->
<ol class='carousel-indicators'>
<li data-target='#carousel-example-generic' data-slide-to='0'
class='active'></li>
<li data-target='#carousel-example-generic' data-slide-to='1'></li>
<li data-target='#carousel-example-generic' data-slide-to='2'></li>
</ol>

<!-- Wrapper for slides -->
<div class='carousel-inner'>
<div class='item active'>
<img class='img-responsive center-block' src='img/banners/banner1.jpg' alt='...'  style='width:1200px;height:260px'>

</div>
<div class='item'>
<img class='img-responsive center-block' src='img/banners/banner2.jpg' alt='...'  style='width:1200px;height:260px'>

</div>
<div class='item'>
<img  class='img-responsive center-block'src='img/banners/banner3.jpg' alt='...'  style='width:1200px;height:260px'>

</div>
</div>

<!-- Controls -->
<a class='left carousel-control' href='#carousel-example-generic'
role='button' data-slide='prev'> <span
class='glyphicon glyphicon-chevron-left'></span>
</a> <a class='right carousel-control'
href='#carousel-example-generic' role='button' data-slide='next'> <span
class='glyphicon glyphicon-chevron-right'></span>
</a>
</div>
<!-- Carousel -->

</header>
<hr>
<div class='row'><div class='col-lg-12'><h3>Men&uacute;</h3></div></div>
<div class='row text-center'>";

foreach ( $vTipoPlatos as $tipo ) {

	$content .= "<div class='col-md-3 col-sm-6 hero-feature'>
	<div class='thumbnail'>
	<img src='img/$tipo[2]' alt=''  >
	<div class='caption'>
	<h3>$tipo[1]</h3>
	<p>$tipo[1].</p>
	<p>";
	$url = strtolower ( $tipo [1] ) . '.php?id=' . $tipo [0]; // pasa el nombre a minusculas con el id de la categoria del plato.
	$url = preg_replace ( '/\s+/', '_', $url ); // sustituye el espacio en blanco del nombre por guion bajo
	$content .= "<a href='$url' class='btn btn-primary'>Ver men&uacute;</a>
	</p>
	</div>
	</div>
	</div>";
}

$content .= "</div><hr>";
include ("master.php");
?>








