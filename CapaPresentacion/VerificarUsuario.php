<?php 
/*
$idUsuario= $_POST['usuario'];
$clave= $_POST['clave'];

$usuario = new UsuarioBLL();
$usuarioActual =$usuario->Consultar($idUsuario, $clave);
if($usuarioActual !=0){
	session_start();
	$_SESSION['usuario']='Hola';
	return true;
}
else{
	return false;
}*/

function verificar_usuario(){
	//continuar una sesion iniciada
	if(!isset($_SESSION) ){
		session_start();
	}
	
	//comprobar la existencia del usuario
	if ( isset($_SESSION['usuario']) ){
		return true;
	}
}
?>