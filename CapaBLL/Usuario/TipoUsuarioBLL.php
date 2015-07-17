<?php

class TipoUsuarioBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo TipoPlatosBLL
	 * @var TipoPlatosBLL
	 */
	private $oTipoUsuario= null;

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
		
		$this->oTipoUsuario = new TipoUsuarioAccesoDatos();
	}

	public function getHayError(){
		return $this->oTipoUsuario->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oTipoUsuario->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oTipoUsuario->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oTipoUsuario->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oTipoPlato){
		return $this->oTipoUsuario->Agregar($oTipoUsuario);
	}

	public function Modificar($oTipoPlato){
		return $this->oTipoUsuario->Modificar($oTipoUsuario);
	}

	public function Eliminar($oTipoPlato){
		return $this->oTipoUsuario->Eliminar($oTipoUsuario);
	}

	public function Consultar($oTipoPlato){
		return $this->oTipoUsuario->Consultar($oTipoUsuario);
	}
	
	public function ConsultarNombre($oTipoUsuario){
		return $this->oTipoUsuario->ConsultarNombre($oTipoUsuario);
	}

	public function Listar(){
		return $this->oTipoUsuario->Listar();
	}

	public function Verificar($id, $clave){
	
	}

}