<?php

class TipoPlatoBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo TipoPlatosBLL
	 * @var TipoPlatosBLL
	 */
	private $oTipoPlato = null;

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
		
		$this->oTipoPlato = new TipoPlatoAccesoDatos();
	}

	public function getHayError(){
		return $this->oTipoPlato->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oTipoPlato->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oTipoPlato->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oTipoPlato->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oTipoPlato){
		return $this->oTipoPlato->Agregar($oTipoPlato);
	}

	public function Modificar($oTipoPlato){
		return $this->$oTipoPlato->Modificar($oTipoPlato);
	}

	public function Eliminar($oTipoPlato){
		return $this->oTipoPlato->Eliminar($oTipoPlato);
	}

	public function Consultar($oTipoPlato){
		return $this->oTipoPlato->Consultar($oTipoPlato);
	}
	
	public function ConsultarNombre($oTipoPlato){
		return $this->oTipoPlato->ConsultarNombre($oTipoPlato);
	}

	public function Listar(){
		return $this->oTipoPlato->Listar();
	}

	public function Verificar($id, $clave){
	
	}

}