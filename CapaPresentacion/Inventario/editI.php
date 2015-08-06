<?php

include ("IncluirClases.php");
//si hace click sobre un registro llene el form modal con datos
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];

	$Inventario = new InventarioBLL();
	$vInventario= $Inventario ->ConsultarRegistro($id);
}


//si hizo click en el envio
if (isset ( $_POST ['submit'] )) {
	//captura de datos	
	
	$id =$_POST['idHidden'];
	$idProveedor = $_POST['proveedor'];
	$idIngrediente = $_POST['ingrediente'];
	$cantidad= $_POST['cantidad'];
	
	//instancia de la identidad
	$InventarioE = new Inventario();
	
	$enExistencia=$_POST['existencia'];
	$nuevaExistencia=$enExistencia + ($cantidad);
	
	//verificar la cantidad 
	if($nuevaExistencia<=0){
		$nuevaExistencia=0;
	}
	
	$InventarioE->setId($id);
	$InventarioE->setIngrediente($idIngrediente);
	$InventarioE->setProveedor($idProveedor);
	$InventarioE->setCantidad($nuevaExistencia);
	
	//$_SESSION['v']=$cantidad;
	
	//Actualiza los datos del inventario
	$inventarioBLL = new InventarioBLL();
	$inventarioBLL->Modificar($InventarioE);

	
	if($inventarioBLL->getHayError() ){ 
		$_SESSION ['registrado'] = 'f';
	}
	else{
		$_SESSION ['registrado'] = 't';
		
	}
	
	//sea cual sea el caso lo retorna a mantenimientos
	header ( "location:../Mantenimiento_Inventario.php" );

}
	
?>


<form method="post" action="Inventario/editI.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
		 	<div class='form-group'>
			<!-- 		<label for='id'>Número de Registro:</label>
					<input class='form-control' name='id' type='text' id='id' value="<?php echo $vInventario[0][0];?>" disabled> -->
					<input type='hidden' name='idHidden' id='idHidden' value="<?php echo $vInventario[0][0];?>">  
			</div>
			
			<div class='form-group'>
				
					<label for='nombre'>Ingrediente:</label>
					<input class='form-control' name='ingrediente' type='text' value="<?php echo $vInventario[0][5];?>" id='ingrediente' disabled>
					<input type='hidden' name='ingrediente' id='ingrediente' value="<?php echo $vInventario[0][2];?>"> 
			</div>
				
			<div class='form-group'>
				
					<label for='nombre'>Proveedor:</label>
					<input class='form-control' name='proveedor' type='text' value="<?php echo $vInventario[0][4];?>" id='proveedor'  disabled>
					<input type='hidden' name='proveedor' id='proveedor' value="<?php echo $vInventario[0][1];?>"> 
			</div>	
			
						
			<div class='form-group'>
					<label for='salonero'>Cantidad agregar/eliminar:</label>
					<input class='form-control' name='cantidad' type='number' id='cantidad' value="" placeholder='recuerde que la cantidad es en <?php echo strtolower($vInventario[0][6])?>' required>
					<input type='hidden' name='existencia' id='existencia' value="<?php echo $vInventario[0][3];?>">				
			</div>
			
	</div>
	
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Actualizar Datos" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</form>	