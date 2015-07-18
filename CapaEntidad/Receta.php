<?php
class Receta {
	
	
	// atributos de la clase
	private $id_plato;
	private $id_ingrediente;
	private $descripcion;
	private $cantidad_ingrediente;
	
	
	public function __construct($pId_plato='', $pId_ingrediente='', $pDescripcion='', $pCantidad_ingrediente='') {
		$this->id_plato = $pId_plato;
		$this->id_ingrediente = $pId_ingrediente;
		$this->descripcion = $pDescripcion;
		$this->cantidad_ingrediente = $pCantidad_ingrediente;
		
	}
	
	
	//set's y get's
	public function __set($var, $valor) {
		if (property_exists ( __CLASS__, $var )) {
			$this->$var = $valor;
		} else {
			echo "No existe el atributo $var.";
		}
	}
	public function __get($var) {
	if (property_exists ( __CLASS__, $var )) {
	return $this->$var;
	}
	return NULL;
	}
}
