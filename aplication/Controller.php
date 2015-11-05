<?php
include ("Database.php");
abstract class AppController extends ClassPDO
{
	/**
	  * Clase abtracta AppController
	  * 
	  * @author Rodibel Morales, Saul Menesess
	 */


	protected $_view;

	public function __construct(){
		$this->_view = new View(new Request);
		//$this->db = new ClassPDO();
		parent::__construct();
	}

	abstract function index();

	protected function redirect($url = array()){
		$path = "";
		if ($url["controller"]) {
			$path .= $url["controller"];
		}
		if ($url["action"]) {
			$path .= "/".$url["action"];
		}
		header("LOCATION: ".APP_URL.$path);

	}
	/*

	protected function loadModel($modelo){
		$modelo = $modelo."Model";
		$rutaModelo = ROOT."models".DS.$modelo.".php";


		if (is_readable($rutaModelo)) {
		 	require_once($rutaModelo);
		 	$modelo = new $modelo;
		 	return $modelo;
		 }else{
		 	throw new Exception("Error al cargar el modelo");
		 }
	}
	*/
}
