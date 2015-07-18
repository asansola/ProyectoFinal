<?php

include ("IncluirClases.php");

$id = $_GET ['id'];

if (isset ( $_POST ['submit'] )) {
// 	$id = $_POST ['id'];
// 	$name = $_POST ['name'];
// 	$phone = $_POST ['phone'];
// 	$address = $_POST ['address'];
// 	$email = $_POST ['email'];
	// $qryUpt = "UPDATE `details` SET `name` = '$name', `phone` = '$phone', `address`='$address', `email`='$email' WHERE `sn`=$id";
	// mysql_query($qryUpt) or die(mysql_error());
	header ( "location:../index.php" );
}

$Plato = new PlatoBLL ();
//se guarda el registro del plato en edicion.
$vPlato = $Plato->ConsultarRegistro($id);

?>



<form method="post" action="Platos/edit.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
			<div class='form-group'>
					<label for='id'>ID Plato:</label>
					<input class='form-control' name='id' type='text' id='id' value="<?php echo $vPlato[0][0];?>" disabled>
			</div>
			
			<div class='form-group'>
				
					<label for='nombre'>Nombre:</label>
					<input class='form-control' name='nombre' type='text' value="<?php echo $vPlato[0][1];?>" id='nombre' required>
			</div>
			<div class='form-group'>
					<label for='precio'>Precio:</label>
					<input class='form-control' name='precio' type='text' value="<?php echo $vPlato[0][2];?>" id='precio'>
			</div>
			<div class='form-group'>
					<label for='imagen'>Imagen:</label>
					<input type='file' name='imagen' id='imagen' data-filename-placement='inside' value="<?php echo $vPlato[0][3];?>">
					<input type="hidden" name="imagenHidden" id="imagenHidden" value="<?php echo $vPlato[0][3];?>" >
			</div>
			<div class='form-group'>
					<label for='tipoPlato'>Tipo de Plato:</label>
										<?php
										$tipoPlatos = new TipoPlatoBLL ();
										$vTipoPlatos = $tipoPlatos->Listar ();
										$count = 0;
										$result = array ();
										$result [$count] = array (
												"id_tipo_plato" => '',
												"descripcion" => '-Seleccione una opción-' 
										);
										
										foreach ( $vTipoPlatos as $row ) {
											$result [++ $count] = array (
													"id_tipo_plato" => $row [0],
													"descripcion" => $row [1] 
											);
											
										}
										?>
										<select id='tipoPlato' name='tipoPlato' class='selectpicker'  required='true'>
										<?php
										foreach ( $result as $each ) {
											$selected = ($each['id_tipo_plato'] === $vPlato[0][4]) ? ' selected="selected"' : '';
											?>
										<option value=<?php echo $each['id_tipo_plato'];?><?php echo $selected;?> ><?php echo $each['descripcion']?></option>
										<?php }?>
										 
									</select>
									
			</div>
		
			
	</div>
	
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Actualizar Datos" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
	</form>	