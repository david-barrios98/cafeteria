<?php
class producto_modelo{

	public static function mdlRegistrar($datos){
        try {
            $i = new conexion();
            $c = $i->conectarse();
            $sql = "INSERT INTO tb_productos VALUES
                    (? , ? , ?, ?, ?, ?, ?, ?)";
            $s=  $c->prepare($sql);
            $v = array("", $datos["nombre"], $datos["referencia"],$datos["precio"],$datos["peso"],$datos["categoria"],$datos["stock"], $datos["fregistro"]);
            return $s->execute($v);

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n", $s;
        } 
		
	}
	public static function mdlVenta($datos){
        try {
            $i = new conexion();
            $c = $i->conectarse();
            $sql = "INSERT INTO `enc_facturas`(`id_enc_facturas`, `id_producto`, `cantidad`, `total_pagar_enc_facturas`) VALUES (?,?,?,?)";
            $s=  $c->prepare($sql);
            $v = array("", $datos["id_tb_producto"], $datos["cantidad"],$datos["pagar"]);
            return $s->execute($v);

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n", $s;
        } 
		
	}
	public static function mdlListar( $pagina, $limite ){
		$i = new conexion();
		$c = $i->conectarse();
		$sql = "SELECT * FROM tb_productos LIMIT $pagina, $limite";
		$s=  $c->prepare($sql);		 
		$s->execute();
		return $s->fetchAll();
	}

    public static function mdlTotal( ){
		$i = new conexion();
		$c = $i->conectarse();
		$sql = "SELECT * FROM tb_productos";
		$s=  $c->prepare($sql);		 
		$s->execute();
		return $s->rowCount();
	}


	public static function mdlEliminar($id){		
		$i = new conexion();
		$c = $i->conectarse();
		$sql = "DELETE FROM tb_productos WHERE id_tb_productos = ?";
		$s=  $c->prepare($sql);		 
		return $s->execute(array($id));
	}

	public static function mdlBuscarByID($id){
		$i = new conexion();
		$c = $i->conectarse();
		$sql = "SELECT * FROM tb_productos WHERE id_tb_productos = ?";
		$s=  $c->prepare($sql);
		$s->execute(array($id));
		return $s->fetch();	
	}
	public static function mdlBuscarMax(){
		$i = new conexion();
		$c = $i->conectarse();
		$sql = "SELECT `id_producto`, COUNT(`id_producto`) as total FROM `enc_facturas` GROUP BY id_producto;";
		$s=  $c->prepare($sql);		 
		$s->execute();
		return $s->fetchAll();	
	}
	public static function mdlBuscarStock(){
		$i = new conexion();
		$c = $i->conectarse();
		$sql = "SELECT `id_tb_productos`, `nombre_tb_productos`, `referencia_tb_productos`,
		 `precio_tb_productos`, `peso_tb_productos`, `categoria_tb_productos`, MAX(`stock_tb_productos`), `fecha_registro_tb_productos` FROM `tb_productos` WHERE 1";
		$s=  $c->prepare($sql);		 
		$s->execute();
		return $s->fetchAll();	
	}

	public static function mdlEditar($datos){
		
        try {
            $i = new conexion();
            $c = $i->conectarse();
            $sql = "UPDATE `tb_productos` SET `nombre_tb_productos`= ?,`referencia_tb_productos`= ? ,`precio_tb_productos`= ?,
            `peso_tb_productos`=?,`categoria_tb_productos`=?,`stock_tb_productos`=?,`fecha_registro_tb_productos`=? WHERE `id_tb_productos`= ?";
            $s=  $c->prepare($sql);
            $v = array($datos["nombre"], $datos["referencia"],$datos["precio"],$datos["peso"],$datos["categoria"],$datos["stock"], $datos["fregistro"], $datos["id_tb_producto"]);
            return $s->execute($v);

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n", $s;
        } 
	}
	public static function mdlEditar2($datos){
		
        try {
            $i = new conexion();
            $c = $i->conectarse();
            $sql = "UPDATE `tb_productos` SET `stock_tb_productos`=? WHERE `id_tb_productos`= ?";
            $s=  $c->prepare($sql);
            $v = array($datos["stock"], $datos["id_tb_producto"]);
            return $s->execute($v);

        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n", $s;
        } 
	}

}