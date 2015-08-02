<?php
class Mesa /*extends EntidadBase*/{
	
	private $id;
	private $descripcion;
	private $idSalonero;
	
	public function __construct(){
	
	}
	
/*	public function __construct($pid,$pclave,$pnombre,$papellidos,$pidhorario,$pidrol){
		$this->id=$pidhorarioid;
		$this->clave=$pclave;
		$this->nombre=$pnombre;
		$this->apellidos=$papellidos;
		$this->idhorario=$pidhorario;
		$this->idrol=$pidrol;
	}*/

	/**
	 * metodos get
	 */
	public function getId(){
		return $this->id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}
	
	public function getIdSalonero(){
		return $this->idSalonero;
	}
	
	/**
	 * Metodos set
	 */
	public function setId($pId){
		$this->id= $pId;
	}
	public function setDescripcion($pDescripcion){
		$this->descripcion= $pDescripcion;
	}
	
	public function setIdSalonero($pIdSalonero){
		$this->idSalonero= $pIdSalonero;
	}
	
}