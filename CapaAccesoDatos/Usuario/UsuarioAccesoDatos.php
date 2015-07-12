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

	}

	public function Modificar($oUsuario){
			
	}

	public function Eliminar($oUsuario){

	}

	public function ConsultarUno($id,$clave){
		//Variables Locales
		$queryResult=NULL;
		$vResultadoCursor = null;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
		//Invocar el Procedimiento Almacenado
		$vSql = "CALL sp_Q_Usuario_login (" . $id .", '" . $clave . "', @DescripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		//Retornar el objeto
		return $vResultadoCursor;

	}

	public function Listar(){
	
	}
	
	public  function  Consultar($oUsuario){}

}
?>