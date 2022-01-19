<?php
	require_once "Controlador/producto_controlador.php";
	$rta1 = producto_controlador::consultas1();
	$rta2 = producto_controlador::consultas2();
?>
<div class="container">	
		
		
		<div class="row">	
				<div class="col-lg-4">
				Bienvenido a mi pagina, SECCION principal
				</div>
				<div  class="col-lg-8">	
				<?php //var_dump($rta1);?>
				<p>PRODUCTO MAS VENDIDO:   <?php echo $rta1[0][0];?> CON UNA CANTIDAD: <?php echo $rta1[0][1];?></p>
				<p>PRODUCTO MAS STOCK:   <?php echo $rta2[0][1];?> CON UNA CANTIDAD: <?php echo $rta2[0][6];?></p>
				</div>

		</div>
</div>