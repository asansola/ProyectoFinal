<?php

class RecetaBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo RecetaAccesoDatos
	 * @var RecetaAccesoDatos
	 */
	private $oReceta = null;

	/**
	 * Indicador si ocurri� un error en la �ltima transacci�n
	 * @var Boolean
	 */
	private $hayError;

	/**
	 * Descripci�n del �ltimo errro ocurrido en la transacci�n
	 * @var String
	 */
	private $descripcionError;

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = False;
			
		//Crear la instancia del objeto
		
		$this->oReceta = new RecetaAccesoDatos();
	}

	public function getHayError(){
		return $this->oReceta->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oReceta->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oReceta->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oReceta->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oReceta){
		return $this->oPlato->Agregar($oReceta);
	}

	public function Modificar($oReceta){
		return $this->oReceta->Modificar($oReceta);
	}

	public function Eliminar($oReceta){
		return $this->oReceta->Eliminar($oReceta);
	}

	public function Consultar($oReceta){
		return $this->oReceta->Consultar($oReceta);
	}
	
	public function ConsultarRegistro($idPlato){
		return $this->oReceta->ConsultarRegistro($idPlato);
	}

	public function Listar(){
		return $this->oReceta->Listar();
	}

	public function Verificar($id, $clave){
	
	}

}
