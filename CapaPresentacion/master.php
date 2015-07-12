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

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container ">

			<!-- Brand and toggle get grouped for better mobile display -->   <!-- Agrega el objetivo para agreagr el menu en dispositivos mobiles -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"   
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand "  href="index.php" >Inicio</a>
			</div>
			
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav ">
			<!-- Menu principal -->
			<!-- /.navbar-collapse -->
				<li class="dropdown"><a href="#" class="dropdown-toggle" 
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false">Menu <span class="caret"></span></a>
					<ul class="dropdown-menu ">
						<li ><a href="entradas.php" >Entradas</a></li>
						<li><a href="platos_fuertes.php" >Platos Fuertes</a></li>
						<li><a href="bebidas.php" >Bebidas</a></li>
						<li><a href="postres.php">Postres</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="especiales.php" >Platos Especiales</a></li>
					</ul></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" 
					data-toggle="dropdown" role="button" aria-haspopup="true"
					aria-expanded="false">Pedido<span class="caret"></span></a>
					<ul class="dropdown-menu ">
						<li ><a href="pedido.php" >Ordenar</a></li>
						<?php if(isset($_SESSION['rol'])){?>  <!-- Si es admin o salonero que muestre los links -->
						<li role="separator" class="divider"></li>
						<li ><a href="" >Modificar Pedido</a></li>
						<li ><a href="" >Eliminar Pedido</a></li><?php }?>
					</ul></li>
				<?php 
				if(isset($_SESSION['rol'])){
				$rol=$_SESSION['rol'];
				
					if($rol==1){?>   <!-- Si es administrador muestre los links -->
					<li class="dropdown"><a href="#" class="dropdown-toggle" 
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Mantenimientos <span class="caret"></span></a>
						<ul class="dropdown-menu ">
							<li ><a href="" >Usuarios</a></li>
							<li ><a href="" >Provedores</a></li>
							<li ><a href="" >Platos</a></li>
							<li ><a href="" >Inventario Insumos</a></li>
							<li ><a href="" >Mesas</a></li>
						</ul></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" 
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Reportes<span class="caret"></span></a>
						<ul class="dropdown-menu ">
							<li ><a href="" >Facturas</a></li>
							<li ><a href="" >Comisiones Saloneros</a></li>
						</ul></li>
					<?php }
					}?>
				<li><a href="ayuda.php" >Ayuda</a></li>
				
				
			</ul>
	
			<!--Login-->
			<!--  navbar-right --> 
			<?php include ('Login.php');?>


		</div>  <!-- /.navbar-collapse -->
		<!-- /.container -->
	</nav>

	<ul class="breadcrumb">
		<li class="active"><a href="#">Home</a> <span class="divider">/</span></li>
		
	</ul>

	<div class="container ">

		<!-- Jumbotron Header -->
		<header class="jumbotron hero-spacer">
			<h1>Banner o galeria</h1>

		</header>

		<div><?php	echo($content);?></div>



		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Derechos Reservados &copy; <?php echo date("Y")?></p>
				</div>
			</div>
		</footer>

	</div>
	<!-- /.container -->

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>


</body>