<?php

class PlatoBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo PlatoBLL
	 * @var PlatoBLL
	 */
	private $oPlato = null;

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
		
		$this->oPlato = new PlatoAccesoDatos();
	}

	public function getHayError(){
		return $this->oPlato->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oPlato->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oPlato->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oPlato->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oPlato){
		return $this->oPlato->Agregar($oPlato);
	}

	public function Modificar($oPlato){
		return $this->$oPlato->Modificar($oPlato);
	}

	public function Eliminar($oPlato){
		return $this->oPlato->Eliminar($oPlato);
	}

	public function Consultar($oPlato){
		return $this->oPlato->Consultar($oPlato);
	}
	
	public function ConsultarRegistro($idPlato){
		return $this->oPlato->ConsultarRegistro($idPlato);
	}

	public function Listar(){
		return $this->oPlato->Listar();
	}

	public function Verificar($id, $clave){
	
	}

}
