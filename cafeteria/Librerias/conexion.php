<?php
class conexion{
// oracle
// posgret
// mysql
	private $conexion;
	public function __construct(){
		try{
        	$this->conexion = new PDO("mysql:host=localhost;dbname=db_cafeteria","root","");
        	$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
        	echo "Error: ".$e->getMessage();
        }
	}	

	public function conectarse(){
		if($this->conexion instanceof PDO){
			return $this->conexion;
		}
	}
}