<?php
class Ingrediente{
	
	private $id_horario;
	private $descripcion;
	private $unidad_medida;
	private $precio_unidad;

	public function __construct(){

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