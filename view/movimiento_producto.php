<center>
	<form method="get" action="index.php">
        <?php 
            foreach($dataToView["data"] as $producto){        
        ?>
		<table>
			<tr>
				<td><b>Nombre:</b></td>
				<td><?php echo $producto['nombre_producto']; ?></td>
			</tr>
			<tr>
				<td><b>Tipo de movimiento:</b></td>
				<td>
					<select name="movimiento_producto" id="movimiento_producto" required="required">
						<option value="">Seleccione....</option>
						<option value="0">Entrada</option>
						<option value="1">Salida</option>
					</select>
				</td>
			</tr>
            <tr>
				<td><b>Cantidad:</b></td>
				<td><input type="number" value="" name="cantidad_producto" id="cantidad_producto" required="required" min="1"></td>
			</tr>
			<tr>
				<td><b>Stock Disponible:</b></td>
				<td><?php echo $producto['stock_producto']; ?></td>
			</tr>
            <tr>
				<td colspan="2">
					<center>
						<input type="hidden" name="controller" id="controller" value="producto">
						<input type="hidden" name="action" id="action" value="guardarmovimiento">
                        <input type="hidden" name="stockactual" id="stockactual" value="<?php echo $producto['stock_producto']; ?>">
                        <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $_GET['id_producto'] ?>">
						<input type="submit" value="Guardar Movimiento">
					</center>
				</td>
			</tr>
		</table>
        <?php 
            } 
        ?>
	</form>
</center><br>
<div class="row">
	<div class="alert alert-success">
		<a href="index.php?controller=producto&action=list">Volver al listado</a>
	</div>
</div>