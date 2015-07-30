<?php

class MesaBLL extends LogicaNegocioMantenimientoBase{

	private $oMesa = null;

	
	private $hayError;

	
	private $descripcionError;

	
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = false;
			
		//Crear la instancia del objeto
		
		$this->oMesa = new MesaAccesoDatos();
	}

	public function getHayError(){
		return $this->oMesa->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oMesa->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oMesa->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oMesa->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oMesa){
		return $this->oMesa->Agregar($oMesa);
	}

	public function Modificar($oMesa){
		return $this->oMesa->Modificar($oMesa);
	}

	public function Eliminar($oMesa){
		return $this->oMesa->Eliminar($oMesa);
	}
	
	public function Consultar($oMesa){
		return $this->oMesa->Consultar($oMesa);
	}
	
	public function ConsultarRegistro($id){  //consulta por id 
		return $this->oMesa->ConsultarRegistro($id);
	}
	

	public function Verificar($id,$clave){ //consulta por id y clave
		return $this->oMesa->Verificar($id,$clave);
	}

	public function Listar(){
		return $this->oMesa->Listar();
	}

}