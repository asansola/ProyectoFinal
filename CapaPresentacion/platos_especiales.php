<?php
include ("IncluirClases.php");
$title="Platos Especiales";
$PlatoEntidad= new Plato();
if (isset($_GET['id'])) {
	$id= $_GET['id'];	
}else{
	//hacer select de platos especiales cuando se cargue del menu
	
	$tipoPlatosEntidad= new TipoPlato();
	$tipoPlatosEntidad->__set('descripcion', $title);
	$tipoPlatos = new TipoPlatoBLL ();
	$vTipoPlatos = $tipoPlatos->ConsultarNombre($tipoPlatosEntidad);
	if (!empty($vTipoPlatos)) {
		foreach ($vTipoPlatos as $tipoPlatoSelect) {
			$id= $tipoPlatoSelect[0];
		}
	}
}

$PlatoEntidad->__set('id_tipo_plato',$id);
$Plato = new PlatoBLL ();
$vPlatos = $Plato->Consultar($PlatoEntidad);
$content = "<hr>";
$content .= "<div class='row'>" . "<div class='col-lg-12'>" . "<h3>$title</h3>" . "</div>" . "</div>";
$content .= "<div class='row text-center'>";

foreach ( $vPlatos as $plato ) {
	
	$content .= "<div class='col-md-3 col-sm-6 hero-feature'>";
	$content .= "<div class='thumbnail'>";
	$content .= "<img src='img/$plato[3]' alt=''  >";
	$content .= "<div class='caption'>";
	$content .= "<h3>$plato[1]</h3>";
	$content .= "<p><span class='label label-success'>Valor: ¢$plato[2]</span></p>";
	$content .= "<p>";
	//$url= strtolower($plato[1]).".php";//pasa el nombre a minusculas.
	//$url= preg_replace('/\s+/', '_',  $url);//sustituye el espacio en blanco del nombre por guion bajo
	//guarda la receta de cada plato(array) para mostrarlo.
	$RecetaBLL= new RecetaBLL();
	$Receta= $RecetaBLL->ConsultarRegistro($plato[0]);
	$ingredienteReceta='Receta:<br/>';
	if (!empty($Receta)) {
		foreach ($Receta as $ingrediente) {
			$ingredienteReceta.=$ingrediente[0].'<br/>';
		}	
	}

	$url="pedido.php?action=add&id=$plato[0]&cantidad=1&nombre=$plato[1]";
	$content .= " <a href='$url' class='btn btn-primary'>A&ntildeadir al pedido <i class='glyphicon glyphicon-shopping-cart'></i></a><br><a href='#' title='$plato[1]' 
			data-toggle='popover' role='button'  data-trigger='focus' data-placement='top' data-content='$ingredienteReceta'>Detalles</a>";
	$content .= "</p>";
	$content .= "</div>";
	$content .= "</div>";
	$content .= "</div>";
	
}

$content .= "</div>";
$content .= "<hr>";
include 'master.php';