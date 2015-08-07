<?php

include ("IncluirClases.php");
//si hace click sobre un registro llene el form modal con datos
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];

	
	$Proveedor= new ProveedorBLL();
	$vProveedor=$Proveedor->ConsultarRegistro($id);
}


//si hizo click en el envio
if (isset ( $_POST ['submit'] )) {
	//captura de datos	
	$id = $_POST ['idHidden'];
	$nombre = $_POST ['nombre'];
	$telefono= $_POST ['telefono'];
	$direccion= $_POST ['direccion'];
	
	
	$proveedorE = new Proveedor();
	
	$proveedorE->setId($id);
	$proveedorE->setNombre($nombre);
	$proveedorE->setTelefono($telefono);
	$proveedorE->setDireccion($direccion);

	
	$ProveedorBLL= new ProveedorBLL();
	
	$ProveedorBLL->Eliminar($proveedorE);
	
	//$_SESSION['v']=$ProveedorBLL;
	
	if($ProveedorBLL->getHayError() ){ 
		$_SESSION ['registrado'] = 'f1';
		//$_SESSION['v']=$ProveedorBLL->getDescripcionError();
	}
	else{
		//si no hay error hay q hacer la modificacion		
		$_SESSION ['registrado'] = 't';
		}
	
	//sea cual sea el caso lo retorna a mantenimientos
	header ( "location:../Mantenimiento_Proveedores.php" );

}
	
?>

<form method="post" action="Proveedores/deleteP.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
			<div class='form-group'>
					<label for='id'>ID Registro:</label>
					<input class='form-control' name='id' type='text' id='id' value="<?php echo $vProveedor[0][0];?>" disabled>
					<input type='hidden' name='idHidden' id='idHidden' value="<?php echo $vProveedor[0][0];?>">
			</div>
			
			<div class='form-group'>
				
					<label for='nombre'>Nombre:</label>
					<input class='form-control' name='nombre' type='text' value="<?php echo $vProveedor[0][1];?>" id='nombre' placeholder='solo letras' required pattern="[A-Za-z &ñáéíóú]*" title="el nombre solo debe contener letras"  disabled>
			</div>
			<div class='form-group'>
					<label for='precio'>Teléfono:</label>
					<input class='form-control' name='telefono' type='tel' value="<?php echo $vProveedor[0][2];?>" id='telefono' placeholder='ejemplo: 2222-2222' requiered pattern="\d{4}-\d{4}"  title="ejemplo: 2222-2222" disabled>
			</div>
			<div class='form-group'>
					<label for='clave'>Dirección:</label>
					<input class='form-control' name='direccion' type='text' value="<?php echo $vProveedor[0][3];?>" id='direccion' placeholder='ejemplo: Alajuela' required pattern="[A-Za-z ñáéíóú]*" disabled/>
			</div>
			
			
	</div>
	
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Eliminar Proveedor" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</form>	