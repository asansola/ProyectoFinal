<?php 	

	// si hay submit en el form
	if( !empty($_POST) ){	

		$idUsuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		
		$usuario = new UsuarioBLL();
		$usuarioActual = $usuario->Verificar($idUsuario, $clave);

		if( $usuarioActual != "" ){		

			$_SESSION['usuario'] = $usuarioActual[0][2] . " " . $usuarioActual[0][3]; //Mostar nombre y apellidos
			$_SESSION['rol'] = $usuarioActual[0][5]; //Rol para definir los menus a mostrar
			$mensaje = 'Bienvenido ' . $_SESSION['usuario'];
		
			echo "<script>";
			echo "if(alert('$mensaje'));";
			echo "window.location='index.php'";
			echo "</script>";

		}
		else
		{
	
			$mensaje='Datos Incorrectos';
			echo "<script>";
			echo "if(alert('$mensaje'));";
			//echo "window.location='index.php'";
			echo "</script>";

		}

	} 

	//comprobar la existencia del usuario
	if ( isset($_SESSION['usuario']) ){
		$usuario_logueado = true;

	}	
	

	if ( isset($usuario_logueado) ) {
?>	
	<ul class="nav navbar-nav navbar-right">
		<li style="color:white;"><span><?php echo $_SESSION['usuario']; ?></span>&nbsp;</li>
		<li><input type="button" class="btn btn-default" name="salir_btn" value="Salir" onclick="window.location='salir.php'" /></li>
	</ul>	

<?php		
	} else {
?>
	<ul class="nav navbar-nav navbar-right">
		<form class="navbar-form"  action="index.php" method="POST"> 
			<div class="form-group">
			<input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
			<input type="password" class="form-control" name="clave" value="123" placeholder="Contraseña" required> 
			</div>
			<button type="submit" class="btn btn-default">Ingresar</button>
		</form>
	</ul>	
<?php  
	}  
?>

