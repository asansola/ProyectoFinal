<?php 
	//continuar una sesion iniciada o si no inicia una
	if(!isset($_SESSION) ){
		session_start();
	}

	if (empty($_SESSION['usuario'])) {
		$mensaje="Debe iniciar sesión para ingresar a esta sección";
		echo "<script>";
		echo "if(alert('$mensaje'));";
		echo "window.location='index.php'";
		echo "</script>";
	}
	
	//comprobar la existencia del usuario y su rol
	if (isset($_SESSION['rol']) ){
		$rol=$_SESSION['rol'];
		
		if($rol!=1 && (basename($_SERVER['PHP_SELF']) == "mantenimiento_platos.php") || (basename($_SERVER['PHP_SELF']) == "mantenimiento_usuarios.php") 
			|| (basename($_SERVER['PHP_SELF']) == "mantenimiento_mesas.php") || (basename($_SERVER['PHP_SELF']) == "mantenimiento_proveedores.php") )
		{
			$mensaje="No tiene privilegios para esta sección";
			echo "<script>";
			echo "if(alert('$mensaje'));";
			echo "window.location='index.php'";
			echo "</script>";
		}
	}
	
?>