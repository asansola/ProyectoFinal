<?php
class Plato {
	
	
	// atributos de la clase
	private $id_plato;
	private $nombre;
	private $precio;
	private $imagen;
	private $id_tipo_plato;
	
	public function __construct($pId_plato='', $pNombre='', $pPrecio='', $pImagen='', $pId_Tipo_Plato='') {
		$this->id_plato = $pId_plato;
		$this->nombre = $pNombre;
		$this->precio = $pPrecio;
		$this->imagen = $pImagen;
		$this->id_tipo_plato = $pId_Tipo_Plato;
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