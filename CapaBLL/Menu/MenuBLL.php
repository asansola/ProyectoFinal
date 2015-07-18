<?php

class MenuBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo MenuBLL
	 * @var MenuBLL
	 */
	private $oMenu = null;

	/**
	 * Indicador si ocurri� un error en la �ltima transacci�n
	 * @var Boolean
	 */
	private $hayError;

	/**
	 * Descripci�n del �ltimo errro ocurrido en la transacci�n
	 * @var String
	 */
	private $descripcionError;

	/**
	 * Constructor de la clase
	 */
	public function __construct(){
		//Asignar Valores por defecto a los atributos de la instancia
		$this->hayError = False;
			
		//Crear la instancia del objeto
		//Menu de Acceso a Datos
		$this->oMenu = new MenuDinamicoAccesoDatos();
	}

	public function getHayError(){
		return $this->oCarrera->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oCarrera->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oCarrera->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oCarrera->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oMenu){
		return $this->oMenu->Agregar($oMenu);
	}

	public function Modificar($oMenu){
		return $this->oMenu->Modificar($oMenu);
	}

	public function Eliminar($oMenu){
		return $this->oMenu->Eliminar($oMenu);
	}

	public function Consultar($oMenu){
		return $this->oMenu->Consultar($oMenu);
	}

	public function Listar(){
		return $this->oMenu->Listar();
	}
	
	function Crear_Menu(array $arrayItem, $id_parent = 0, $level = 0) {
		if ($id_parent == 0) {
			echo '<ul class="nav navbar-nav">';
		} else {
			echo '<ul class="dropdown-menu">';
		}
		foreach ( $arrayItem [$id_parent] as $id_item => $item ) {
			if ($id_parent == 0) {
				echo  '<li class="dropdown-submenu"><a class="dropdown-toggle" data-toggle="dropdown" role="button">', $item ['texto'];
			} else {
				if ($item ['link'] == '#') {
					echo  '<li  class="dropdown-submenu"><a class="dropdown-toggle"
				data-toggle="dropdown" role="button">', $item ['texto'], '</a>';
				} else {
					echo '<li><a href="', $item ['link'], '">', $item ['texto'], '</a>';
				}
			}
			if (isset ( $arrayItem [$id_item] )) { // Llamada recursiva
				$this->Crear_Menu($arrayItem, $id_item, $level + 2 );
			}
			echo  '</li>'; // Cerramos el item de la lista
		}
		echo  '</ul>'; // Cerramos la lista
	}
		
}