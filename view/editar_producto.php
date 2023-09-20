<center>
	<form method="get" action="index.php">
        <?php 
            foreach($dataToView["data"] as $producto){        
        ?>
		<table>
			<tr>
				<td><b>Nombre:</b></td>
				<td><input type="text" value="<?php echo $producto['nombre_producto']; ?>" name="nombre_producto" id="nombre_producto" required="required" maxlength="50"></td>
			</tr>
			<tr>
				<td><b>Referencia:</b></td>
				<td><input type="text" value="<?php echo $producto['referencia_producto']; ?>" name="referencia_producto" id="referencia_producto" required="required" maxlength="35"></td>
			</tr>
			<tr>
				<td><b>Precio:</b></td>
				<td><input type="number" value="<?php echo $producto['precio_producto']; ?>" name="precio_producto" id="precio_producto" required="required" min="0"></td>
			</tr>
			<tr>
				<td><b>Peso:</b></td>
				<td><input type="number" value="<?php echo $producto['peso_producto']; ?>" name="peso_producto" id="peso_producto" required="required" min="0"></td>
			</tr>
			<tr>
				<td><b>Categoria:</b></td>
				<td>
					<select name="categoria_producto" id="categoria_producto" required="required">
						<option value="<?php echo $producto['categoria_producto']; ?>"><?php echo $producto['categoria_producto']; ?></option>
						<option value="Hogar">Hogar</option>
						<option value="Aseo">Aseo</option>
						<option value="Aseo Personal">Aseo Personal</option>
						<option value="Tecnologia">Tecnologia</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<input type="hidden" name="controller" id="controller" value="producto">
						<input type="hidden" name="action" id="action" value="guardaredicion">
                        <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $_GET['id_producto'] ?>">
						<input type="submit" value="Guardar Cambios Producto">
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