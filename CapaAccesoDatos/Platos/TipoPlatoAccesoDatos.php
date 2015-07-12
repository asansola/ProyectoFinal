<?php


class TipoPlatoAccesoDatos extends MantenimientoBase{

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Invocar el constructor del padre
		parent::__construct();
		FactoriaDAO::setTipoBaseDatos("MySQL");
	}

	public function Agregar($oTipoPlato){

	}

	public function Modificar($oTipoPlato){
			
	}

	public function Eliminar($oTipoPlato){

	}

	public function Consultar($oTipoPlato){
			

	}
	
	public function Verificar($id, $clave){ }
	
	public function Listar(){
		//Variables Locales
		$vResultadoCursor = null;
		$queryResult=NULL;
			
		//Inicializar el control de Errores
		parent::setHayError(False);
			
		//Invocar el Procedimiento Almacenado
		//Se manda 0 en par�metro ya que se desea leer todas las tuplas
		$vSql = "CALL sp_Q_Tipo_Plato (0, @descripcionError);";
		FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
		$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQLIndices($vSql);
		
		return $vResultadoCursor;
	}




}