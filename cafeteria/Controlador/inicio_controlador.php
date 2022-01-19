<!-- inicio_controlador.php -->
<?php
class inicio_controlador{

	public function __construct(){
		$this->vista = new vista();
	}
	public function index(){
		$this->vista->unirContenido("inicio/index");
	}
}

