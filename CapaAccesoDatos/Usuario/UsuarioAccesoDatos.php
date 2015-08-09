<?php

class UsuarioAccesoDatos extends MantenimientoBase{

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Invocar el constructor del padre
		parent::__construct();
		FactoriaDAO::setTipoBaseDatos("MySQL");
	}

	public function Agregar($oUsuario){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$descripcionError='';
		$vSql = "CALL sp_I_Usuario (" . $oUsuario ->getId() . ", '" . $oUsuario->getClave() . "', '" . $oUsuario->getNombre() . "', '" . $oUsuario->getApellidos() . "', " . $oUsuario->getIdhorario() . ", " . $oUsuario->getIdrol() . ", @DescripcionError);";
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

	public function Modificar($oUsuario){
		//Inicializar el control de Errores
		parent::setHayError(False);
		
			
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_U_Usuario (" . $oUsuario ->getId() . ", '" . $oUsuario->getClave() . "', '" . $oUsuario->getNombre() . "', '" . $oUsuario->getApellidos() . "', " . $oUsuario->getIdhorario() . ", " . $oUsuario->getIdrol() . ", @DescripcionError);";
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

	public function Eliminar($oUsuario){
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_D_Usuario (" . $oUsuario ->getId() . ", @descripcionError);";
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
	
	public function Consultar($oUsuario){}
	
	public function ConsultarRegistro($idUsuario){
		//Variables Locales
		$queryResult=NULL;
		$vResultadoCursor = null;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Usuario_Registro('$idUsuario',@DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		//Retornar el objeto
		return $vResultadoCursor;
	
	}
	
	public function Verificar($id, $clave){
		//Variables Locales
		$queryResult=NULL;
		$vResultadoCursor = null;
			
		//Inicializar el control de Errores
		parent::setHayError(False);

		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Usuario_login (" . $id .", '" . $clave . "', @DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices( $vSql );
		
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
		$vSql = "CALL sp_Q_Usuario_Listar(@descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		
		return $vResultadoCursor;
	}
	
	public function ListarRol($rol){
		//Variables Locales
		$vResultadoCursor = null;
		$queryResult=NULL;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		//Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Usuario_Listar_Rol(".$rol.",@descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
	
		return $vResultadoCursor;
	}
	
	public function ListarLimite($limiteInicio, $limiteCantidad){
		//Variables Locales
		$vResultadoCursor = null;
		$queryResult=NULL;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		//Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Usuario_Listar_Limite('$limiteInicio','$limiteCantidad',@descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
	
		return $vResultadoCursor;
	}
	
	public function Contar(){
		//Variables Locales
		$vResultadoCursor = null;
		$queryResult=NULL;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		//Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Usuario_Contar(@descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
	
		return $vResultadoCursor;
	}
}
?>