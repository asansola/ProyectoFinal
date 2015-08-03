<?php
//continuar una sesion iniciada
if(!isset($_SESSION) ){
	session_start();
} 

//Cargar todos los archivos PHP necesarios para la
//ejecucion de la aplicacion
require_once("../../CapaDAO/BaseDAO.php");
require_once("../../CapaDAO/MySqlDAO.php");
require_once("../../CapaDAO/FactoriaDAO.php");


require_once("../../CapaEntidad/EntidadBase.php");
require_once("../../CapaAccesoDatos/MantenimientoBase.php");
require_once("../../CapaBLL/LogicaNegocioMantenimientoBase.php");


/*require_once("../../CapaEntidad/Usuario.php");
require_once("../../CapaAccesoDatos/Usuario/UsuarioAccesoDatos.php");
require_once("../../CapaBLL/Usuario/UsuarioBLL.php");*/

require_once("../../CapaEntidad/Proveedor.php");
require_once("../../CapaAccesoDatos/Proveedor/ProveedorAccesoDatos.php");
require_once("../../CapaBLL/Proveedor/ProveedorBLL.php");
?>