<?php
session_start();
if (empty($_SESSION['usuario'])) {
	$mensaje="Debe iniciar sesión para ingresar a esta sección.";
	echo "<script>";
	echo "if(alert('$mensaje'));";
	echo "window.location='../index.php'";
	echo "</script>";
}