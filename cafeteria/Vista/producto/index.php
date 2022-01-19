<div class="container">

	<br>SECCION principal PRODUCTOS
	<br>
	<a href="?controlador=producto&accion=frmRegistrar" 
	class="btn btn-primary"> Crear producto</a> 
	<!--<a href="?controlador=usuario&accion=reporte" target="new"> reporte usuario </a> -
	<a href="?controlador=usuario&accion=frmCargarArchivo"> subir archivo </a> -
	<a href="?controlador=usuario&accion=reporteExcel" target="new"> Reporte </a> - 
	<a href="?controlador=usuario&accion=reporteGrafico" target="new"> graficos </a> -->

	<br ><br >


	<div class="row">
		<div class="col-lg-4">	
			 Items por pagina
			 <select id="items" name="items" data-url="?controlador=producto&accion=listadoProductoJSON" 
			 class="form-control">
			 	<option value="3">-- 3 --</option>
			 	<option value="6">-- 6 --</option>
			 	<option value="12">-- 12 --</option>
			 </select>
		</div>
	 </div>	
	 <br><br>
	<div id="resultado">
	  aqui se cargara la tabla 
	</div>
</div>