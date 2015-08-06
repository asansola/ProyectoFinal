<?php
class Inventario /*extends EntidadBase*/{
	
	private $id;
	private $id_proveedor;
	private $id_ingrediente;
	private $cantidad;
	
	
	public function __construct(){
	
	}
	

	/**
	 * metodos get
	 */
	public function getId(){
		return $this->id;
	}
	public function getProvedor(){
		return $this->id_proveedor;
	}
	public function getIngrediente(){
		return $this->id_ingrediente;
	}
	public function getCantidad(){
		return $this->cantidad;
	}
	
	/**
	 * Metodos set
	 */
	public function setId($pId){
		$this->id= $pId;
	}

	public function setProveedor($pProveedor){
		return $this->id_proveedor=$pProveedor;
	}
	public function setIngrediente($pIngrediente){
		return $this->id_ingrediente=$pIngrediente;
	}
	public function setCantidad($pCantidad){
		return $this->cantidad=$pCantidad;
	}
		
}