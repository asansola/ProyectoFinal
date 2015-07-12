<?php
//Cargar todos los archivos PHP necesiarios para la
//ejecuci�n de la aplicaci�n
require_once("../CapaDAO/BaseDAO.php");
require_once("../CapaDAO/MySqlDAO.php");
require_once("../CapaDAO/FactoriaDAO.php");
require_once("../CapaEntidad/EntidadBase.php");
require_once("../CapaEntidad/TipoPlato.php");
require_once("../CapaAccesoDatos/MantenimientoBase.php");
require_once("../CapaAccesoDatos/Platos/TipoPlatoAccesoDatos.php");
require_once("../CapaBLL/LogicaNegocioMantenimientoBase.php");
require_once("../CapaBLL/Platos/TipoPlatoBLL.php");

require_once("../CapaEntidad/Usuario.php");
require_once("../CapaAccesoDatos/Usuario/UsuarioAccesoDatos.php");
require_once("../CapaBLL/Usuario/UsuarioBLL.php");

//Establecer la conexi�n con la Base de Datos

?>