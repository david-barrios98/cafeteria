<?php
class rutas{

	public static function cargarContenido($controlador, $accion){
		// echo "<br>Dentro de rutas<br>";
		// echo $controlador."  --  ".$accion;
		// echo "<br>se debe cargar el controlador llamado:".$controlador."_controlador";
		// echo "<br>y se debe cargar la funcion llamada:".$accion;
		// echo "<br>es decir public function $accion(){}";   
		if(file_exists("Controlador/".$controlador."_controlador.php")){
			require_once "Controlador/".$controlador."_controlador.php";

			$clase = $controlador."_controlador";
			if(class_exists($clase)){
				$i = new $clase();
				if(method_exists($i, $accion)){
					$i->$accion();
				}else{
					echo "<br>No existe el accion/metodo";
					// header("Location: /cafeteria");	
				}
			}else{
					echo "<br>No existe la clase";	
				// header("Location: /cafeteria");
			}
		}else{
			echo "<br>No existe el controlador";
			// header("Location: /cafeteria");
		}
	}	
}