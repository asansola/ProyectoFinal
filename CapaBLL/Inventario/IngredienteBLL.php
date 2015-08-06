<?php

class IngredienteBLL extends LogicaNegocioMantenimientoBase{

	private $oIngrediente = null;

	
	private $hayError;

	
	private $descripcionError;

	
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = false;
			
		//Crear la instancia del objeto
		
		$this->oIngrediente= new IngredienteAccesoDatos();
	}

	public function getHayError(){
		return $this->oIngrediente->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oIngrediente->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oIngrediente->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oIngrediente->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oIngrediente){
		return $this->oIngrediente->Agregar($oIngrediente);
	}

	public function Modificar($oIngrediente){
		return $this->oIngrediente->Modificar($oIngrediente);
	}

	public function Eliminar($oIngrediente){
		return $this->oIngrediente->Eliminar($oIngrediente);
	}
	
	public function Consultar($oIngrediente){
		return $this->oIngrediente->Consultar($oIngrediente);
	}
	
	public function ConsultarRegistro($id){  //consulta por id 
		return $this->oIngrediente->ConsultarRegistro($id);
	}
	

	public function Verificar($id,$clave){ //consulta por id y clave
		return $this->oIngrediente->Verificar($id,$clave);
	}

	public function Listar(){
		return $this->oIngrediente->Listar();
	}
	
	public function ListarLimite($limiteInicio, $limiteCantidad){
		return $this->oIngrediente->ListarLimite($limiteInicio, $limiteCantidad);
	}
	
	public function Contar(){
		return $this->oIngrediente->Contar();
	}

}