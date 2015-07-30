<?php


class PedidoFacturaAccesoDatos extends MantenimientoBase{

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Invocar el constructor del padre
		parent::__construct();
		FactoriaDAO::setTipoBaseDatos("MySQL");
	}

	public function Agregar($oPedido){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$descripcionError='';
		$vSql = "CALL sp_I_Pedido ('" . $oPlato->__get('nombre') . "', " . $oPlato->__get('precio') . ", '" . $oPlato->__get('imagen') . "', ".$oPlato->__get('id_tipo_plato').", @DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		FactoriaDAO::getConexionBaseDatos()->EjecutarSQLError($vSql);
			
		//Leer la variable de salida del error
		if(FactoriaDAO::getConexionBaseDatos()->getHayError()){
			parent::setHayError(True);
			parent::setDescripcionError(FactoriaDAO::getConexionBaseDatos()->getDescripcionError());
		}
		
		//Retornar True si no hay errores
		return !parent::getHayError();
	}

	public function Modificar($Pedido){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_U_Pedido (" . $oPlato->__get('id_plato') . ", '" . $oPlato->__get('nombre') . "', " . $oPlato->__get('precio') . ", '" . $oPlato->__get('imagen') . "', " . $oPlato->__get('id_tipo_plato') . ", @DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		FactoriaDAO::getConexionBaseDatos()->EjecutarSQLError($vSql);
		
		//Leer la variable de salida del error
		if(FactoriaDAO::getConexionBaseDatos()->getHayError()){
			parent::setHayError(True);
			parent::setDescripcionError(FactoriaDAO::getConexionBaseDatos()->getDescripcionError());
		}
			
		//Retornar True si no hay errores
		return !parent::getHayError();
	}

	public function Eliminar($oPedido){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_D_Pedido (" . $oPlato->__get(TipoPlato). ", @descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		FactoriaDAO::getConexionBaseDatos()->EjecutarSQL_DML($vSql);
		
		//Leer la variable de salida del error
		if(FactoriaDAO::getConexionBaseDatos()->getHayError()){
			parent::setHayError(True);
			parent::setDescripcionError(FactoriaDAO::getConexionBaseDatos()->getDescripcionError());
		}
			
		//Retornar True si no hay errores
		return !parent::getHayError();
	}

	public function Consultar($oPedido){
		//Variables Locales
		$queryResult=NULL;
		$vResultadoCursor = null;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Pedido(" .$oPlato->__get('id_tipo_plato') . ",@DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);		
		//Retornar el objeto
		return $vResultadoCursor;

	}

	public function ConsultarRegistro($id){
		//Variables Locales
		$queryResult=NULL;
		$vResultadoCursor = null;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_('$idPlato',@DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		//Retornar el objeto
		return $vResultadoCursor;
	
	}
	

	public function Listar(){
		//Variables Locales
		$vResultadoCursor = null;
		$queryResult=NULL;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		//Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Pedido_Listar(@descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		
		return $vResultadoCursor;
	}
	
	public function Verificar($id, $clave){
		
	}
	
	public function ultimoValorTabla($nombreTabla) {
		//Variables Locales
		$vResultadoCursor = null;
		$queryResult=NULL;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		//Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Ultimo_Valor_Parametros('$nombreTabla',@descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		
		return $vResultadoCursor;
	}




}
