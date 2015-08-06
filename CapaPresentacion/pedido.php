<?php
include ("IncluirClases.php");
$title = "Pedido";
$carrito = new Carrito ();
$pedidoFacturaBLL= new PedidoFacturaBLL();
$pedidoFacturaEntidad= new PedidoFactura();
$lineaDetallePedidoFacturaBLL= new PedidoFacturaDetalleBLL();

if (isset ( $_GET ['id'] ) && isset ( $_GET ['action'] )) {
	$accion = $_GET ['action'];
	
	switch ($accion) {
		case 'add' :
			
			$platoBLL = new PlatoBLL ();
			$id = $_GET ['id'];
			$vPlato = $platoBLL->ConsultarRegistro ( $id );
			$idProducto = $vPlato [0] [0];
			$nombre = $vPlato [0] [1];
			$precio = $vPlato [0] [2];
			$foto = $vPlato [0] [3];
			$cantidad = $_GET ['cantidad'];
			$productoAlCarro = array (
					"id" => $idProducto,
					"nombre" => $nombre,
					"precio" => $precio,
					"foto" => $foto,
					"cantidad" => $cantidad 
			);
			
			$carrito->add ( $productoAlCarro );
			header ( 'Location: pedido.php' );
			
			break;
		
		case 'delete' :
			$unique_id = $_GET ['id'];
			$carrito->remove_producto ( $unique_id );
			//header ( 'Location: pedido.php' );
			
			break;
		
		case 'update' :
			$unique_id = $_GET ['id'];
			$cantidad= $_GET['cantidad'];
			$carrito->update_cantidad($unique_id, $cantidad);
			//header ( 'Location: pedido.php' );
			
			break;
			
		case 'ordenar': 
			$id_plato = $_GET ['id'];
			$cantidad= $_GET['cantidad'];
			$subtotal= $_GET['subtotal'];
			$precio= $_GET['precio'];
			
				if (! isset ( $_SESSION ['pedido'])){
					
					$pedido= $pedidoFacturaBLL->Agregar($pedidoFacturaEntidad);		
					$_SESSION ['pedido']= $pedido;
					
					$lineaDetalleEntidad= new PedidoFacturaDetalle();
					$lineaDetalleEntidad->__set(id_pedido, $pedido[0][0]);
					$lineaDetalleEntidad->__set(id_plato, $id_plato);
					$lineaDetalleEntidad->__set(cantidad, $cantidad);
					$lineaDetalleEntidad->__set(precio, $precio);
					$lineaDetalleEntidad->__set(total_linea, $subtotal);
					$lineaDetalleEntidad->__set(id_estado_detalle, 2);
					
					$lineaDetallePedidoFacturaBLL->Agregar($lineaDetalleEntidad);
				}else{
					
					$pedido= $_SESSION ['pedido'];
					
					$lineaDetalleEntidad= new PedidoFacturaDetalle();
					$lineaDetalleEntidad->__set(id_pedido, $pedido[0][0]);
					$lineaDetalleEntidad->__set(id_plato, $id_plato);
					$lineaDetalleEntidad->__set(cantidad, $cantidad);
					$lineaDetalleEntidad->__set(precio, $precio);
					$lineaDetalleEntidad->__set(total_linea, $subtotal);
					$lineaDetalleEntidad->__set(id_estado_detalle, 2);
					$lineaDetallePedidoFacturaBLL->Agregar($lineaDetalleEntidad);
				}
				
				if ($lineaDetallePedidoFacturaBLL->getHayError ()) {
						
					echo "ERROR";
					//$_SESSION ['registrado'] = $lineaDetallePedidoFacturaBLL->getDescripcionError ();
						
				} else {
						
					echo "ORDENADO";
					//$_SESSION ['registrado'] = 'true';
						
				}
				
			break;
		
		default :
			;
			break;
	}
}


$content="<div id='cuerpo'>";
if ($carrito->get_content () === null) {
	$content.="
<div class='row'>" . "<div class='col-lg-12'>" . "<h2>Pedido</h2>" . "</div>" . "</div>
<div class='row text-center'><h4>Su cesta se encuentra vacía.</h4></div
		<div id='load'>
	
	</div>";
}

else {
	
	if (isset($_SESSION['pedido'])) {
		$pedido= $_SESSION['pedido'];
		$numeroPedido= $pedido[0][0] ;
		$mesa= $pedido[0][1] ;
		$salonero= $pedido[0][2] ;
		$fecha= $pedido[0][3] ;
		$estado= $pedido[0][4];
		$total = $_SESSION ['carrito'] ["precio_total"];
		$content.="
		<br><br><br>		
		<div class='row'>
			<div class='panel panel-default'>
			  <div class='panel-heading'>
			    <h3 class='panel-title'>Pedido no. $numeroPedido</h3>
			  </div>
				  <div class='panel-body '>
				  <h4> <span class='label label-success'>Salonero: $salonero</span> <span class='label label-success'>Mesa: $mesa</span> <span class='label label-success pull-right'>Fecha: $fecha</span></h4>
				  <h4> </h4>
				   <h4><span class='label label-success'>Estado del pedido: $estado</span></h4>  <h3><span class='label label-warning pull-right'>Total a pagar:¢ $total</span></h3>
				    <br><br>
					<button type='button' class='btn btn-primary btn-block'>Cancelar Factura</button>
				  </div>
			</div>
		</div>
				
		<div class='row text-center'><h4></h4></div>
		<div id='load'>
	
		</div>";
		}
		$content.=" <br><br>
<div class='row'>" . "<div class='col-lg-12'>" . "<h4>Detalle </h4>" . "</div>" . "</div><br/>
<div class='row text-center'>

		
<link rel='stylesheet' type='text/css' href='css/custom_styles.css'>
<div class='container'>		
<table id='cart' class='table table-hover table-condensed'>
<thead>
<tr>
<th style='width:35%' >Plato</th>
<th style='width:10%' class='text-center'>Precio</th>
<th style='width:8%' class='text-center'>Cantidad</th>
<th style='width:22%' class='text-center'>Subtotal</th>
<th style='width:15%' ></th>
</tr>
</thead>	
<tbody>";
	$rows = $carrito->get_content ();
	
	
	foreach ( $rows as $producto ) {
		/* if (isset($_SESSION['pedido'])) {
			$pedido= $_SESSION['pedido'];
			$numeroPedido= $pedido[0][0] ;
			$lineasDetalle= $lineaDetallePedidoFacturaBLL->ConsultarRegistro($numeroPedido);
			foreach ( $rows as $producto ) {
				foreach ($lineasDetalle as $lineaPedido) {
					if ($lineaPedido[1]===$producto['id'] && $lineaPedido[2]=== 2) {
						
							
					}
					else{
						
					}
				}
			}
		} */
		$content .= " <tr>
	<td data-th='Producto'>
	<div class='row'>
	<div class='col-sm-2 hidden-xs' ><img src='img/$producto[foto]' alt='' class='img-responsive'/></div>
	<div class='col-sm-10'>
	<h4 class='nomargin'>$producto[nombre]</h4>
	<p>$producto[nombre]</p>
	</div>
	</div>
	</td>
	
	<td data-th='Precio' class='text-center'>¢$producto[precio]</td>
	<td data-th='Cantidad' class='nr'>
	<input type='number' id='cantidad_carrito' name=$producto[unique_id]  class='form-control text-center cantidad_carrito' value='$producto[cantidad]' min='1'>
	</td>
	<td data-th='Subtotal' class='text-center'>¢$producto[total]</td>
	<td class='actions' data-th='Acciones' >
	 	
	<button id='order'  value='id=$producto[id]&action=ordenar&subtotal=$producto[total]&precio=$producto[precio]' class='order_product btn btn-success btn-sm'>Ordenar</button>
	<button   value='id=$producto[unique_id]&action=update' class='cantidad_refresh btn btn-primary btn-sm'><i class='glyphicon glyphicon-refresh'></i></button>
	<button   value='id=$producto[unique_id]&action=delete' class='delete_product btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i></button>
	
	</td>
	</tr> ";
			
	
	}
	$content .= "</tbody>";
	$total = $_SESSION ['carrito'] ["precio_total"];
	$content .= " <tfoot>
<tr>
<td colspan='3' class='hidden-xs'></td>
<td class='hidden-xs text-center'><strong>Total ¢$total </strong></td>
<td></td>
</tr>
</tfoot>
</table>

<a href='index.php' class='btn btn-warning navbar-left'> Continuar ordenando</a>

<br/><br/><br/><br/><br/><br/>
</div></div>";
	}

include ("master.php");
?>

