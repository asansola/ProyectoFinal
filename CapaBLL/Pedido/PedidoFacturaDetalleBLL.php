<?php

class PedidoFacturaDetalleBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo PedidoFacturaDetalleBLL
	 * @var PedidoFacturaDetalleBLL
	 */
	private $oPedidoFacturaDetalle = null;

	/**
	 * Indicador si ocurri� un error en la �ltima transacci�n
	 * @var Boolean
	 */
	private $hayError;

	/**
	 * Descripci�n del �ltimo errro ocurrido en la transacci�n
	 * @var String
	 */
	private $descripcionError;

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = False;

		//Crear la instancia del objeto

		$this->oPedidoFacturaDetalle = new PedidoFacturaDetalleAccesoDatos();
	}

	public function getHayError(){
		return $this->oPedidoFacturaDetalle->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oPedidoFacturaDetalle->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oPedidoFacturaDetalle->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oPedidoFacturaDetalle->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oPedidoFacturaDetalle){
		return $this->oPedidoFacturaDetalle->Agregar($oPedidoFacturaDetalle);
	}

	public function Modificar($oPedidoFacturaDetalle){
		return $this->oPedidoFacturaDetalle->Modificar($oPedidoFacturaDetalle);
	}

	public function Eliminar($oPedidoFacturaDetalle){
		return $this->oPedidoFacturaDetalle->Eliminar($oPedidoFacturaDetalle);
	}

	public function Consultar($idPedido){
		return $this->oPedidoFacturaDetalle->Consultar($idPedido);
	}

	public function ConsultarRegistro($id_pedido){
		return $this->oPedidoFacturaDetalle->ConsultarRegistro($id_pedido);
	}

	public function Listar(){
		return $this->oPedidoFacturaDetalle->Listar();
	}

	public function Verificar($id, $clave){

	}




}
