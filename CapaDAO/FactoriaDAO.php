<?php
		
	/**
	 * Clase para la fabricaci�n de conexiones de fuentes de datos
	 */
	class FactoriaDAO {
		private static $tipoBaseDatos;
		private static $oConexionDAO;
		
		/**
		 * Constructor privado de la clase
		 */
		private function __construct(){
			self::$tipoBaseDatos = "";
			self::$oConexionDAO = null;
		}
				
		/**
		 * Leer el tipo de Base de datos a Fabricar
		 */
		public static function getTipoBaseDatos(){
			return self::$tipoBaseDatos;
		}
		
		/**
		 * Definir el tipo de Base de Datos a Fabricar
		 * @param String $pTipoBaseDatos
		 */
		public static function setTipoBaseDatos($pTipoBaseDatos){
			self::$tipoBaseDatos = $pTipoBaseDatos;
		}
						
		/**
		 * Fabricar la conexi�n de la Base de Datos
		 * Con base al tipo de Base de Datos a crear
		 */
		public static function getConexionBaseDatos(){
			
			//Si el tipo es MySql
			if (strtoupper(self::$tipoBaseDatos) == "MYSQL"){
				self::$oConexionDAO = MySqlDAO::getInstance();	
			}
			
			/*
			//Si el tipo es PostGreSql
			if ( strtoupper(self::$tipoBaseDatos) = "POSTGRESQL"){
				self::$oConexionDAO = MySqlDAO::getInstance();
			} */	

			return self::$oConexionDAO;
		}
	}
?>