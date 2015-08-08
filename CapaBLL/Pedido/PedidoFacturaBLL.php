<?php

class PedidoFacturaBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo PedidoFacturaBLL
	 * @var PedidoFacturaBLL
	 */
	private $oPedidoFactura = null;

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

		$this->oPedidoFactura = new PedidoFacturaAccesoDatos();
	}

	public function getHayError(){
		return $this->oPedidoFactura->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oPedidoFactura->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oPedidoFactura->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oPedidoFactura->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oPedidoFactura){
		return $this->oPedidoFactura->Agregar($oPedidoFactura);
	}

	public function Modificar($oPedidoFactura){
		return $this->oPedidoFactura->Modificar($oPedidoFactura);
	}

	public function Eliminar($oPedidoFactura){
		return $this->oPedidoFactura->Eliminar($oPedidoFactura);
	}

	public function Consultar($oPedidoFactura){
		return $this->oPedidoFactura->Consultar($oPedidoFactura);
	}

	public function ConsultarRegistro($idPedido){
		return $this->oPedidoFactura->ConsultarRegistro($idPedido);
	}

	public function Listar(){
		return $this->oPedidoFactura->Listar();
	}

	public function Verificar($id, $clave){

	}

	public function ultimoValorTabla($nombreTabla){
		return  $this->oPedidoFactura->ultimoValorTabla($nombreTabla);
	}

	public function TotalPedido($id_pedido){
		return  $this->oPedidoFactura->TotalPedido($id_pedido);
	}

	public function ArrayCargosFactura($subtotal){

		$vSubtotal=$subtotal;
		$vImpuestoVentas= $subtotal*0.13;//definir constantes
		$vCargoSalonero= $subtotal*0.10;
		$vTotalPagar= $vSubtotal+$vImpuestoVentas+$vCargoSalonero;
		$montos= array("Subtotal"=>$vSubtotal, "CargoSalonero"=>$vCargoSalonero, "ImpuestoVentas"=>$vImpuestoVentas,"TotalPagar"=>$vTotalPagar);
		return  $montos;
	}



}
