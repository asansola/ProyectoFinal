<?php include 'funciones.php';?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">


<title><?php echo $title; ?></title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/heroic-features.css" rel="stylesheet">

<link href="css/custom_styles.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<div class="body">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container ">

				<!-- Brand and toggle get grouped for better mobile display -->
				<!-- Agrega el objetivo para agregar el menu en dispositivos moviles -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
						aria-expanded="false">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">La Central<i
						class="glyphicon glyphicon-cutlery"></i></a>

				</div>



				<!-- Menu principal -->
				<!-- /.navbar-collapse -->
				<div class="collapse navbar-collapse"
					id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li <?=echoActiveClassIfRequestMatches("index")?>><a
							href="index.php">Inicio <i class="glyphicon glyphicon-home"></i></a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Menu <i class="glyphicon glyphicon-cutlery"></i>
						</a>
							<ul class="dropdown-menu ">
								<li <?=echoActiveClassIfRequestMatches("entradas")?>><a
									href="entradas.php">Entradas</a></li>
								<li <?=echoActiveClassIfRequestMatches("platos_fuertes")?>><a
									href="platos_fuertes.php">Platos Fuertes</a></li>
								<li <?=echoActiveClassIfRequestMatches("bebidas")?>><a
									href="bebidas.php">Bebidas</a></li>
								<li <?=echoActiveClassIfRequestMatches("postres")?>><a
									href="postres.php">Postres</a></li>
								<li role="separator" class="divider"></li>
								<li <?=echoActiveClassIfRequestMatches("platos_especiales")?>><a
									href="platos_especiales.php">Platos Especiales</a></li>
							</ul></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Pedido <i
								class="glyphicon glyphicon-shopping-cart"></i> <span
								class="badge"><?php

								if (isset ( $_SESSION ['carrito'] )) {
									$cantidad = $_SESSION ['carrito'] ["articulos_total"];
								}
								if (empty ( $cantidad )) {
									$cantidad = 0;
								}
								echo $cantidad;
								?></span></a>
							<ul class="dropdown-menu ">
								<li <?=echoActiveClassIfRequestMatches("pedido")?>><a
									href="pedido.php">Orden</a></li>
						<?php if(isset($_SESSION['rol'])){?>  <!-- Si es admin o salonero que muestre los links -->
								<li role="separator" class="divider"></li>
								<li><a href="">Modificar Pedido</a></li>
								<li><a href="">Eliminar Pedido</a></li><?php }?>
					</ul></li>
				<?php
				if (isset ( $_SESSION ['rol'] )) {
					$rol = $_SESSION ['rol'];

					if ($rol == 1) {
						?>   <!-- Si es administrador muestre los links -->
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Mantenimientos <i
								class="glyphicon glyphicon-wrench"></i>
						</a>
							<ul class="dropdown-menu ">
								<li
									<?=echoActiveClassIfRequestMatches("Mantenimiento_Usuarios")?>><a
									href="Mantenimiento_Usuarios.php">Usuarios</a></li>
								<li
									<?=echoActiveClassIfRequestMatches("Mantenimiento_Proveedores")?>><a
									href="Mantenimiento_Proveedores.php">Provedores</a></li>
								<li
									<?=echoActiveClassIfRequestMatches("Mantenimiento_Inventario")?>><a
									href="Mantenimiento_Inventario.php">Inventario Insumos</a></li>
								<li <?=echoActiveClassIfRequestMatches("Mantenimiento_Platos")?>><a
									href="Mantenimiento_Platos.php">Platos</a></li>
								<li <?=echoActiveClassIfRequestMatches("Mantenimiento_Mesas")?>><a
									href="Mantenimiento_Mesas.php">Mesas</a></li>
							</ul></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Reportes <i
								class="glyphicon glyphicon-list-alt"></i></a>
							<ul class="dropdown-menu ">
								<li <?=echoActiveClassIfRequestMatches("Facturas")?>><a href="">Facturas</a></li>
								<li <?=echoActiveClassIfRequestMatches("Comisiones_Saloneros")?>><a
									href="">Comisiones Saloneros</a></li>
							</ul></li>
					<?php
					}
				}
				?>
				<li <?=echoActiveClassIfRequestMatches("ayuda")?>><a
							href="ayuda.php">Ayuda <i class="glyphicon glyphicon-wrench"></i></a></li>


					</ul>

					<!--Login-->
					<!--  navbar-right -->
			<?php include ('Login.php');?>


		</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>
		<div class="container">
			<div class="row">
				<div class="btn-group">
					<div class="container">
					<?php include 'breadcrumps.php';?>

						<?=breadcrumbs('','');?>

						<?php

						if (isset ( $_SESSION ['carrito'] )) {
							$cantidad = $_SESSION ['carrito'] ["articulos_total"];
						}
						if (! empty ( $cantidad )) {
							?>

								<a class="btn btn-default  pull-right" href="pedido.php"> Ver su
							orden <i class="glyphicon glyphicon-shopping-cart"></i> <span
							class="badge"> <?php echo $cantidad;?></span>
						</a>

							<?php }?>
							</div>
				</div>
			</div>
		</div>



		<div class="container">
			<div id="result"></div>
	<?php	echo($content);?>
	</div>
		<br> <br> <br>


		<div class="nav navbar-inverse navbar-fixed-bottom" role="navigation">
			<div class="container">
				<div class="navbar-text pull-right">
					<span id="top-link-block" class="hidden"> <a href="#top"
						class="well well-sm"
						onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
							<i class="glyphicon glyphicon-chevron-up"></i> Volver arriba
					</a>
					</span>
					<!-- /top-link-block -->
					<p>
					© <?php echo date('Y')?> - Todos los derechos reservados.
				</p>
				</div>
			</div>
		</div>




		<!-- /.container -->



		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Custom Core JavaScript -->
		<script src="js/custom.js"></script>
	</div>
</body>

</html>
