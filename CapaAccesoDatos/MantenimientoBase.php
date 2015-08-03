<?php
		
	/**
	 * Clase Abstracta que especifica las funcionalidades 
	 * basicas para todos los mantenimientos del Sistema
	 *
	 */
	abstract class MantenimientoBase{
		// Atributos privados
		private $hayError = False;
		private $descripcionError = "";
		
		/**
		 * Constructor de la clase
		 */
		public function __construct(){
			$this->hayError = False;
			$this->descripcionError = "";
		}
		/**
		 * Indicador si en la �ltima transacci�n ocurrio un error
		 * True  --> Si hay errores
		 * False --> No hay errores  
		 */
		public function getHayError(){
			return $this->hayError;
		}
		
		/**
		 * Actualizar el estado del error de la �ltima transacci�n
		 * @param Boolean $pHayError True/False 
		 */		
		public function setHayError($pHayError) {
			$this->hayError = $pHayError;			
		}

		/**
		 * Leer la descripci�n del error de la �ltima transacci�n ejecutada
		 */
		public function getDescripcionError(){
			return $this->descripcionError;
		}
		
		/**
		 * Actualizar la descripcion del error de la �ltima transacci�n ejecutada
		 * @param String $pDescripcionError Mensaje de error
		 */
		public function setDescripcionError($pDescripcionError) {
			$this->descripcionError = $pDescripcionError;
		}
		
		// Defefinci�n de m�todos abstratos que deben implementarse
		// en las clases concretas
		
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
		abstract protected function Verificar($id, $clave);


		/**
		 * Listar todos los datos de la entidad
		 */
		abstract protected function Listar();	

	}
?>