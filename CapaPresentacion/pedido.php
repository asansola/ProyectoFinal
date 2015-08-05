<?php
include ("IncluirClases.php");
$title = "Pedido";
$carrito = new Carrito ();

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
			;
			break;
		
		case 'delete' :
			$unique_id = $_GET ['id'];
			$carrito->remove_producto ( $unique_id );
			//header ( 'Location: pedido.php' );
			;
			break;
		
		case 'update' :
			$unique_id = $_GET ['id'];
			$cantidad= $_GET['cantidad'];
			$carrito->update_cantidad($unique_id, $cantidad);
			//header ( 'Location: pedido.php' );
			;
			break;
		
		default :
			;
			break;
	}
}

/*
 * if (isset ($_GET['action'])) { if (! isset ( $_SESSION ['pedido'] ['numero'] )) { $pedidoFacturaBLL = new PedidoFacturaBLL (); $idPedidoFactura = $pedidoFacturaBLL->ultimoValorTabla ( 'pedido_factura' ); $_SESSION ['pedido'] ['numero'] = $idPedidoFactura [0] [0]; } }
 */
$content="<div id='cuerpo'>";
if ($carrito->get_content () === null) {
	
	$content .= "<hr>
<div class='row'>" . "<div class='col-lg-12'>" . "<h2>Pedido </h2>" . "</div>" . "</div>
<div class='row text-center'><h4>Su cesta se encuentra vacía.</h4></div
		<div id='load'>
	
	</div>";
} else {
	
	// $numPedido = $_SESSION ['pedido'] ['numero'];
	$content .= "
		<hr>
<div class='row'>" . "<div class='col-lg-12'>" . "<h2>Pedido </h2>" . "</div>" . "</div><br/>
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
	 <input type='hidden' name='id_prod' value='$producto[unique_id]'></input>	
	<button value='$producto[unique_id]&action=ordenar' class='order_product btn btn-success btn-sm'>Ordenar</button>
	<button  value='$producto[unique_id]&action=update' class='cantidad_refresh btn btn-primary btn-sm'><i class='glyphicon glyphicon-refresh'></i></button>
	<button value='$producto[unique_id]&action=delete' class='delete_product btn btn-danger btn-sm'><i class='glyphicon glyphicon-trash'></i></button>
	
	</td>
	</tr> ";
	}
	
	$content .= "</tbody>";
	$total = $_SESSION ['carrito'] ["precio_total"];
	$content .= " <tfoot>
<tr>
<td colspan='3' class='hidden-xs'></td>
<td class='hidden-xs text-center'><strong>Total ¢$total </strong></td>
<td><a href='#' class='btn btn-success btn-block'>Pagar orden <i class='fa fa-angle-right'></i></a></td>
</tr>
</tfoot>
</table>

<a href='index.php' class='btn btn-warning navbar-left'> Continuar ordenando</a>
<br/><br/><br/><br/><br/><br/>
</div></div>";
	
}
include ("master.php");
?>

