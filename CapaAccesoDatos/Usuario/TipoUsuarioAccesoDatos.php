<?php


class TipoUsuarioAccesoDatos extends MantenimientoBase{

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Invocar el constructor del padre
		parent::__construct();
		FactoriaDAO::setTipoBaseDatos("MySQL");
	}

	public function Agregar($oTipoUsuario){

	}

	public function Modificar($oTipoUsuario){
			
	}

	public function Eliminar($oTipoUsuario){

	}

	public function Consultar($oTipoUsuario){

	}
	
	public function ConsultarNombre($oTipoUsuario){
	
	}

	public function Listar(){
	/*	//Variables Locales
		$vResultadoCursor = null;
		$queryResult=NULL;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		//Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Tipo_Plato (0, @descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		
		return $vResultadoCursor;*/
	}

	public function Verificar($id, $clave){
	
	}


}