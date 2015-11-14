<?php

class eventosController extends AppController
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

	public function index(){		
		$this->_view->titulo = "Pagina principal";

		$options = array(
			'fields' => 'eventos.id, eventos.titulo, calendarios.nombre AS calendario, fecha, lugar',
			'join' => 'calendarios',
			'on' => 'calendario_id = calendario_id'
		);

		$this->_view->eventos = $this->find("eventos", "join", $options);
		$this->_view->renderizar("index");
	}

	 /**
	 * Metodo de crear nueva calendarios parte del controlador 
	 */
	public function add(){
		if ($_POST) {
			if ($this->save("eventos", $_POST)) {
				$this->redirect(array("controller" =>"eventos"));
			}else{
				$this->redirect(array("controller" => "eventos", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar eventos";
		}
		$this->_view->renderizar("add");
	}

     /**
	 * Metodo de editar la calendarios parte del controlador 
	 */
	public function edit($id = NULL){
		if ($_POST) {
			if ($this->update("eventos", $_POST)) {
					$this->redirect(array("controller" => "eventos", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "eventos", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar eventos";
			$this->_view->categoria = $this->find("eventos", "first", array("conditions" => "id=".$id));
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
