<?php

	abstract class LogicaNegocioMantenimientoBase{
		
		/**
		 * Constructor de la clase
		 */
		public function __construct(){

		}

		// Defefinción de métodos abstratos que deben implementarse
		// en las clases concretas
				
		/**
		 * Indicador si en la última transacción ocurrio un error
		 * True  --> Si hay errores
		 * False --> No hay errores
		 */
		abstract protected function getHayError();
		
		/**
		 * Actualizar el estado del error de la última transacción
		 * @param Boolean $pHayError True/False
		 */
		abstract protected function setHayError($pHayError);
		
		/**
		 * Leer la descripción del error de la última transacción ejecutada
		 */
		abstract protected function getDescripcionError();
		
		/**
		 * Actualizar la descripcion del error de la última transacción ejecutada
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
		 * Listar todos los datos de la entidad
		 */
		abstract protected function Listar();
	}
?>