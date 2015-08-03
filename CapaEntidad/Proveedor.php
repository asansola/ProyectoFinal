<?php
class Proveedor /*extends EntidadBase*/{
	
	private $id;
	private $nombre;
	private $telefono;
	private $direccion;
	
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

	public function getNombre(){
		return $this->nombre;
	}
	public function getTelefono(){
		return $this->telefono;
	}
	public function getDireccion(){
		return $this->direccion;
	}

	
	/**
	 * Metodos set
	 */
	public function setId($pId){
		$this->id= $pId;
	}
	public function setNombre($pNombre){
		$this->nombre= $pNombre;
	}
	public function setTelefono($ptelefono){
		$this->telefono= $ptelefono;
	}
	public function setDireccion($pDireccion){
		$this->direccion= $pDireccion;
	}
	

}