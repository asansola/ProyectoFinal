<?php


class PlatoAccesoDatos extends MantenimientoBase{

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Invocar el constructor del padre
		parent::__construct();
		FactoriaDAO::setTipoBaseDatos("MySQL");
	}

	public function Agregar($oPlato){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$descripcionError='';
		$vSql = "CALL sp_I_Plato (" . $oEstudiante->getCarnet() . ", '" . $oEstudiante->getCod_Carrera() . "', '" . $oEstudiante->getNombre() . "', 'admin', @DescripcionError);";
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

	public function Modificar($oPlato){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_U_Plato (" . $oPlato->__get('id_plato') . ", '" . $oPlato->__get('nombre') . "', " . $oPlato->__get('precio') . ", '" . $oPlato->__get('imagen') . "', " . $oPlato->__get('id_tipo_plato') . ", @DescripcionError);";
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

	public function Eliminar($oPlato){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_D_Plato (" . $oPlato->__get(TipoPlato). ", @descripcionError);";
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

	public function Consultar($oPlato){
		//Variables Locales
		$queryResult=NULL;
		$vResultadoCursor = null;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Plato_Tipo_Plato(" .$oPlato->__get('id_tipo_plato') . ",@DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);		
		//Retornar el objeto
		return $vResultadoCursor;

	}

	public function ConsultarRegistro($idPlato){
		//Variables Locales
		$queryResult=NULL;
		$vResultadoCursor = null;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Plato_Registro('$idPlato',@DescripcionError);";
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
		$vSql = "CALL sp_Q_Plato_Listar(@descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		
		return $vResultadoCursor;
	}
	
	public function Verificar($id, $clave){
		
	}




}
