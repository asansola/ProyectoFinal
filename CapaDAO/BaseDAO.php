<?php
	/**
	 * Definici�n de Clase Abstracta BaseDAO que implementa
	 * el comportamiento general para todas las clases concretas
	 * que acceden a fuentes de datos DBMS relacionales
	 */
	abstract class BaseDAO {
		private $hayError;
		private $numeroError;
		private $descripcionError;
		
		/**
		 * Leer si ocurri� un error en la �ltima transacci�n
		 */
		public function getHayError(){
			return $this->hayError;
		}
		
		/**
		 * Actualiar el estado del indicador si ocurri� un error en la �ltima transacci�n
		 * @param Boolean $pHayError True/False si ocurri� un error
		 */
		public function setHayError($pHayError){
			$this->hayError = $pHayError;
		}
		
		/**
		 * Leer el c�digo de error de la �ltima transacci�n ejecutada
		 */
		public function getNumeroError(){
			return $this->numeroError;
		}
		
		/**
		 * Actualizar el n�mero de error de la �ltima transacci�n ejecutada
		 * @param Int $pNumeroError C�digo del Error
		 */
		public function setNumeroError($pNumeroError){
			$this->numeroError = $pNumeroError;
		}
		
		/**
		 * Leer la descripci�n del error de la �ltima transacci�n ejecutada
		 */
		public function getDescripcionError(){
			return $this->descripcionError;
		}
		
		/**
		 * Actualizar la descripci�n de la �ltima transacci�n ejecutada
		 * @param Strin $pDescripcionError Descripci�n del error
		 */
		public function setDescripcionError($pDescripcionError){
			$this->descripcionError = $pDescripcionError;					
		}
		
		// ------------------------------------
		// Definici�n de los m�todos Abstractos
		// ------------------------------------
		
		/**
		 * M�todo abstracto para Abrir la Conexi�n con el DBMS particular
		 * @param String $pServidorBD Servidor de Base de Datos
		 * @param String $pUsuario C�digo de Usuario
		 * @param String $pClave Clave de Usuario
		 */
		abstract protected function AbrirConexion();
		
		/**
		 * Obtener la fecha y hora del servidor de base de datos
		 */
		abstract protected function ObtenerFechaHoraServidorDB();
		
		/**
		 * Ejecutar Sentencias SQL tipo Select o invocaci�n de 
		 * Procedimientos Almacenados (Store Procedures) hacia la fuente de datos
		 * @param String $pSQL Select/Store Procedure a ejecutar
		 */
		abstract protected function EjecutarSQL($pSQL);
		
		/**
		 * Ejecutar Sentencias SQL tipo Data Manipulation Lenguaje - DML
		 * (Insert, Update, Delete) hacia la base de datos
		 * @param String $pSQL Sentencia SQL a ejcutar hacia la base de datos
		 * @return Int Cantidad de Registros Afectado en la ejecuci�n de la sentencia, si ocurrio un error o no afecto registros
		 */
		abstract protected function EjecutarSQL_DML($pSQL); 
	}	
?>