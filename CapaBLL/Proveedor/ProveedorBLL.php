<?php

class ProveedorBLL extends LogicaNegocioMantenimientoBase{

	private $oProveedor= null;

	
	private $hayError;

	
	private $descripcionError;

	
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = false;
			
		//Crear la instancia del objeto
		
		$this->oProveedor = new ProveedorAccesoDatos();
	}

	public function getHayError(){
		return $this->oProveedor->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oProveedor->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oProveedor->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oProveedor->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oProveedor){
		return $this->oProveedor->Agregar($oProveedor);
	}

	public function Modificar($oProveedor){
		return $this->oProveedor->Modificar($oProveedor);
	}

	public function Eliminar($oProveedor){
		return $this->oProveedor->Eliminar($oProveedor);
	}
	
	public function Consultar($oProveedor){
		return $this->oProveedor->Consultar($oProveedor);
	}
	
	public function ConsultarRegistro($id){  //consulta por id de usuario con descripciones
		return $this->oProveedor->ConsultarRegistro($id);
	}
	

	public function Verificar($id,$clave){ //consulta por id y clave
		return $this->oProveedor->Verificar($id,$clave);
	}

	public function Listar(){
		return $this->oProveedor->Listar();
	}
	
	public function ListarLimite($limiteInicio, $limiteCantidad){
		return $this->oProveedor->ListarLimite($limiteInicio, $limiteCantidad);
	}
	
	
	public function Contar(){
		return $this->oProveedor->Contar();
	}
	

}