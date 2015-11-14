<?php

class calendariosController extends AppController
{
	 /**
	  * Clase calendarios
	 * Archivo de clase de acciones CRUD en PDO
	 *
	 * Clase que permite acciones CRUD de la seccion calendarios
	 * @author Rodibel Morales
	 */
	public function __construct(){
		parent::__construct();
	}
/**
 * Se genera los datos de la vista calendarios
 */
	public function index(){		
		$this->_view->titulo = "Pagina principal";
		$this->_view->calendarios = $this->find("calendarios", "all", null);
		$this->_view->renderizar("index");
	}

	 /**
	 * Metodo de crear nueva calendarios parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			if ($this->save("calendarios", $_POST)) {
				$this->redirect(array("controller" =>"calendarios"));
			}else{
				$this->redirect(array("controller" => "calendarios", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar calendario";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la calendarios parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {
			if ($this->update("calendarios", $_POST)) {
					$this->redirect(array("controller" => "calendarios", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "calendarios", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar calendarios";
			$this->_view->categoria = $this->find("calendarios", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}


	/**
	 * Metodo de eliminar la calendarios parte del controlador 
	 */
	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->delete("calendarios", $conditions)) {
			$this->redirect(array("controller" => "calendarios", "action" => "index"));
		}
	}
}
