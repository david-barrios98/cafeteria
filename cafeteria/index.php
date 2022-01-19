<?php
require_once "Librerias/rutas.php";
require_once "Librerias/vista.php";
require_once "Librerias/conexion.php";

if(isset($_GET["controlador"]) && isset($_GET["accion"])){
	$controlador = $_GET["controlador"];
	$accion      = $_GET["accion"];
}else{
	$controlador = "inicio";
	$accion      = "index";
}
rutas::cargarContenido($controlador, $accion); 