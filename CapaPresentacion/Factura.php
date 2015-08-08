<?php
include ("IncluirClases.php");
$title = "Factura";
$pedidoFacturaBLL = new PedidoFacturaBLL ();
$pedidoFacturaEntidad = new PedidoFactura ();
$lineaDetallePedidoFacturaBLL = new PedidoFacturaDetalleBLL ();
$lineaDetalleEntidad = new PedidoFacturaDetalle ();
$platoBLL = new PlatoBLL ();

$content = "<div id='cuerpo'>";
if (isset ( $_SESSION ['pedido'] )) {
	$pedido = $_SESSION ['pedido'];
	$numeroPedido = $pedido [0] [0];
	$mesa = $pedido [0] [1];
	$salonero = $pedido [0] [2];
	$fecha = $pedido [0] [3];
	$estado = $pedido [0] [4];
	if (isset($_SESSION ['pedido'] ['total'])) {
		$totalPedido = $_SESSION ['pedido'] ['total'];
		$arrayCargosFactura= $pedidoFacturaBLL->ArrayCargosFactura($totalPedido);
	}else{
		$totalPedido =0;
	}

	$content .= "
	<br><br><br>


	<div class='row'>
	<div class='panel panel-default'>
	<div class='panel-heading'>
	<h3>
		<p class=' navbar-nav pull-right text-right' >
			Orden no.<strong > $numeroPedido </strong><br>
			Fecha <strong> $fecha </strong><br><br><br>
			<strong >Restaurante La Central S.A </strong><br>
			Teléfonos: <strong > 2222-2222/2444-5566</strong>
		</p>

	</h3>

	<h3 class='panel-title'><img  id='imageresource' src='img/invoice-icon.jpg' alt='' class='img-responsive img-circle'/></h3>

	</div>
	<div class='panel-body '>
	<div class=well label-group'>
		<p class='nav navbar-nav pull-left'><strong>Detalle de servicio</strong></p>
		<p class='nav navbar-nav pull-right'><strong>Detalle de la orden</strong></p>
		<br>
		<h4><span class='label label-default pull-right'>Subtotal <i class='glyphicon glyphicon-arrow-right'></i> ¢ $arrayCargosFactura[Subtotal] </span></h4>
		<h4> <span class='label label-default'>Salonero <i class='glyphicon glyphicon-arrow-right'></i> $salonero</span> </h4>

		<h4><span class='label label-default pull-right'>Cargos por servicios <i class='glyphicon glyphicon-arrow-right'></i> ¢ $arrayCargosFactura[CargoSalonero] </span></h4>
		<h4> <span class='label label-default'>Mesa <i class='glyphicon glyphicon-arrow-right'></i> $mesa</span> </h4>

		<h4><span class='label label-default pull-right'>Cargos por impuestos <i class='glyphicon glyphicon-arrow-right'></i> ¢ $arrayCargosFactura[ImpuestoVentas]</span></h4>
		<h4><span class='label label-default'>Estado del pedido <i class='glyphicon glyphicon-arrow-right'></i> $estado</span></h4>
		<h4><span class='label label-default pull-right'>Total a pagar <i class='glyphicon glyphicon-arrow-right'></i> ¢  $arrayCargosFactura[TotalPagar]</span></h4>
		<br>
		</div>

	<div class=well label-group'>


		<div class='row'>" . "<div class='col-lg-12'>" . "<h3><strong>Detalle Factura</strong></h3>" . "</div>" . "</div><br/>
		<div class='row'>


		<link rel='stylesheet' type='text/css' href='css/custom_styles.css'>

		<table id='cart' class='table table-hover table-condensed'>
		<thead>
		<tr>
		<th style='width:40%' >Plato</th>
		<th style='width:20%' class='text-center'>Precio</th>
		<th style='width:10%' class='text-center'>Cantidad</th>
		<th style='width:30%' class='text-center'>Subtotal</th>
		<th style='width:0%' class='text-center'></th>
		</tr>
		</thead>
		<tbody>";
	$lineasDetallePedido = $lineaDetallePedidoFacturaBLL->Consultar ($numeroPedido);
	foreach ( $lineasDetallePedido as $posicion => $lineaFactura ) {
		$content .= " <tr>
		<td data-th='Producto'>
		<div class='row '>
		<div class='col-sm-2 hidden-xs ' ><a href='#' class='pop' ><img  id='imageresource' src='img/$lineaFactura[2]' alt='' class='img-responsive'/></a></div>
		<div class='col-sm-10'>
		<h4 class='nomargin'>$lineaFactura[1]</h4>
		<p>$lineaFactura[1]</p>
		</div>
		</div>
		</td>

		<td data-th='Precio' class='text-center'>¢$lineaFactura[4]</td>
		<td  data-th='Cantidad' class='text-center'>$lineaFactura[3]</td>
		<td data-th='Subtotal' class='text-center'>¢$lineaFactura[5]</td>
		</tr> ";
	}
		$content .= "</tbody>";

		$content .= " <tfoot>
	<tr>
	<td colspan='3' class='hidden-xs'></td>
	<td class='hidden-xs text-center'><strong> <p class='bg-danger'>Total ¢$totalPedido *Sin cargos.</p></strong></td>
	<td></td>
	</tr>
	</tfoot>
	</table> </div>";

	$content .= "




	<div class='modal fade' id='imagemodal' tabindex='-1' role='dialog'
	aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog' data-dismiss='modal'>
			<div class='modal-content'>
				<div class='modal-body'>
					<button type='button' class='close' data-dismiss='modal'>
						<span aria-hidden='true'>&times;</span><span class='sr-only'>Volver</span>
					</button>
					<img src='' class='imagepreview' style='width: 100%;'>
				</div>
				<div class='modal-footer'>
				</div>
			</div>
		</div>
	</div>



	</div>
	<a href='index.php' class='btn btn-warning pull-left'><i class='glyphicon glyphicon-arrow-left'></i> Continuar ordenando</a>
	<a href='index.php' class='btn btn-success  pull-right'>Pagar <i class='glyphicon glyphicon-arrow-right'></i></a>
   </div>

</div>

			";
} else {
	$content .= "
<div class='row'>" . "<div class='col-lg-12'>" . "<h2>Facturación</h2>" . "</div>" . "</div>
<div class='row text-center'><h4>No hay facturas pendientes.</h4></div
		<div id='load'>

	</div>";
}

include ("master.php");
?>

