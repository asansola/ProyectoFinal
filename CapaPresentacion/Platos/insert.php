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

	
	if (isset ( $_POST ['submit'] )) {
		
		$id = $_POST ['id'];
		$nombre = $_POST ['nombre'];
		$precio = $_POST ['precio'];
		$id_tipo_plato = $_POST ['tipoPlato'];
		// guardar imagen
		// Comprueba si han subido una nueva imagen o la deja en blanco.
		if (! empty ( $_FILES ['foto'] ['name'] )) {
			$nombreFichero = guardarImagen ( $_FILES );
		} else {
			$nombreFichero ='';
		}
			
		$PlatoEntidad = new Plato ();
		$PlatoEntidad->__set ( 'id_plato', $id );
		$PlatoEntidad->__set ( 'nombre', $nombre );
		$PlatoEntidad->__set ( 'precio', $precio );
		$PlatoEntidad->__set ( 'imagen', $nombreFichero );
		$PlatoEntidad->__set ( 'id_tipo_plato', $id_tipo_plato );
		
		//agrega el plato a la bd.
		$PlatoBll = new PlatoBLL ();
		$PlatoBll->Agregar($PlatoEntidad);
		
		//comprueba si no hubieron errores al guardar la informacion.
		//session_start ();
		if ($PlatoBll->getHayError ()) {
			
			$_SESSION ['registrado'] = 'false';
			
		} else {
			
			$_SESSION ['registrado'] = 'true';
			
		}
		
		header ( 'Location: ../Mantenimiento_Platos.php' );
}

?>

<form method="post" action="Platos/insert.php" role="form"
	data-toggle="validator" enctype="multipart/form-data">

	<div class="modal-body">

		<div class='form-group'>

			<label for='nombre'>Nombre:</label> <input class='form-control'
				name='nombre' type='text' 
				id='nombre' required>
		</div>
		<div class='form-group'>
			<label for='precio'>Precio:</label> <input class='form-control'
				name='precio' type='text' 
				id='precio' required>
		</div>
		<div class='form-group'>

			<label for='imagen'>Imagen:</label> <input type='file' id='foto'
				name='foto' data-filename-placement='inside'><input type="hidden"
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
												"descripcion" => '-Seleccione una opción-' ,
												"unidad_medida" => '' 
										);
										
										foreach ( $vTipoPlatos as $row ) {
											$result [++ $count] = array (
													"id_tipo_plato" => $row [0],
													"descripcion" => $row [1],
													"unidad_medida" => $row [3], 
											);
										}
										?>
										<select id='tipoPlato' name='tipoPlato' class='selectpicker'
											required='true'>
										<?php
										foreach ( $result as $each ) {
											?>
										<option value=<?php echo $each['id_tipo_plato'];?>><?php echo $each['descripcion']?></option>
										<?php }?>
										 
									</select>

		</div>


	</div>

	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Agregar Plato" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</form>
