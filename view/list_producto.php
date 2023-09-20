<a href="index.php?controller=producto&action=nuevo" class="btn btn-danger">+ Agregar producto</a>
<div class="row">
	<div class="col-md-12 text-right">
		<!--<a href="index.php?controller=note&action=edit" class="btn btn-outline-primary">Crear nota</a>-->
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $producto){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $producto['nombre_producto']; ?></h5>
					<div class="card-text"><b>REF: </b><?php echo nl2br($producto['referencia_producto']); ?></div>
					<div class="card-text"><b>PRECIO: </b><?php echo '$'.number_format($producto['precio_producto'], 0, ",", "."); ?></div>
					<div class="card-text"><b>PESO: </b><?php echo number_format($producto['peso_producto'], 0, ",", "."); ?></div>
					<div class="card-text"><b>CATEGORIA: </b><?php echo nl2br($producto['categoria_producto']); ?></div>
					<div class="card-text"><b>STOCK: </b><?php echo nl2br($producto['stock_producto']); ?></div>
					<div class="card-text"><b>FECHA: </b><?php echo nl2br($producto['fechacreacion_producto']); ?></div>
					<hr class="mt-1"/>
					<a href="index.php?controller=producto&action=editar&id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger">Editar</a>
					<a href="index.php?controller=producto&action=nuevomovimiento&id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger">Nuevo Movimiento</a>
					<hr class="mt-1"/>
					<a href="index.php?controller=producto&action=vermovimientos&id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger">Ver Movimientos</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen productos.
		</div>
		<?php
	}
	?>
	<br>
	
</div><br>