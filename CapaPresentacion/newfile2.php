$content = "<hr>
<div class='row'><div class='col-lg-12'><h3>$title</h3></div></div>
<div class='row text-center'>";

foreach ( $vPlatos as $plato ) {

	$content .= "<div class='col-md-3 col-sm-6 hero-feature'>
	<div class='thumbnail'>
	<img src='img/$plato[3]' alt=''  >
	<div class='caption'>
	<h3>$plato[1]</h3>
	<p><span class='label label-success'>Valor: ¢$plato[2]</span></p>
	<p>";

	// guarda la receta de cada plato(array) para mostrarlo.
	$RecetaBLL = new RecetaBLL ()
	$Receta = $RecetaBLL->ConsultarRegistro ( $plato [0] )
	$ingredienteReceta = 'Receta:<br/>'
	if (! empty ( $Receta )) {
		foreach ( $Receta as $ingrediente ) {
			$ingredienteReceta .= $ingrediente [0] . '<br/>';
		}
	}

	$url='action=add&id=$plato[0]&cantidad=1&nombre=$plato[1]'
	$content .=" <button value='$url' class='add_to_cart btn btn-primary'>A&ntildeadir al pedido <i class='glyphicon glyphicon-shopping-cart'></i></button><br><button title='$plato[1]'
			class='btn-link' data-toggle='popover' role='button'  data-trigger='focus' data-placement='top' data-content='$ingredienteReceta'>Detalles</button>";
	</p>
	</div>
	</div>
	</div>";
}

$content .= "</div> <hr>;