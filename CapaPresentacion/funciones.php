<?php 

 function guardarImagen($archivoImagen){
		// Subir fichero
		$copiarFichero = false;
		$_FILES= $archivoImagen;
		
		// Copiar fichero en directorio de ficheros subidos
		// Se renombra para evitar que sobreescriba un fichero existente
		// Para garantizar la unicidad del nombre se añade una marca de tiempo
		if (is_uploaded_file ($_FILES['foto']['tmp_name']))
		{
			$nombreDirectorio = "../img/";
			$nombreFichero = $_FILES['foto']['name'];
			$copiarFichero = true;
			$base_url='http://localhost/ProyectoFinal/CapaPresentacion/';
			$errores ='';
		
			// Si ya existe un fichero con el mismo nombre, renombrarlo
			$nombreCompleto = $nombreDirectorio . $nombreFichero;
			if (is_file($nombreCompleto))
			{
				$idUnico = time();
				$nombreFichero = $idUnico . "-" . $nombreFichero;
			}
		}
		// El fichero introducido supera el límite de tamaño permitido
		else if ($_FILES['foto']['error'] == UPLOAD_ERR_FORM_SIZE)
		{
			$maxsize = $_REQUEST['MAX_FILE_SIZE'];
			$errores = $errores . "   El tamaño del fichero supera el límite permitido ($maxsize bytes)\n";
		}
		// No se ha introducido ning�n fichero
		else 
			if ($_FILES['foto']['name'] == "")
				$nombreFichero = '';
			// El fichero introducido no se ha podido subir
			else
				$errores = $errores . " No se ha podido subir el fichero\n";
			
		// Mostrar errores encontrados
		if ($errores != "")
		{
			print ("<p>Errores:</p>\n");
			print ($errores);
			print ("<p>[ <a href='#'>Insertar otra imagen</a> ]</p>\n");
		}
		else
		{
		
			// Aqu� vendr�a la inserci�n de la noticia en la Base de Datos
		
			// Mover fichero de imagen a su ubicaci�n definitiva
			if ($copiarFichero)
				move_uploaded_file ($_FILES['foto']['tmp_name'],
						 $nombreDirectorio . $nombreFichero);
		
			// Mostrar datos introducidos
			
		}
		
		return $nombreFichero;
	}
	
	
	
	
?>