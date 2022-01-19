<?php
require_once "Modelo/producto_modelo.php";
class producto_controlador{


	public function __construct(){
		$this->vista = new vista();
	}

	public function index(){		
		$this->vista->unirContenido("producto/index");
	}

	public function frmRegistrar(){			
		$this->vista->unirContenido("producto/crear");
	}
	public static function consultas1(){			
		return $rta = producto_modelo::mdlBuscarMax();
	}
	public static function consultas2(){			
		return $rta = producto_modelo::mdlBuscarStock();
	}

	public function registrar(){
		extract($_POST);
		$datos["nombre"] 	= $nombre;
		$datos["referencia"] = $referencia;
		$datos["precio"] = $precio;
		$datos["peso"] = $peso;
		$datos["categoria"] = $categoria;
		$datos["stock"] = $stock;
		$datos["fregistro"] = $fregistro;
		//var_dump($datos);die;
		$rta = producto_modelo::mdlRegistrar($datos);
		if($rta > 0){
			echo json_encode (array("mensaje"=> "producto registrado !",
		                            "icono"  => "success"));
		}else{
			echo json_encode (array("mensaje"=> "Error al registrar producto",
		                            "icono"  => "error"));
		}		
	}
	public function listadoProductoJSON(){

		if(isset($_POST["limite"])){
			$limite= $_POST["limite"];
		}else{		
	    	$limite=3;
	    }
	 //echo $limite;
	    $total  = producto_modelo::mdlTotal();
	    if($total > $limite){
	    	$secciones = ceil($total / $limite);
	    }else{
	    	$secciones = 1;
	    }

	    if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
	    	$pagina = $_GET["pagina"];
	    }else{
	    	$pagina=0;
	    }	    
	    $pagina_actual = ($pagina/$limite)+1;
		$this->vista->info = producto_modelo::mdlListar( $pagina, $limite);
		 if($secciones >= 1){
			$this->vista->pag = '<ul class="pagination pagination-sm">'; 
			for($i=1;$i<=$secciones;$i++){
				if($i != $pagina_actual){
				$this->vista->pag .= '<li class="page-item"><a href="?controlador=producto&accion=listadoProductoJSON&pagina='.($limite*($i-1)).'" class="paginacion page-link">'.$i.'</a></li> ';
				}else{
					$this->vista->pag .= '  <li class="page-item active" aria-current="page"><span class="page-link">'
					.$i.
					'</span></li>';
				}
			}
			$this->vista->pag .= '</ul">'; 
			$tabla ='
			<table class="table">
			<thead class="thead-dark">
			  <tr>
			  	<th>ID</th>
			  	<th>NOMBRE</th>
				<th>REFEREANCIA</th>
			  	<th>PRECIO</th>
				<th>PESO</th>
				<th>CATEGORIA</th>
				<th>STOCK</th>
				<th>F. REGISTRO</th>
			  	<th></th>
			  	<th></th>
				<th></th>
			  </tr>
			  </thead>';
			  foreach ($this->vista->info as $valor) {
			      $id = $valor["id_tb_productos"];
			  		$tabla .= "<tr id='fila$id'>";
					$tabla .= "<td>".$valor["id_tb_productos"]."</td>";
				  	$tabla .= "<td>".$valor["nombre_tb_productos"]."</td>";
				  	$tabla .= "<td>".$valor["referencia_tb_productos"]."</td>";
					$tabla .= "<td>".$valor["precio_tb_productos"]."</td>";
				  	$tabla .= "<td>".$valor["peso_tb_productos"]."</td>";
					$tabla .= "<td>".$valor["categoria_tb_productos"]."</td>";
				  	$tabla .= "<td>".$valor["stock_tb_productos"]."</td>";
					$tabla .= "<td>".$valor["fecha_registro_tb_productos"]."</td>";
					$tabla .= "<td><a href='?controlador=producto&accion=frmVenta&id=$id'> Vender </a></td>";
				  	$tabla .= "<td><a href='?controlador=producto&accion=frmEditar&id=$id'> Editar </a></td>";
				  	$tabla .= "<td>
			              <a href='?controlador=producto&accion=eliminar&id=$id' data-id='$id' class='eliminarProducto' onclick='return false;'>Eliminar</a>
			            </td>";
				  	$tabla .= "</tr>";
  				}
  				$tabla .= "</table>";

  			 echo json_encode(array("tabla"=>$tabla, "paginacion"=>$this->vista->pag));  			
		}
	}
	public function frmEditar(){
		// cargar el formulario de edicion
		extract($_REQUEST);
		$this->vista->datos = producto_modelo::mdlBuscarByID($id);
		$this->vista->unirContenido("producto/editar");		
	}
	public function frmVenta(){
		// cargar el formulario de edicion
		extract($_REQUEST);
		$this->vista->datos = producto_modelo::mdlBuscarByID($id);
		$this->vista->unirContenido("producto/venta");		
	}
	public function editar(){
		// procesar el formulario
		extract($_REQUEST);
		$datos["nombre"] 	= $nombre;
		$datos["referencia"] = $referencia;
		$datos["precio"] = $precio;
		$datos["peso"] = $peso;
		$datos["categoria"] = $categoria;
		$datos["stock"] = $stock;
		$datos["fregistro"] = $fregistro;
		$datos["id_tb_producto"] 	 = $id_tb_producto;
		$rta = producto_modelo::mdlEditar($datos);
		if($rta > 0){
			echo json_encode (array("mensaje"=> "producto editado !",
		                            "icono"  => "success"));
		}else{
			echo json_encode (array("mensaje"=> "error al editar",
		                            "icono"  => "error"));;
		}
	}
	public function venta(){
		// procesar el formulario
		extract($_REQUEST);
		$datos["stock"] 	= $stock;
		$datos["cantidad"] 	= $cantidad;
		$datos["pagar"] 	= $pagar;
		$datos["id_tb_producto"] 	 = $id_tb_producto;
		$rta = producto_modelo::mdlVenta($datos);
		if($rta > 0){
			$datos2["stock"] 	= $stock-$cantidad;
			$datos2["id_tb_producto"] 	 = $id_tb_producto;
			$rta2 = producto_modelo::mdlEditar2($datos2);
			if($rta2 > 0){
				echo json_encode (array("mensaje"=> "producto vendido !",
		                            "icono"  => "success"));
			}else{
			echo json_encode (array("mensaje"=> "error al vender",
		                            "icono"  => "error"));;
			}
		}else{
			echo json_encode (array("mensaje"=> "error al vender",
		                            "icono"  => "error"));;
		}
	}
	public function eliminar(){
		extract($_REQUEST);
		$rta = producto_modelo::mdlEliminar($id);
		if($rta > 0){
			echo json_encode(array("mensaje" => "Registro eliminado"));
		}else{
			echo json_encode(array("mensaje" => "error al eliminar"));
		}
	}

}