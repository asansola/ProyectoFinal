<?php
class Usuario /*extends EntidadBase*/{
	
	private $id;
	private $clave;
	private $nombre;
	private $apellidos;
	private $idhorario;
	private  $idrol;
	
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
	public function getClave(){
		return $this->clave;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellidos(){
		return $this->apellidos;
	}
	public function getIdhorario(){
		return $this->idhorario;
	}
	public function getIdrol(){
		return $this->idrol;
	}
	
	/**
	 * Metodos set
	 */
	public function setId($pId){
		$this->id= $pId;
	}
	public function setClave($pClave){
		$this->clave= $pClave;
	}
	public function setNombre($pNombre){
		$this->nombre= $pNombre;
	}
	public function setApellidos($pApellidos){
		$this->apellidos= $pApellidos;
	}
	public function setIdhorario($pIdhorario){
		$this->idhorario= $pIdhorario;
	}
	public function setIdrol($pIdrol){
		$this->idrol= $pIdrol;
	}

}