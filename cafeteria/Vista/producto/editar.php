 
<h2>Edicion</h2>
<div class="container">
<form action="?controlador=producto&accion=editar" method="post" id="frmEProducto">
<div class="col-lg-12">
			<div class="row">
				<div class="form-group col-lg-4">
					ID 
					<input type="text" name="id_tb_productos" id="id_tb_productos" disabled="disabled" class="form-control" value="<?php echo $this->datos["id_tb_productos"];?>">
					<input type="hidden" name="id_tb_producto" id="id_tb_producto" class="form-control" value="<?php echo $this->datos["id_tb_productos"];?>">
				</div>
				<div class="form-group col-lg-4">
					Nombre 
					<input type="text" name="nombre" id="nombre" required class="form-control" value="<?php echo $this->datos["nombre_tb_productos"];?>">
				</div>
				<div class="form-group col-lg-4">
					Referencia
					<input type="text" name="referencia" id="referencia" required class="form-control" value="<?php echo $this->datos["referencia_tb_productos"];?>">
				</div>
				<div class="form-group col-lg-4">
					<br>
					<div class="input-group mb-3">
						<span class="input-group-text">$</span>
						<input type="text" required name="precio" id="precio"pattern="[0-9]{1,10}" title="Solo numeros enteros" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $this->datos["precio_tb_productos"];?>">
						<span class="input-group-text">.00</span>
					</div>
				</div>
				<div class="form-group col-lg-4">
					Peso
					<input type="text" name="peso" id="peso" required class="form-control"
					pattern="[0-9]{1,10}" title="Solo numeros enteros" value="<?php echo $this->datos["peso_tb_productos"];?>">
				</div>
				<div class="form-group col-lg-4">
					Categoria
					<input type="text" name="categoria" id="categoria" required class="form-control" value="<?php echo $this->datos["categoria_tb_productos"];?>">
				</div>
				<div class="form-group col-lg-4">
					Stock
					<input type="text" name="stock" id="stock" required class="form-control"
					pattern="[0-9]{1,10}" title="Solo numeros enteros" value="<?php echo $this->datos["stock_tb_productos"];?>">
				</div>
				<div class="form-group col-lg-4">
					Fecha de registro
					<input type="date" name="fregistro" id="fregistro" required class="form-control" value="<?php echo $this->datos["fecha_registro_tb_productos"];?>">
				</div>
				<div class="form-group col-lg-12">
					<input type="submit" name="aceptar" class="btn btn-danger">	
				</div>	 
			</div>
		</div>	
</form>
</div>
