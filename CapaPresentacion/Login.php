<?php 
error_reporting(E_ALL ^ E_NOTICE);

if(!empty($_POST)){
	$idUsuario= $_POST['usuario'];
	$clave= $_POST['clave'];
	
	$usuario = new UsuarioBLL();
	$usuarioActual =$usuario->Consultar($idUsuario, $clave);
	if($usuarioActual !=0){
		session_start();
		$_SESSION['usuario']='Hola';
		$mensaje='Bienvenido '.$_SESSION['usuario'];
	
		echo "<script>";
		echo "if(alert('$mensaje'));";
		//echo "window.location='index.php'";
		echo "</script>";
		return true;
	}
	else{
		
		$mensaje='Datos Incorrectos';
		echo "<script>";
		echo "if(alert('$mensaje'));";
		echo "window.location='index.php'";
		echo "</script>";
		return false;
	}
}
?>


<?php  //funcion que me dice en que pagina estoy
		//if(basename($_SERVER['PHP_SELF']) != "entradas.php") { 
			include ('VerificarUsuario.php');		
	//	}		
		
		if (verificar_usuario())
		{
?>
<?php echo $_SESSION['usuario']; ?>
<input type="button" class="btn btn-default" name="salir_btn" value="Salir" onclick="window.location='salir.php'" />
<hr>

<?php		
		}else /*if(basename($_SERVER['PHP_SELF']) == "index.php")*/ {
?>
	<form class="navbar-form navbar-right" role="search" action="Login.php" method="POST"> 
		<div class="form-group">
		<input type="text" class="form-control" name="usuario" placeholder="Usuario" required> 
		<input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
		</div>
		<button type="submit" class="btn btn-default">Ingresar</button>
	</form>
<?php  
		//} else {
?>
	<!--  <input type="button" class="btn btn-default" name="login_btn" value="Entrar" onclick="window.location='index.php'" /> -->
<?php 
		}  
?>

