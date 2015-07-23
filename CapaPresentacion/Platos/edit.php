<?php
include ("Seguridad.php");
include ("IncluirClases.php");
include ("../funciones.php");

if (isset ( $_GET ['id'] )) {
	$id = $_GET ['id'];
}

if (isset ( $_GET ['action'] )) {
	$action = $_GET ['action'];
}

// verificar el action

if ($action === 'U') {
	$Plato = new PlatoBLL ();
	// se guarda el registro del plato en edicion.
	$vPlato = $Plato->ConsultarRegistro ( $id );
	$imagenAlmacenada = $vPlato [0] [3];
}

if (isset ( $_POST ['submit'] )) {
	$id = $_POST ['idHidden'];
	$nombre = $_POST ['nombre'];
	$precio = $_POST ['precio'];
	// guardar imagen
	
	// Comprueba si han subido una nueva imagen o deja la que había almacenada.
	if (! empty ( $_FILES ['foto'] ['name'] )) {
		$nombreFichero = guardarImagen ( $_FILES );
	} else {
		$nombreFichero = $_POST ['imagenHidden'];
	}
	
	$id_tipo_plato = $_POST ['tipoPlato'];
	
	$PlatoEntidad = new Plato ();
	$PlatoEntidad->__set ( 'id_plato', $id );
	$PlatoEntidad->__set ( 'nombre', $nombre );
	$PlatoEntidad->__set ( 'precio', $precio );
	$PlatoEntidad->__set ( 'imagen', $nombreFichero );
	$PlatoEntidad->__set ( 'id_tipo_plato', $id_tipo_plato );
	
	$PlatoBll = new PlatoBLL ();
	
	$PlatoBll->Modificar ( $PlatoEntidad );
	session_start ();
	if ($PlatoBll->getHayError ()) {
		// echo "error ".$PlatoBll->getDescripcionError();
		$_SESSION ['registrado'] = 'false';
	} else {
		
		$_SESSION ['registrado'] = 'true';
	}
	
	header ( 'Location: ../Mantenimiento_Platos.php' );
}

?>

<form method="post" action="Platos/edit.php" role="form"
	data-toggle="validator" enctype="multipart/form-data">

	<div class="modal-body">

		<div class='form-group'>
			<label for='id'>ID Plato:</label> <input class='form-control'
				name='id' type='text' id='id' value="<?php echo $vPlato[0][0];?>"
				disabled> <input type='hidden' name='idHidden' id='idHidden'
				value="<?php echo $vPlato[0][0];?>">
		</div>

		<div class='form-group'>

			<label for='nombre'>Nombre:</label> <input class='form-control'
				name='nombre' type='text' value="<?php echo $vPlato[0][1];?>"
				id='nombre' required>
		</div>
		<div class='form-group'>
			<label for='precio'>Precio:</label> <input class='form-control'
				name='precio' type='text' value="<?php echo $vPlato[0][2];?>"
				id='precio'>
		</div>
		<div class='form-group'>

			<label for='imagen'>Imagen:</label> <input type='file' id='foto'
				name='foto' data-filename-placement='inside'> <input type="hidden"
				name="imagenHidden" id="imagenHidden"
				value="<?php echo $vPlato[0][3];?>"> <input type="hidden"
				name="MAX_FILE_SIZE" VALUE="102400">
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
										<select id='tipoPlato' name='tipoPlato' class='selectpicker'
				required='true'>
										<?php
										foreach ( $result as $each ) {
											$selected = ($each ['id_tipo_plato'] === $vPlato [0] [4]) ? ' selected="selected"' : '';
											?>
										<option value=<?php echo $each['id_tipo_plato'];?>
					<?php echo $selected;?>><?php echo $each['descripcion']?></option>
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
