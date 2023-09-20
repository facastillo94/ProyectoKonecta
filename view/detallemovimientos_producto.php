<a href="index.php?controller=producto&action=list" class="btn btn-danger">+ Volver</a>
<div class="row">
	<div class="col-md-12 text-right">
		<!--<a href="index.php?controller=note&action=edit" class="btn btn-outline-primary">Crear nota</a>-->
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
        $tiposmovimientos = array("Entrada", "Salida");
        ?>
        <table border="1">
            <tr>
                <td><center><b>Nombre producto</b></center></td>
                <td><center><b>Tipo movimiento</b></center></td>
                <td><center><b>Cantidad</b></center></td>
                <td><center><b>Fecha</b></center></td>
            </tr>
        <?php
		foreach($dataToView["data"] as $producto){
			?>
                <tr>
                    <td><center><?php echo $producto['nombre_producto']; ?></center></td>
                    <td><center><?php echo $tiposmovimientos[$producto['tipo_movimiento']]; ?></center></td>
                    <td><center><?php echo $producto['cantidad_movimiento']; ?></center></td>
                    <td><center><?php echo $producto['fecha_movimiento']; ?></center></td>
                </tr>
            <?php
		}
        ?>
        </table>
        <?php
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen movimientos del producto.
		</div>
		<?php
	}
	?>
</div><br>