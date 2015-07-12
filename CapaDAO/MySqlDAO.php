<?php
	
	/**
	 * Clase para conexi�n a una DBMS MySql, extiende de la clase BaseDAO
	 * Implementa Patr�n del Singlenton
	 * 
	 */

	class MySqlDAO extends BaseDAO {
		private $conexion;
		private $resultado;
		private $resultadoDescriptor;
		private $sql;
		private $usuario;
		private $clave;
		private $servidorBD;
		private $BD;
		private static $instance;

		/**
		 * Constructor Privado de la clase		
		 */		
		private function __construct(){
			//Limpiar los atributos de la clase base
			parent::setHayError(False);
			parent::setDescripcionError("");
			parent::setNumeroError(0);
						
			//Limpiar los par�metros a las variables de instancia
			$this->usuario = "";
			$this->clave = "";
			$this->servidorBD = "";
			$this->BD = "";
		}
		
		/**
		 * Leer la instancia de la clase
		 * Retorna la conexi�n con la base datos
		 * Implementa el patr�n del Singlenton
		 */
		public static function getInstance(){
			
			//Si la instancia es NULL crea la instancia de MySqlDAO
			if (is_null(self::$instance)){
				self::$instance = new MySqlDAO();
			}
			
			//Retornar la instancia
			return self::$instance;
		}
		
		/**
		 * Establece la conexi�n con la Base datos
		 * @param String $pServidorBD Servidor de Base de Datos MySql
		 * @param String $pUsuario C�digo de Usuario
		 * @param String $pClave Clave del Usuario
		 */
		public function AbrirConexion(){
			try{
				$pServidorBD='localhost';
				$pUsuario='root';
				$pClave='root';
				$pNombreBaseDatos='restaurantePHP';
				//Asignar los par�metros a las variables de instancia
				$this->usuario = $pUsuario;
				$this->clave = $pClave;
				$this->servidorBD = $pServidorBD;
				$this->BD=$pNombreBaseDatos;
		
				//Establecer la conexi�n con la Base de Datos
				$this->conexion=mysqli_connect($pServidorBD, $pUsuario, $pClave, $pNombreBaseDatos);
		
			} catch (Exception $vError){
				//Actualizar el estado del error
				$this->ActualizarEstadoError($vError);
			}
		}

		
		/**
		 * Obtener la fecha y hora del servidor de base de datos
		 */
		public function ObtenerFechaHoraServidorDB(){
			try{
				$consulta="SELECT SYSDATE";
				return $this->conexion->query($consulta);
			}catch (Exception $vError) {
				//Actualizar el estado del error
				$this->ActualizarEstadoError($vError);
				return null;
			}	
		}
		/**
		 * Ejecutar Sentencias SQL tipo Select o invocaci�n de
		 * Procedimientos Almacenados (Store Procedures) hacia la fuente de datos
		 * @param String $pSQL Select/Store Procedure a ejecutar
		 * @return resource|NULL
		 */
		public function EjecutarSQLObjetos($pSQL) {
			try{
				$fila='';
				$this->resultado = $this->conexion->query($pSQL);
				if($this->resultado!=FALSE){
					$num_resultados=$this->resultado->num_rows;
					if($num_resultados){
						for( $i=0; $i<$num_resultados; $i++ )
						{
							$fila[$i] = mysqli_fetch_object ($this->resultado);
						}
					}
					$this->resultado->free();
				}
				$this->conexion->close();
				return $fila;
	
			}catch (Exception $vError) {
				//Actualizar el estado del error
				$this->ActualizarEstadoError($vError);
				return null;
			}
		}
		
		
		/**
		 * Ejecutar Sentencias SQL tipo Select o invocaci�n de
		 * Procedimientos Almacenados (Store Procedures) hacia la fuente de datos
		 * @param String $pSQL Select/Store Procedure a ejecutar
		 * @return resource|NULL
		 */
		public function EjecutarSQLIndices($pSQL) {
			try{
				$fila='';
				$this->resultado = $this->conexion->query($pSQL);
				if($this->resultado!=FALSE){
					$num_resultados=$this->resultado->num_rows;
					if($num_resultados){
						for( $i=0; $i<$num_resultados; $i++ )
						{
							$fila[$i] = mysqli_fetch_array ($this->resultado,MYSQL_NUM);
						}
					}
					$this->resultado->free();
				}
				$this->conexion->close();
				return $fila;
		
			}catch (Exception $vError) {
				//Actualizar el estado del error
				$this->ActualizarEstadoError($vError);
				return null;
			}
		}
		
		
		
		
		/**
		 * Ejecutar Sentencias SQL tipo Select o invocaci�n de 
		 * Procedimientos Almacenados (Store Procedures) hacia la fuente de datos
		 * @param String $pSQL Select/Store Procedure a ejecutar
		 * @return resource|NULL
		 */
		public function EjecutarSQLError($pSQL,$insert=0) {
			$queryResult='';
			try{
				$pSQL .= "SELECT @DescripcionError";
				$resultado=$this->conexion->multi_query($pSQL);
				$contador=0;
				do {
				 if ($res = $this->conexion->store_result()) {
				 	
				 	while ($row = mysqli_fetch_row($res)) {
				 		$this->resultado[$contador]=$row;
				 		$contador++;
				 	}
				 	$res->free();
				 }
				} while ($this->conexion->more_results() && $this->conexion->next_result());
				if(is_array($this->resultado)){
					$this->resultadoDescriptor = array_pop($this->resultado);
					$this->resultadoDescriptor=$this->resultadoDescriptor[0];
				}else{
					$this->resultadoDescriptor=$this->resultado[0];
				}
				//Leer la variable de salida del error
			
				if(isset($this->resultadoDescriptor) && $this->resultadoDescriptor!=FALSE){
					
					$this->ActualizarEstadoError($this->resultadoDescriptor);
					
				}
				
				if ($this->resultado!=FALSE) {
					$counter = 0;
						
					$rowsNumber = count($this->resultado);
						
					if ($rowsNumber == 0) return NULL;
					$queryResult=$this->resultado;
						
					
				}
				if($insert!=0){//Devolver el id del Insert
					$queryResult=$this->conexion->insert_id;
				}
				$this->conexion->close();
			
			//Retornar el objeto
			return $queryResult;
				
			}catch (Exception $vError) {
				//Actualizar el estado del error
				$this->ActualizarEstadoError($vError);
				return null;				
			}
		}

		/**
		 * Ejecutar Sentencias SQL tipo Data Manipulation Lenguaje - DML
		 * (Insert, Update, Delete) hacia la base de datos
		 * @param String $pSQL Sentencia SQL a ejcutar hacia la base de datos
		 * @return Int Cantidad de Registros Afectado en la ejecuci�n de la sentencia, si ocurrio un error o no afecto registros
		 */
		public function EjecutarSQL_DML($pSQL) {
			try{
				$fila='';
				$this->resultado = $this->conexion->query($pSQL);
				if($this->resultado!=FALSE){
					$num_resultados=mysqli_num_rows($this->resultado);
					$this->resultado->free();
				}
				$this->conexion->close();
				return $num_resultados;
			
			}catch (Exception $vError) {
				//Actualizar el estado del error
				$this->ActualizarEstadoError($vError);
				return null;
			}
			
		}
		
		/**
		 * Actualizar el estado de �ltimo error ejecutado hacia la base datos
		 * @param Exception $pError Objeto con el Error ocurrido
		 */
		private function ActualizarEstadoError($pError){
			//Actualizar el estado del error
			parent::setHayError(True);
			parent::setDescripcionError($pError);
		}
		
		/**
		 * Destructor de la clase para liberar los recursos
		 */
		public function __destruct(){
			//$this->conexion->close();
			
		}
	}
?>