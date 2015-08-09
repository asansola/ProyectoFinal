<?php

class UsuarioBLL extends LogicaNegocioMantenimientoBase{

	private $oUsuario = null;

	
	private $hayError;

	
	private $descripcionError;

	
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = false;
			
		//Crear la instancia del objeto
		
		$this->oUsuario = new UsuarioAccesoDatos();
	}

	public function getHayError(){
		return $this->oUsuario->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oUsuario->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oUsuario->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oUsuario->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oUsuario){
		return $this->oUsuario->Agregar($oUsuario);
	}

	public function Modificar($oUsuario){
		return $this->oUsuario->Modificar($oUsuario);
	}

	public function Eliminar($oUsuario){
		return $this->oUsuario->Eliminar($oUsuario);
	}
	
	public function Consultar($oUsuario){
		return $this->oUsuario->Consultar($oUsuario);
	}
	
	public function ConsultarRegistro($id){  //consulta por id de usuario con descripciones
		return $this->oUsuario->ConsultarRegistro($id);
	}
	

	public function Verificar($id,$clave){ //consulta por id y clave
		return $this->oUsuario->Verificar($id,$clave);
	}

	public function Listar(){
		return $this->oUsuario->Listar();
	}
	
	public function ListarRol($rol){
		return $this->oUsuario->ListarRol($rol);
	}
	
	public function ListarLimite($limiteInicio, $limiteCantidad){
		return $this->oUsuario->ListarLimite($limiteInicio, $limiteCantidad);
	}
	
	public function Contar(){
		return $this->oUsuario->Contar();
	}

}