<?php
include ("Seguridad.php");
include ("IncluirClases.php");
$title = "Mantenimiento de Mesas";
$mesa = new MesaBLL();
$listaMesa= $mesa->Listar();

if (isset($_SESSION['registrado'])) {
	if ($_SESSION['registrado']=='t'){
	 $message="<div class='alert alert-success fade in'><button type='button' class='close close-alert'
	 		data-dismiss='alert' aria-hidden='true'>×</button>Registro actualizado correctamente</div>";
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
				data-dismiss='alert' aria-hidden='true'>×</button>Registro no actualizado: las claves no coinciden</div>";
		echo $message;
	}
	if($_SESSION['registrado']=='f2'){
		$message="<div class='alert alert-danger fade in'><button type='button' class='close close-alert'
				data-dismiss='alert' aria-hidden='true'>×</button>Registro no actualizado: la mesa ya existe</div>";
		echo $message;
	}
	//var_dump($_SESSION['temp']);
	unset($_SESSION['registrado']);
}


$content = "<br>
<div><h2>Mantenimiento de Mesas</h2></div>
<div class='container'>
<!-- Nav tabs -->
<ul class='nav nav-tabs' role='tablist'>
<li class='active'><a href='#Listado' role='tab' data-toggle='tab'>Mesas</a></li>
	
</ul>

<!-- Tab panes -->
<div class='tab-content'>
<div class='tab-pane active' id='Listado'>
  				<br/>
				
  					<p><a class='btn btn-success' data-toggle='modal' data-target='#mantenimientoModal' data-action='I' data-url='Mesas/insertM.php' data-id=''><i class='glyphicon glyphicon-plus'></i> Nueva Mesa</a></p>
  						<br/>
  						<div class='table-responsive'>
  					<table class='table table-hover'>
    						<thead>
    						<tr>
    						<th class='text-center'>Número Mesa</th>
    						<th class='text-center'>Descripción General</th>
    				
    						</tr>
    						</thead>
    						<tbody>";
							foreach ( $listaMesa as $mesa) {
								$content .= "<tr>
    						<td class='text-center'>$mesa[0]</td>
    						<td class='text-center'>$mesa[1]</td>
    						<td class='text-center'>
    						
    						<a class='btn btn-warning' data-toggle='modal' data-target='#mantenimientoModal' data-action='U' data-url='Mesas/editM.php' data-id='$mesa[0]'><i class='glyphicon glyphicon-edit'></i> Editar</a>
    						<a class='btn btn-danger' data-toggle='modal' data-target='#mantenimientoModal' data-action='D' data-url='Mesas/deleteM.php' data-id='$mesa[0]'><i class='glyphicon glyphicon-edit'></i> Eliminar</a>
    							
    										</td>
    											</tr>";
									}

						$content .= "</tbody>
    											</table>
    											</div>
    											<ul class='pagination'>
  					<li class='disabled'><a href='#'>&laquo;</a></li>
  					<li class='active'><a href='#'>1</a></li>
  					<li><a href='#'>2</a></li>
  					<li><a href='#'>3</a></li>
  					<li><a href='#'>4</a></li>
  					<li><a href='#'>5</a></li>
  					<li><a href='#'>&raquo;</a></li>
  					</ul>
  					</div>
					
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