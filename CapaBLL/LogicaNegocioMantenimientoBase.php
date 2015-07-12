<?php

	abstract class LogicaNegocioMantenimientoBase{
		
		/**
		 * Constructor de la clase
		 */
		public function __construct(){

		}

		// Defefinci�n de m�todos abstratos que deben implementarse
		// en las clases concretas
				
		/**
		 * Indicador si en la �ltima transacci�n ocurrio un error
		 * True  --> Si hay errores
		 * False --> No hay errores
		 */
		abstract protected function getHayError();
		
		/**
		 * Actualizar el estado del error de la �ltima transacci�n
		 * @param Boolean $pHayError True/False
		 */
		abstract protected function setHayError($pHayError);
		
		/**
		 * Leer la descripci�n del error de la �ltima transacci�n ejecutada
		 */
		abstract protected function getDescripcionError();
		
		/**
		 * Actualizar la descripcion del error de la �ltima transacci�n ejecutada
		 * @param String $pDescripcionError Mensaje de error
		 */
		abstract protected function setDescripcionError($pDescripcionError);
				
		/**
		 * Insertar un nuevo registro
		 * @param EntidadBase $oEntidadBase
		 */
		abstract protected function Agregar($oEntidadBase);
		
		/**
		 * Modificar un registro
		 * @param EntidadBase $oEntidadBase
		 */
		abstract protected function Modificar($oEntidadBase);
		
		/**
		 * Eliminar un registro
		 * @param EntidadBase $oEntidadBase
		 */
		abstract protected function Eliminar($oEntidadBase);
		
		/**
		 * Consultar un registro
		 * @param EntidadBase $oEntidadBase
		 */
		abstract protected function Consultar($oEntidadBase);
		

		/**
		 * Verificar si existe registro
		 * @param Integer $id
		 * @param String $clave
		 */
		abstract protected function Verificar($id,$clave);

		
		/**
		 * Listar todos los datos de la entidad
		 */
		abstract protected function Listar();
	}
?>