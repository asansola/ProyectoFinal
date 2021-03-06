<?php
class PedidoFacturaDetalleAccesoDatos extends MantenimientoBase {

	/**
	 * Constructor de la clase
	 */
	public function __construct() {
		// Invocar el constructor del padre
		parent::__construct ();
		FactoriaDAO::setTipoBaseDatos ( "MySQL" );
	}

	public function Agregar($oLineaDetalle) {
		// Inicializar el control de Errores
		parent::setHayError ( False );

		// Invocar el Procedimiento Almacenado
		$descripcionError = '';
		$vSql = "CALL sp_I_Linea_Detalle (" . $oLineaDetalle->__get ( 'id_pedido' ) . "," . $oLineaDetalle->__get ( 'id_plato' ) . "
				 ," . $oLineaDetalle->__get ( 'cantidad' ) . "," . $oLineaDetalle->__get ( 'precio' ) . "," . $oLineaDetalle->__get ( 'total_linea' ) . ",
				 		 " . $oLineaDetalle->__get ( 'id_estado_detalle' ) . ", @DescripcionError);";
		FactoriaDAO::getConexionBaseDatos ()->AbrirConexion ();
	     FactoriaDAO::getConexionBaseDatos ()->EjecutarSQLError( $vSql );

		// Leer la variable de salida del error
		 if (FactoriaDAO::getConexionBaseDatos ()->getHayError ()) {
			parent::setHayError ( True );
			parent::setDescripcionError ( FactoriaDAO::getConexionBaseDatos ()->getDescripcionError () );
		}

		// Retornar True si no hay errores
		return ! parent::getHayError ();
	}
	public function Modificar($oLineaDetalle) {
		// Inicializar el control de Errores
		parent::setHayError ( False );

		// Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_U_Pedido (@DescripcionError);";
		FactoriaDAO::getConexionBaseDatos ()->AbrirConexion ();
		FactoriaDAO::getConexionBaseDatos ()->EjecutarSQLError ( $vSql );

		// Leer la variable de salida del error
		if (FactoriaDAO::getConexionBaseDatos ()->getHayError ()) {
			parent::setHayError ( True );
			parent::setDescripcionError ( FactoriaDAO::getConexionBaseDatos ()->getDescripcionError () );
		}

		// Retornar True si no hay errores
		return ! parent::getHayError ();
	}
	public function Eliminar($oLineaDetalle) {
		// Inicializar el control de Errores
		parent::setHayError ( False );

		// Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_D_Pedido (" . $oPlato->__get ( TipoPlato ) . ", @descripcionError);";
		FactoriaDAO::getConexionBaseDatos ()->AbrirConexion ();
		FactoriaDAO::getConexionBaseDatos ()->EjecutarSQL_DML ( $vSql );

		// Leer la variable de salida del error
		if (FactoriaDAO::getConexionBaseDatos ()->getHayError ()) {
			parent::setHayError ( True );
			parent::setDescripcionError ( FactoriaDAO::getConexionBaseDatos ()->getDescripcionError () );
		}

		// Retornar True si no hay errores
		return ! parent::getHayError ();
	}
	public function Consultar($idPedido) {
		// Variables Locales
		$queryResult = NULL;
		$vResultadoCursor = null;

		// Inicializar el control de Errores
		parent::setHayError ( False );
		// Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Linea_Detalle(" . $idPedido . ",@DescripcionError);";
		FactoriaDAO::getConexionBaseDatos ()->AbrirConexion ();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos ()->EjecutarSQLIndices ( $vSql );
		// Retornar el objeto
		return $vResultadoCursor;
	}
	public function ConsultarRegistro($id_pedido) {
		// Variables Locales
		$queryResult = NULL;
		$vResultadoCursor = null;

		// Inicializar el control de Errores
		parent::setHayError ( False );
		// Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Linea_Detalle('$id_pedido',@DescripcionError);";
		FactoriaDAO::getConexionBaseDatos ()->AbrirConexion ();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos ()->EjecutarSQLIndices( $vSql );
		// Retornar el objeto
		return $vResultadoCursor;
	}
	public function Listar() {
		// Variables Locales
		$vResultadoCursor = null;
		$queryResult = NULL;

		// Inicializar el control de Errores
		parent::setHayError ( False );

		// Invocar el Procedimiento Almacenado
		// Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Pedido_Listar(@descripcionError);";
		FactoriaDAO::getConexionBaseDatos ()->AbrirConexion ();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos ()->EjecutarSQLIndices ( $vSql );

		return $vResultadoCursor;
	}
	public function Verificar($id, $clave) {
	}
	public function ultimoValorTabla($nombreTabla) {
		// Variables Locales
		$vResultadoCursor = null;
		$queryResult = NULL;

		// Inicializar el control de Errores
		parent::setHayError ( False );

		// Invocar el Procedimiento Almacenado
		// Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Ultimo_Valor_Parametros('$nombreTabla',@descripcionError);";
		FactoriaDAO::getConexionBaseDatos ()->AbrirConexion ();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos ()->EjecutarSQLIndices ( $vSql );

		return $vResultadoCursor;
	}
}
