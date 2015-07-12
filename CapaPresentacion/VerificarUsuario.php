<?php 
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