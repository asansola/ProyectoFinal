<?php
class PedidoFactura {
	
	private $id_pedido;
	private $id_salonero;
	private $id_mesa;
	private $fecha;
	private $id_estado_pedido;
	private $total_pedido;
	
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