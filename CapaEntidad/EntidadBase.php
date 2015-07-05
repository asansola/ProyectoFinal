<?php
/**
 * Clase Entidad EntidadBase
 * Clase Base para todas las Entidades
 *
 */
	class EntidadBase{
		//Atributos de la clase		
		private $cod_Usr_Crea = "";
		private $fec_Creacion = "";
		private $cod_Usr_Modifica = "";
		private $fec_Modificacion = "";
	
		/**
		 * Constructor de la Clase Persona		 
		 * @param String $pCod_Usr_Crea Usuario que crea el registro
		 * @param DateTime $pFec_Creacion Fecha de creaci�n del registro
		 * @param String $pCod_Usr_Modifica Usaurio que modific� el registro
		 * @param DateTime $pFec_Modificacion Fecha de la �ltima modificaci�n del registro
		 */
		public function __construct($pCod_Usr_Crea,
									$pFec_Creacion,
									$pCod_Usr_Modifica,
									$pFec_Modificacion){
			$this->cod_Usr_Crea = $pCod_Usr_Crea;
			$this->fec_Creacion = $pFec_Creacion;
			$this->cod_Usr_Modifica = $pCod_Usr_Modifica;
			$this->fec_Modificacion = $pFec_Modificacion;
		}
		
		// Campos de Auditor�a
	
		/**
		 * Leer el c�digo del usuario que creo el registro
		 */
		public function getCod_Usr_Crea(){
			return $this->cod_Usr_Crea;
		}
	
		/**
		 * Modificar el c�digo del usuario que creo el registro
		 * @param String $pCod_Usr_Crea C�digo del usuario
		 */
		public function setCod_Usr_Crea($pCod_Usr_Crea){
			$this->cod_Usr_Crea = $pCod_Usr_Crea;
		}
	
		/**
		 * Leer fecha en que creo el registro
		 */
		public function getFec_Creacion(){
			return $this->fec_Creacion;
		}
	
		/**
		 * Modificar la fecha en que se creo el registro
		 * @param String $pFec_Creacion Fecha de creaci�n del registro
		 */
		public function setFec_Creacion($pFec_Creacion){
			$this->fec_Creacion = $pFec_Creacion;
		}
			
		/**
		 * Leer el c�digo del usuario que modific� el registro
		 */
		public function getCod_Usr_Modifica(){
			return $this->cod_Usr_Modifica;
		}
	
		/**
		 * Modificar el c�digo del usuario que modific� el registro
		 * @param String $pCod_Usr_Modifica C�digo del usuario
		 */
		public function setCod_Usr_Modifica($pCod_Usr_Modifica){
			$this->cod_Usr_Modifica = $pCod_Usr_Modifica;
		}
	
		/**
		 * Leer fecha en que se modifico el registro
		 */
		public function getFec_Moficacion(){
			return $this->fec_Modificacion;
		}
	
		/**
		 * Modificar la fecha en que se modific� el registro
		 * @param String $pFec_Modificacion Fecha de modificaci�n del registro
		 */
		public function setFec_Modificacion($pFec_Modificacion){
			$this->fec_Modificacion = $pFec_Modificacion;
		}
}
?>