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
	header ( "location:../Mantenimiento_Usuarios.php" );
}

$Usuario = new UsuarioBLL(); 
//se guarda el registro del plato en edicion.
$vUsuario= $Usuario-> ConsultarRegistro($id);
?>



<form method="post" action="Usuarios/editU.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
			<div class='form-group'>
					<label for='id'>ID Usuario:</label>
					<input class='form-control' name='id' type='text' id='id' value="<?php echo $vUsuario[0][0];?>" disabled>
			</div>
			
			<div class='form-group'>
				
					<label for='nombre'>Nombre:</label>
					<input class='form-control' name='nombre' type='text' value="<?php echo $vUsuario[0][1];?>" id='nombre' required>
			</div>
			<div class='form-group'>
					<label for='precio'>Apellidos:</label>
					<input class='form-control' name='apellidos' type='text' value="<?php echo $vUsuario[0][2];?>" id='apellidos'>
			</div>
			<div class='form-group'>
					<label for='clave'>Clave:</label>
					<input class='form-control' name='clave' type='password' value="<?php echo $vUsuario[0][3];?>" id='clave'>
			</div>
				<div class='form-group'>
					<label for='clave2'>Verificar Clave:</label>
					<input class='form-control' name='clave2' type='password' value="<?php echo $vUsuario[0][3];?>" id='clave2'>
						<!-- validar que ambas claves sean iguales en el mismo form -->
			</div>
			
			<div class='form-group'>
					<label for='tipoHorario'>Horario:</label>
						<?php
							$horario = new HorarioBLL();
							$vHorario= $horario ->Listar();
							$count = 0;
							$result = array ();
							$result [$count] = array (
									"id_horario" => '',
									"descripcion" => '-Seleccione una opción-' 
										);
										
								foreach ( $vHorario as $row ) {
									$result [++ $count] = array (
											"id_horario" => $row [0],
											"descripcion" => $row [1] 
									);
											
								}
								?>
								<select id='horario' name='horario' class='selectpicker'  required='true'>
								<?php
								foreach ( $result as $each ) {
									$selected = ($each['id_horario'] === $vUsuario[0][6]) ? ' selected="selected"' : '';
								?>
								<option value=<?php echo $each['id_horario'];?><?php echo $selected;?> ><?php echo $each['descripcion']?></option>
								<?php }?>
										 
							</select>			
									
			</div>
			
			<div class='form-group'>
					<label for='tipoUsuario'>Rol:</label>
					<?php
							$tipoUsuario = new TipoUsuarioBLL();
							$vTipoUsuario= $tipoUsuario->Listar ();
							$count = 0;
							$result = array ();
							$result [$count] = array (
									"id_rol" => '',
									"descripcion" => '-Seleccione una opción-' 
										);
										
								foreach ( $vTipoUsuario as $row ) {
									$result [++ $count] = array (
											"id_rol" => $row [0],
											"descripcion" => $row [1] 
									);
											
								}
								?>
								<select id='tipoUsuario' name='tipoUsuario' class='selectpicker'  required='true'>
								<?php
								foreach ( $result as $each ) {
									$selected = ($each['id_rol'] === $vUsuario[0][7]) ? ' selected="selected"' : '';
								?>
								<option value=<?php echo $each['id_rol'];?><?php echo $selected;?> ><?php echo $each['descripcion']?></option>
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