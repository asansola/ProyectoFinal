<?php

class TipoPlatoBLL extends LogicaNegocioMantenimientoBase{

	/**
	 * Variable tipo TipoPlatosBLL
	 * @var TipoPlatosBLL
	 */
	private $oTipoPlato = null;

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
		
		$this->oTipoPlato = new TipoPlatoAccesoDatos();
	}

	public function getHayError(){
		return $this->oTipoPlato->getHayError();
	}

	public function setHayError($pHayError) {
		$this->oTipoPlato->setHayError($pHayError);
	}

	public function getDescripcionError(){
		return $this->oTipoPlato->getDescripcionError();
	}

	public function setDescripcionError($pDescripcionError) {
		$this->oTipoPlato->setDescripcionError($pDescripcionError);
	}

	public function Agregar($oTipoPlato){
		return $this->oTipoPlato->Agregar($oTipoPlato);
	}

	public function Modificar($oTipoPlato){
		return $this->$oTipoPlato->Modificar($oTipoPlato);
	}

	public function Eliminar($oTipoPlato){
		return $this->oTipoPlato->Eliminar($oTipoPlato);
	}

	public function Consultar($oTipoPlato){
		return $this->oTipoPlato->Consultar($oTipoPlato);
	}


	public function ConsultarUno($id, $clave){
		return $this->oTipoPlato->Consultar($id, $clave);
	}
	public function Listar(){
		return $this->oTipoPlato->Listar();
	}

	/* function Crear_Menu(array $arrayItem, $id_parent = 0, $level = 0) {
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
	} */

}