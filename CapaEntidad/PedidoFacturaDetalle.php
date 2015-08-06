<?php
class PedidoFacturaDetalle {
	
	private $id_detalle;
	private $id_pedido;
	private $id_plato;
	private $cantidad;
	private $precio;
	private $total_linea;
	private $id_estado_detalle;
	
	public function __construct() {
}
	
	// set's y get's
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