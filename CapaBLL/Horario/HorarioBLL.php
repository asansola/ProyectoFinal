<?php

class HorarioBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo TipoPlatosBLL
	 * @var TipoPlatosBLL
	 */
	private $oHorario= null;

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
		
		$this->oHorario= new HorarioAccesoDatos();
	}

	public function getHayError(){
		return $this->oHorario->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oHorario->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oHorario->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oHorario->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oHorario){
		return $this->oHorario->Agregar($oHorario);
	}

	public function Modificar($oHorario){
		return $this->oHorario->Modificar($oHorario);
	}

	public function Eliminar($oHorario){
		return $this->oHorario->Eliminar($oHorario);
	}

	public function Consultar($oHorario){
		return $this->oHorario->Consultar($oHorario);
	}
	
	public function ConsultarNombre($oHorario){
		return $this->oHorario->ConsultarNombre($oHorario);
	}

	public function Listar(){
		return $this->oHorario->Listar();
	}

	public function Verificar($id, $clave){
	
	}

}