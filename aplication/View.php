<?php

class View
{
	/**
	  * Clase Vista
	 * 
	 * @author Rodibel Morales, Saul Meneses
	 */
	
	private $_controlador;
	private $_metodo;
	public $tareas;
	public $calendarios;
	public $eventos;
	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
		$this->_metodo = $peticion->getMetodo();//necitamos ver si necesitamos cambiar el layout
	}

	public function renderizar($vista){
		$_layoutParams = array(
		'ruta_css' => APP_URL . "views/layouts/" . DEFAULT_LAYOUT . "/css/",
		'ruta_img' => APP_URL . "views/layouts/" . DEFAULT_LAYOUT . "/img/",
		'ruta_js' => APP_URL . "views/layouts/" . DEFAULT_LAYOUT . "/js/"
		);


		$rutaView = ROOT . "views" . DS . 
		$this->_controlador .DS. $vista . ".phtml";
		
		if ($this->_metodo=="login") {
			$layout = "login";
		}else{
			$layout = DEFAULT_LAYOUT;
		}

		if (is_readable($rutaView)){
			require_once ROOT.'views'.DS.'layouts'.DS.$layout.DS.'header.php';
			require_once $rutaView;
			require_once ROOT.'views'.DS.'layouts'.DS.$layout.DS.'footer.php';
		}else{
			throw new Exception("Error de vista");
		}

	}
}