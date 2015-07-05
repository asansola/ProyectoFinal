<?php

class MenuDinamicoAccesoDatos extends MantenimientoBase{
	
/**
		 * Constructor de la clase
		 */
		public function __construct(){
			//Invocar el constructor del padre
			parent::__construct();
			FactoriaDAO::setTipoBaseDatos("MySQL");
			}
		
		public function Agregar($oCarrera){
		
		}
		
		public function Modificar($oCarrera){
			
		}
		
		public function Eliminar($oCarrera){
				
		}
		
		public function Consultar($oCarrera){
			
				
		}

		public function Listar(){
			//Variables Locales
			$vResultadoCursor = null;
			$queryResult=NULL;
			
			//Inicializar el control de Errores
			parent::setHayError(False);
			
			//Invocar el Procedimiento Almacenado
			//Se manda 0 en par�metro ya que se desea leer todas las tuplas
			$vSql = "CALL sp_Q_Menu (0, @descripcionError);";
			FactoriaDAO::getConexionBaseDatos()->AbrirConexion();
			$vResultadoCursor = FactoriaDAO::getConexionBaseDatos()->EjecutarSQL($vSql);
			$menuItems= array();
				
					
			for ($i = 0; $i < count($vResultadoCursor); $i++) {
				$row= array();
				$row= $vResultadoCursor[$i];
				$menuItems[$row->parent][$row->id_menu_item] = array('link' => $row->link,'texto' => $row->texto);
				//$menuItems['parent']['id_menu_item'] = array('link' => $row[4],'texto' => $row[3]);
			}
					
			
			
			//Retornar el objeto
			return $menuItems;		
		}	
		
		
	
	
}