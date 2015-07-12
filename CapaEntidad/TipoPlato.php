<?php
class TipoPlato{
	
	private $id_tipo_plato;
	private $descripcion;
	private $url_imagen;

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