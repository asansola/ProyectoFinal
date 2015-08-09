<?php
include ("Seguridad.php");
include ("IncluirClases.php");
$title = "Mantenimiento de Platos";

$plato = new PlatoBLL();

$resultado = $plato->Contar();
// Número de Filas total
$totalFilas = $resultado[0][0];
// Número de resultados que desea mostrar por página
$filas_pagina = 6;
// Indica el número de página de la última pagina
$ultima = ceil($totalFilas/$filas_pagina);
// Verificar que la última no sea inferior a 1
if($ultima < 1){ $ultima = 1; }
// Estable el $numeroPagina = 1;
$numeroPagina=1;
// Obtiene el número de página de GET (URL)
if(isset($_GET['pn'])){ $numeroPagina = preg_replace('#[^0-9]#', '', $_GET['pn']); }
// Verificar el número de página no sea menor a 1 o más que la $ultima pagina
if ($numeroPagina < 1) { $numeroPagina = 1; } else if ($numeroPagina > $ultima) { $numeroPagina = $ultima; }
// This sets the range of rows to query for the chosen $numeroPagina
// Establece el rango de filas pa la consulta determinado por el $numeroPagina
//LIMIT: parámetros->  el primero indica el número del primer registro a retornar, el segundo, el número máximo de registros a retornar.
$registroNum=($numeroPagina );
if ($numeroPagina != 1) $registroNum=($numeroPagina -1) * $filas_pagina;

$limiteInicio=$registroNum;
$limiteCantidad=$filas_pagina;

//si pagina es la primera para q cuente el primer registro
if($numeroPagina == 1){
	$limiteInicio=$registroNum-1;
}
//var_dump($limiteInicio);
//var_dump($limiteCantidad);

//lista las mesas restringidas por los limites
$listaPlato= $plato->ListarLimite($limiteInicio, $limiteCantidad);

// Esto muestra al usuario
//el número total de páginas
//$textline1 = "Estudiantes (<b>$totalFilas</b>)";
//En que página se encuentra
$textline2 = "Página <b>$numeroPagina</b> de <b>$ultima</b>";
//Control de Paginacion: Anterior y Siguiente
$ctrlsPaginacion = '';
// Si hay más de una página
if($ultima != 1){
	/* 1ero comprobar si esta en la primera pagina
	 * Si es menor que 1 no es necesario un link a la página anterior o la primera página.
	* Si es mayor a 1 se generan los enlaces de la primera página y, a la página anterior. */
	if ($numeroPagina > 1) {
		$previous = $numeroPagina - 1; $ctrlsPaginacion .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">&laquo; Anterior</a>&nbsp; &nbsp; ';
		// Links de número de enlaces que deben aparecer a la izquierda del número de página actual
		for($i = $numeroPagina-4; $i < $numeroPagina; $i++){
			if($i > 0){
				$ctrlsPaginacion .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
		}
	}

	//El número de la página actual, pero sin que sea un enlace
	$ctrlsPaginacion .= ''.$numeroPagina.' &nbsp; ';
	// Links de número de enlaces que deben aparecer a la derecha del número de la página actual
	for($i = $numeroPagina+1; $i <= $ultima; $i++){
		$ctrlsPaginacion .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $numeroPagina+4){ break; }
	}
	// Esto hace lo mismo que el anterior, verifica si estamos en la última página, y luego genera el link de Siguiente
	if ($numeroPagina != $ultima) {
		$next = $numeroPagina + 1; $ctrlsPaginacion .= ' &nbsp; &nbsp;<a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Siguiente &raquo;</a>';
	}
}

if (isset($_SESSION['registrado'])) {
	if ($_SESSION['registrado']=='t'){
	 $message="<div class='alert alert-success fade in'><button type='button' class='close close-alert'
	 		data-dismiss='alert' aria-hidden='true'>×</button>Registro actualizado correctamente</div>";
		echo $message;
	}
	if ($_SESSION['registrado']=='t2'){
		$message="<div class='alert alert-success fade in'><button type='button' class='close close-alert'
	 		data-dismiss='alert' aria-hidden='true'>×</button>Registro eliminado correctamente</div>";
		echo $message;
	}
	if ($_SESSION['registrado']=='t1'){
		$message="<div class='alert alert-success fade in'><button type='button' class='close close-alert'
	 		data-dismiss='alert' aria-hidden='true'>×</button>Registro agregado correctamente</div>";
		echo $message;
	}
	if($_SESSION['registrado']=='f'){
		$message="<div class='alert alert-danger fade in'><button type='button' class='close close-alert'
				data-dismiss='alert' aria-hidden='true'>×</button>Registro no actualizado</div>";
		echo $message;
	}
	if($_SESSION['registrado']=='f1'){
		$message="<div class='alert alert-danger fade in'><button type='button' class='close close-alert'
				data-dismiss='alert' aria-hidden='true'>×</button>Registro no agregado</div>";
		echo $message;
	}
	
//	var_dump($_SESSION['v']);
	unset($_SESSION['registrado']);
}

$content = "<br>
<div><h2>Mantenimiento de Platos</h2></div>
<div class='container'>
<!-- Nav tabs -->
<ul class='nav nav-tabs' role='tablist'>
<li class='active'><a href='#Listado' role='tab' data-toggle='tab'>Platos</a></li>
	
</ul>

<!-- Tab panes -->
<div class='tab-content'>
<div class='tab-pane active' id='Listado'>
  				<br/>
				
  					<p><a class='btn btn-success' data-toggle='modal' data-target='#mantenimientoModal' data-action='I' data-url='Platos/insert.php' data-id=''><i class='glyphicon glyphicon-plus'></i> Nuevo Plato</a></p>
  						<br/>
  						<div class='table-responsive'>
  					<table class='table table-hover'>
    						<thead>
    						<tr>
    					<!--	<th class='text-center'>ID Plato</th>  -->
    						<th class='text-center'>Nombre del Plato</th>
    						<th class='text-center'>Precio</th>
    						<th class='text-center'>Foto/Imagen</th>
    						<th class='text-center'>Categoría del Plato</th>
							<th class='text-center'>Acción</th>
    						</tr>
    						</thead>
    						<tbody>";                  
							if($listaPlato !=""){
							foreach ( $listaPlato as $plato ) {
								$content .= "<tr>
    					<!--	<td class='text-center'>$plato[0]</td>  -->
    						<td class='text-center'>$plato[1]</td>
    						<td class='text-center'>¢$plato[2]</td>  
    						<td class='text-center'><img src='img/$plato[3]' width='100' height='80' ></td>
    						<td class='text-center'>$plato[4]</td>
    						<td class='text-center'>
    						
    						<a class='btn btn-warning' data-toggle='modal' data-target='#mantenimientoModal' data-action='U' data-url='Platos/edit.php' data-id='$plato[0]'><i class='glyphicon glyphicon-edit'></i> Editar</a>
    						<a class='btn btn-danger' data-toggle='modal' data-target='#mantenimientoModal' data-action='D' data-url='Platos/delete.php' data-id='$plato[0]'><i class='glyphicon glyphicon-trash'></i> Eliminar</a>
    							
    										</td>
    											</tr>";
									}
							}

						$content .= "</tbody>
    									</table>
    										</div>
	    										<ul class='pagination'>		
												<div class='pagination'>$ctrlsPaginacion</div>
												
  												</ul>
  											</div>
					<p style='text-align: center;'>$textline2</p>
				
					<div class='modal fade' id='mantenimientoModal' tabindex='-1' role='dialog' aria-labelledby='memberModalLabel' aria-hidden='true'>
				        <div class='modal-dialog'>
								
				            <div class='modal-content'>
				                <div class='modal-header'>
				                    <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
				                    <h4 class='modal-title' id='memberModalLabel'>Mantenimiento</h4>
								
				                </div>
									<div id='loading-indicator'><img src='img/ajax-loader.gif' id='gif' /></div>
				                <div class='ct'>
				              			
				                </div>
				
				            </div>
				        </div>
				    </div>

					
						
					";

include 'master.php';
?>