<?php

include ("IncluirClases.php");
//si hace click sobre un registro llene el form modal con datos
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];

	$Mesa = new MesaBLL();
	$vMesa= $Mesa-> ConsultarRegistro($id);
}


//si hizo click en el envio
if (isset ( $_POST ['submit'] )) {
	//captura de datos	
	$id = $_POST ['idHidden'];
	$descripcion = $_POST ['descripcion'];

	//instancia de la identidad
	$MesaE = new Mesa();
	
	$MesaE ->setId($id);
	$MesaE ->setDescripcion($descripcion);

	$MesaBLL= new MesaBLL();
	$MesaBLL->Modificar($MesaE);
	
	if($MesaBLL->getHayError() ){ 
		$_SESSION ['registrado'] = 'f';
	}
	else{
		$_SESSION ['registrado'] = 't';
	}
	
	//sea cual sea el caso lo retorna a mantenimientos
	header ( "location:../Mantenimiento_Mesas.php" );

}
	
?>


<form method="post" action="Mesas/editM.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
			<div class='form-group'>
					<label for='id'>Número de Mesa:</label>
					<input class='form-control' name='id' type='text' id='id' value="<?php echo $vMesa[0][0];?>" disabled>
					<input type='hidden' name='idHidden' id='idHidden' value="<?php echo $vMesa[0][0];?>">
			</div>
			
			<div class='form-group'>
				
					<label for='nombre'>Descripción General:</label>
					<input class='form-control' name='descripcion' type='text' value="<?php echo $vMesa[0][1];?>" id='descripcion' placeholder='cupo de la mesa'  requierd pattern="[A-Za-z0-9 ñáéíóú ]*">
			</div>	
			
	</div>
	
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Actualizar Datos" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</form>	