<?php
//continuar una sesion iniciada
if(!isset($_SESSION) ){
	session_start();
} 

//Cargar todos los archivos PHP necesarios para la
//ejecucion de la aplicacion
require_once("../CapaDAO/BaseDAO.php");
require_once("../CapaDAO/MySqlDAO.php");
require_once("../CapaDAO/FactoriaDAO.php");


require_once("../CapaEntidad/EntidadBase.php");
require_once("../CapaEntidad/TipoPlato.php");
require_once("../CapaEntidad/Plato.php");

require_once("../CapaAccesoDatos/MantenimientoBase.php");
require_once("../CapaAccesoDatos/Platos/TipoPlatoAccesoDatos.php");
require_once("../CapaAccesoDatos/Platos/PlatoAccesoDatos.php");

require_once("../CapaBLL/LogicaNegocioMantenimientoBase.php");
require_once("../CapaBLL/Platos/TipoPlatoBLL.php");
require_once("../CapaBLL/Platos/PlatoBLL.php");


require_once("../CapaEntidad/Usuario.php");
require_once("../CapaEntidad/TipoUsuario.php");

require_once("../CapaEntidad/Horario.php");
require_once("../CapaAccesoDatos/Horario/HorarioAccesoDatos.php");
require_once("../CapaBLL/Horario/HorarioBLL.php");

require_once("../CapaAccesoDatos/Usuario/UsuarioAccesoDatos.php");
require_once("../CapaAccesoDatos/Usuario/TipoUsuarioAccesoDatos.php");

require_once("../CapaBLL/Usuario/UsuarioBLL.php");
require_once("../CapaBLL/Usuario/TipoUsuarioBLL.php");

require_once("../CapaEntidad/Receta.php");
require_once("../CapaAccesoDatos/Receta/RecetaAccesoDatos.php");
require_once("../CapaBLL/Receta/RecetaBLL.php");

require_once("../CapaEntidad/Mesa.php");
require_once("../CapaAccesoDatos/Mesa/MesaAccesoDatos.php");
require_once("../CapaBLL/Mesa/MesaBLL.php");

require_once("../CapaEntidad/Proveedor.php");
require_once("../CapaAccesoDatos/Proveedor/ProveedorAccesoDatos.php");
require_once("../CapaBLL/Proveedor/ProveedorBLL.php");

require_once("../CapaEntidad/PedidoFactura.php");
require_once("../CapaAccesoDatos/Pedido/PedidoFacturaAccesoDatos.php");
require_once("../CapaBLL/Pedido/PedidoFacturaBLL.php");

require_once("../CapaEntidad/PedidoFacturaDetalle.php");
require_once("../CapaAccesoDatos/Pedido/PedidoFacturaDetalleAccesoDatos.php");
require_once("../CapaBLL/Pedido/PedidoFacturaDetalleBLL.php");



require_once ("Carrito.php");


?>