<?php

include ("IncluirClases.php");
//si hace click sobre un registro llene el form modal con datos
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];

	
	$Proveedor= new ProveedorBLL();
	
}


//si hizo click en el envio
if (isset ( $_POST ['submit'] )) {
	//captura de datos	
	
	$nombre = $_POST ['nombre'];
	$telefono= $_POST ['telefono'];
	$direccion= $_POST ['direccion'];
	
	
	$proveedorE = new Proveedor();
	
	$proveedorE->setNombre($nombre);
	$proveedorE->setTelefono($telefono);
	$proveedorE->setDireccion($direccion);

	
	$ProveedorBLL= new ProveedorBLL();
	
	$ProveedorBLL->Agregar($proveedorE);

	if($ProveedorBLL->getHayError() ){ 
		$_SESSION ['registrado'] = 'f2';
	}
	else{
		//si no hay error hay q hacer la modificacion		
		$_SESSION ['registrado'] = 't1';
		}
	
	//sea cual sea el caso lo retorna a mantenimientos
	header ( "location:../Mantenimiento_Proveedores.php" );

}
	
?>

<form method="post" action="Proveedores/insertP.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
			<div class='form-group'>
				
					<label for='nombre'>Nombre:</label>
					<input class='form-control' name='nombre' type='text' value="" id='nombre' placeholder='solo letras' required pattern="[A-Za-z &ñáéíóú]*" title="el nombre solo debe contener letras">
			</div>
			<div class='form-group'>
					<label for='precio'>Teléfono:</label>
					<input class='form-control' name='telefono' type='tel' value="" id='telefono' placeholder='ejemplo: 2222-2222' requiered pattern="\d{4}-\d{4}" >
			</div>
			<div class='form-group'>
					<label for='clave'>Dirección:</label>
					<input class='form-control' name='direccion' type='text' value="" id='direccion' placeholder='ejemplo: Alajuela' />
			</div>
			
			
	</div>
	
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Agregar Proveedor" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</form>	