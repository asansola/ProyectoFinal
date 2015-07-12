<?php
include ('VerificarUsuario.php');
if (verificar_usuario()){

	session_unset();
	session_destroy();
	header ('Location:index.php');
}
?>