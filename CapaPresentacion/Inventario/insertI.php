<?php

include ("IncluirClases.php");
//si hace click sobre un registro llene el form modal con datos
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];

}


//si hizo click en el envio
if (isset ( $_POST ['submit'] )) {
	//captura de datos	
	
	$idProveedor = $_POST['proveedor'];
	$idIngrediente = $_POST['ingrediente'];
	$cantidad= $_POST['cantidad'];
	
	//instancia de la identidad
	$InventarioE = new Inventario();
	
	
	$InventarioE->setId($id);
	$InventarioE->setIngrediente($idIngrediente);
	$InventarioE->setProveedor($idProveedor);
	$InventarioE->setCantidad($cantidad);
	
	//$_SESSION['v']=$cantidad;
	
	//Actualiza los datos del inventario
	$inventarioBLL = new InventarioBLL();
	$inventarioBLL->Agregar($InventarioE);

	
	if($inventarioBLL->getHayError() ){ 
		$_SESSION ['registrado'] = 'f1';
	}
	else{
		$_SESSION ['registrado'] = 't';
		
	}
	
	//sea cual sea el caso lo retorna a mantenimientos
	header ( "location:../Mantenimiento_Inventario.php" );

}
	
?>


<form method="post" action="Inventario/InsertI.php" role="form" data-toggle="validator">
	<div class="modal-body">
	
		<div class='form-group'>
					<label for='ingrediente'>Ingrediente:</label>
						<?php
							$ingrediente= new IngredienteBLL();
							$vIngrediente= $ingrediente->Listar();
							$count = 0;
							$result = array ();
							$result [$count] = array (
									"id_ingrediente" => '',
									"descripcion" => '-Seleccione una opción- ' ,
									"unidad_medida" => ''
										);
										
								foreach ( $vIngrediente as $row ) {
									$result [++ $count] = array (
											"id_ingrediente" => $row [0],
											"descripcion" => $row [1],
											"unidad_medida"	=> $row [2]
									);
											
								}
								?>
								<select id='ingrediente' name='ingrediente' class='selectpicker'  required='true'>
								<?php
								foreach ( $result as $each ) {
									$selected = ($each['id_ingrediente'] === $vInventario[0][2]) ? ' selected="selected"' : '';
								?>
								<option value=<?php echo $each['id_ingrediente'];?><?php echo $selected;?> ><?php echo ($each['descripcion']). " ".strtolower($each['unidad_medida']) ?></option>
								
								<?php  }?>
									 
								</select>									
			</div>
			
			<div class='form-group'>
					<label for='ingrediente'>Proveedor:</label>
						<?php
							$proveedor= new ProveedorBLL();
							$vProveedor= $proveedor->Listar();
							$count = 0;
							$result = array ();
							$result [$count] = array (
									"id_proveedor" => '',
									"nombre" => '-Seleccione una opción- ' 
										);
										
								foreach ( $vProveedor as $row ) {
									$result [++ $count] = array (
											"id_proveedor" => $row [0],
											"nombre" => $row [1]
									);
											
								}
								?>
								<select id='proveedor' name='proveedor' class='selectpicker'  required='true'>
								<?php
								foreach ( $result as $each ) {
									$selected = ($each['id_proveedor'] === $vInventario[0][1]) ? ' selected="selected"' : '';
								?>
								<option value=<?php echo $each['id_proveedor'];?><?php echo $selected;?> ><?php echo ($each['nombre']) ?></option>
								
								<?php  }?>
									 
								</select>									
			</div>
			
						
			<div class='form-group'>
					<label for='salonero'>Cantidad Inicial:</label>
					<input class='form-control' name='cantidad' type='number' id='cantidad' value="" min='1'  placeholder='solo números' required >			
			</div>
			
	</div>
	
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Agregar Insumo" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</form>	