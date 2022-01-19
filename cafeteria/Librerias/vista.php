<?php
class vista{

	public function unirContenido($contenido){
		require_once "Vista/header.php";
		require_once "Vista/$contenido.php";
		require_once "Vista/footer.php";   
	}
}