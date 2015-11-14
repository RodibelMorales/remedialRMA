<?php

class tareasController extends AppController
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		//echo "Hola desde el metodo index";
		//$tareas = $this->loadmodel("tarea");
		
		$this->_view->titulo = "Pagina principal";
		//$this->_view->categorias = $this->find("tareas", "all", NULL);
		

		$options = array(
		
			'fields' => 'tareas.id, tareas.nombre, categorias.nombre AS categoria, fecha, prioridad, status',
			
			'join' => 'categorias',
			
			'on' => 'categorias.id = categoria_id'
		
		);

		$this->_view->tareas = $this->find("tareas", "join", $options);
		$this->_view->renderizar("index");
		//$this->_view->renderizar("index");
		/*
		$this->_view->titulo = "Página principal";
		$this->_view->renderizar("index");
		*/
	}

	public function add(){
		$this->_view->categorias = $this->find('categorias', 'all', null);
		if ($_POST) {
			if ($this->save("tareas", $_POST)) {
				$this->redirect(array("controller" =>"tareas"));
			}else{
				$this->redirect(array("controller" => "tareas", "action" => "add"));
			}
		}else{
			$this->_view->titulo = "Agregar tarea";
		}
		$this->_view->renderizar("add");
	}

	public function edit($id = NULL){
		$this->_view->categorias = $this->find('categorias', 'all', null);
		if ($_POST) {
			if ($this->update("tareas", $_POST)) {
					$this->redirect(array("controller" => "tareas", "action" => "index"));
				}else{
					$this->redirect(array("controller" => "tareas", "action" => "edit/".$_POST["id"]));
				}	
		}else{
			$this->_view->titulo = "Editar tarea";
			$this->_view->tarea = $this->find("tareas", "first", array("conditions" => "id=".$id));
			$this->_view->renderizar("edit");
		}
	}

	public function delete($id = NULL){
		$conditions = "id=".$id;
		if ($this->delete('tareas', $conditions)) {
			$this->redirect(array('controller' => 'tareas', 'action' => 'index'));
		}
	}
}
