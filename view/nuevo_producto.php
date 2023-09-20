<center>
	<form method="get" action="index.php">
		<table>
			<tr>
				<td><b>Nombre:</b></td>
				<td><input type="text" name="nombre_producto" id="nombre_producto" required="required" maxlength="50"></td>
			</tr>
			<tr>
				<td><b>Referencia:</b></td>
				<td><input type="text" name="referencia_producto" id="referencia_producto" required="required" maxlength="35"></td>
			</tr>
			<tr>
				<td><b>Precio:</b></td>
				<td><input type="number" name="precio_producto" id="precio_producto" required="required" min="0"></td>
			</tr>
			<tr>
				<td><b>Peso:</b></td>
				<td><input type="number" name="peso_producto" id="peso_producto" required="required" min="0"></td>
			</tr>
			<tr>
				<td><b>Categoria:</b></td>
				<td>
					<select name="categoria_producto" id="categoria_producto" required="required">
						<option value="">Seleccione....</option>
						<option value="Hogar">Hogar</option>
						<option value="Aseo">Aseo</option>
						<option value="Aseo Personal">Aseo Personal</option>
						<option value="Tecnologia">Tecnologia</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Stock Inicial:</b></td>
				<td><input type="number" name="stock_producto" id="stock_producto" required="required" min="1"></td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<input type="hidden" name="controller" id="controller" value="producto">
						<input type="hidden" name="action" id="action" value="guardarnuevo">
						<input type="submit" value="Guardar Producto">
					</center>
				</td>
			</tr>
		</table>
	</form>
</center><br>
<div class="row">
	<div class="alert alert-success">
		<a href="index.php?controller=producto&action=list">Volver al listado</a>
	</div>
</div>