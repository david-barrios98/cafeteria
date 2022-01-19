<div class="container">
	
	<h2>Registrar productos</h2>
	<form action="?controlador=producto&accion=registrar" method="post" 
	id="frmRProducto">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="form-group col-lg-4">
					Nombre 
					<input type="text" name="nombre" id="nombre" required class="form-control">
				</div>
				<div class="form-group col-lg-4">
					Referencia
					<input type="text" name="referencia" id="referencia" required class="form-control">
				</div>
				<div class="form-group col-lg-4">
					<br>
					<div class="input-group mb-3">
						<span class="input-group-text">$</span>
						<input type="text" required name="precio" id="precio"pattern="[0-9]{1,10}" title="Solo numeros enteros" class="form-control" aria-label="Amount (to the nearest dollar)">
						<span class="input-group-text">.00</span>
					</div>
				</div>
				<div class="form-group col-lg-4">
					Peso
					<input type="text" name="peso" id="peso" required class="form-control"
					pattern="[0-9]{1,10}" title="Solo numeros enteros">
				</div>
				<div class="form-group col-lg-4">
					Categoria
					<input type="text" name="categoria" id="categoria" required class="form-control">
				</div>
				<div class="form-group col-lg-4">
					Stock
					<input type="text" name="stock" id="stock" required class="form-control"
					pattern="[0-9]{1,10}" title="Solo numeros enteros">
				</div>
				<div class="form-group col-lg-4">
					Fecha de registro
					<input type="date" name="fregistro" id="fregistro" required class="form-control">
				</div>
				<div class="form-group col-lg-12">
					<input type="submit" name="aceptar" class="btn btn-danger">	
				</div>	 
			</div>
		</div>

	</form>
</div>
