<?php

include ("IncluirClases.php");
//si hace click sobre un registro llene el form modal con datos
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];

	$Usuario = new UsuarioBLL();
	$vUsuario= $Usuario-> ConsultarRegistro($id);
}


//si hizo click en el envio
if (isset ( $_POST ['submit'] )) {
	//captura de datos	
	$id = $_POST ['idHidden'];
	$nombre = $_POST ['nombre'];
	$apellidos = $_POST ['apellidos'];
	$clave = $_POST ['clave'];
	$clave2 = $_POST ['clave2'];
	$horario = $_POST ['horario'];
	$tipoUsuario = $_POST ['tipoUsuario'];
	
	$usuarioE = new Usuario();
	
	$usuarioE->setId($id);
	$usuarioE->setNombre($nombre);
	$usuarioE->setApellidos($apellidos);
	$usuarioE->setClave($clave);
	$usuarioE->setIdhorario($horario);
	$usuarioE->setIdrol($tipoUsuario);
	
	$usuarioBLL= new UsuarioBLL();
	
	//valida passwords
	if($clave!=$clave2){
		$_SESSION ['registrado'] = 'f1';
	}
	else{
		if($usuarioBLL->getHayError() ){ 
			$_SESSION ['registrado'] = 'f';
		}
		else{
			//si no hay error hay q hacer la modificacion
			$usuarioBLL->Modificar($usuarioE);
			
			$_SESSION ['registrado'] = 't';
		}
	}
	//sea cual sea el caso lo retorna a mantenimientos
	header ( "location:../Mantenimiento_Usuarios.php" );

}
	
?>


<form method="post" action="Usuarios/editU.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
			<div class='form-group'>
					<label for='id'>ID Usuario:</label>
					<input class='form-control' name='id' type='text' id='id' value="<?php echo $vUsuario[0][0];?>" disabled>
					<input type='hidden' name='idHidden' id='idHidden' value="<?php echo $vUsuario[0][0];?>">
			</div>
			
			<div class='form-group'>
				
					<label for='nombre'>Nombre:</label>
					<input class='form-control' name='nombre' type='text' value="<?php echo $vUsuario[0][1];?>" id='nombre' placeholder='solo letras' required pattern="[A-Za-z ñáéíóú]*" title="el nombre solo debe contener letras">
			</div>
			<div class='form-group'>
					<label for='precio'>Apellidos:</label>
					<input class='form-control' name='apellidos' type='text' value="<?php echo $vUsuario[0][2];?>" id='apellidos' pattern="[A-Za-z ñáéíóú ]*" title="los apellidos solo debe contener letras">
			</div>
			<div class='form-group'>
					<label for='clave'>Clave:</label>
					<input class='form-control' name='clave' type='password' value="<?php echo $vUsuario[0][3];?>" id='clave' placeholder='6 a 12 caracteres' required pattern="[A-Za-z0-9]{6,12}" title="6 a 12 caracteres"/>
			</div>
				<div class='form-group'>
					<label for='clave2'>Verificar Clave:</label>
					<input class='form-control' name='clave2' type='password' value="<?php echo $vUsuario[0][3];?>" id='clave2' placeholder='6 a 12 caracteres' required pattern="[A-Za-z0-9]{6,12}" title="6 a 12 caracteres"/>
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