<?php

class InventarioBLL extends LogicaNegocioMantenimientoBase{

	private $oInventario = null;

	
	private $hayError;

	
	private $descripcionError;

	
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = false;
			
		//Crear la instancia del objeto
		
		$this->oInventario = new InventarioAccesoDatos();
	}

	public function getHayError(){
		return $this->oInventario->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oInventario->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oInventario->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oInventario->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oInventario){
		return $this->oInventario->Agregar($oInventario);
	}

	public function Modificar($oInventario){
		return $this->oInventario->Modificar($oInventario);
	}

	public function Eliminar($oMesa){
		return $this->oInventario->Eliminar($oMesa);
	}
	
	public function Consultar($oMesa){
		return $this->oInventario->Consultar($oMesa);
	}
	
	public function ConsultarRegistro($id){  //consulta por id 
		return $this->oInventario->ConsultarRegistro($id);
	}
	

	public function Verificar($id,$clave){ //consulta por id y clave
		return $this->oInventario->Verificar($id,$clave);
	}

	public function Listar(){
		return $this->oInventario->Listar();
	}
	
	public function ListarLimite($limiteInicio, $limiteCantidad){
		return $this->oInventario->ListarLimite($limiteInicio, $limiteCantidad);
	}
	
	public function Contar(){
		return $this->oInventario->Contar();
	}

}