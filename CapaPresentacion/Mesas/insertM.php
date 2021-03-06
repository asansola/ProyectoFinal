<?php

include ("IncluirClases.php");
//si hace click sobre un registro llene el form modal con datos
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
}


//si hizo click en el envio
if (isset ( $_POST ['submit'] )) {
	//captura de datos	
	$id = $_POST ['id'];
	$descripcion = $_POST ['descripcion'];
	$salonero= $_POST['salonero'];
	
	//instancia de la identidad
	$MesaE = new Mesa();
	$MesaE ->setId($id);
	$MesaE ->setDescripcion($descripcion);
	$MesaE ->setIdSalonero($salonero);

	$MesaBLL= new MesaBLL();
	$MesaBLL->Agregar($MesaE);
	
	if($MesaBLL->getHayError() ){ 
		$_SESSION ['registrado'] = 'f2';
	}
	else{
		$_SESSION ['registrado'] = 't1';
	}
	
	//sea cual sea el caso lo retorna a mantenimientos
	header ( "location:../Mantenimiento_Mesas.php" );

}
	
?>


<form method="post" action="Mesas/insertM.php" role="form" data-toggle="validator">
	<div class="modal-body">
		
		<div class='form-group'>
			<label for='id'>Número de Mesa:</label>
			<input class='form-control' name='id' type='text' id='id' placeholder='solo números' required pattern="[0-9]{1,2}" title="Rango de 1 a 99 mesas">
		</div>
			
		<div class='form-group'>
			<label for='nombre'>Descripción General:</label>
			<input class='form-control' name='descripcion' type='text' id='descripcion' placeholder='cupo de la mesa' required pattern="[Mmesa para]{1,}[0-9]{1,2}[ personas]{1,}" title="Ejemplo: Mesa para 2 personas">
		</div>	
		
			<div class='form-group'>
					<label for='salonero'>Salonero:</label>
						<?php
							$usuario = new UsuarioBLL();
							$rol=2;
							$vUsuario= $usuario->ListarRol($rol);
							$count = 0;
							$result = array ();
							$result [$count] = array (
									"id_usuario" => '',
									"nombre" => '-Seleccione una opción-' ,
									 "apellidos" => '' 
										);
										
								foreach ( $vUsuario as $row ) {
									$result [++ $count] = array (
											"id_usuario" => $row [0],
											"nombre" => $row [1],
											"apellidos" =>$row[2]
									);
											
								}
								?>
								<select id='salonero' name='salonero' class='selectpicker'  required='true'>
								<?php
								foreach ( $result as $each ) {
									$selected = ($each['id_usuario'] === $vMesa[0][4]) ? ' selected="selected"' : '';
								?>
								<option value=<?php echo $each['id_usuario'];?><?php echo $selected;?> ><?php echo $each['nombre'] ." ".$each['apellidos']?></option>
								
								<?php  }?>
									 
								</select>									
			</div>
			
	</div>
	
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="submit"
			value="Agregar Mesa" />&nbsp;
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>
</form>	