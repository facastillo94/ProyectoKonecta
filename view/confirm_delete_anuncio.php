<div class="row">
	<form class="form" action="index.php?controller=anuncio&action=delete" method="POST">
		<input type="hidden" name="id_anuncio" value="<?php echo $dataToView["data"]["id_anuncio"]; ?>">
		<div class="alert alert-warning">
			<b>¿Confirma que deseas quitar este anuncio sugerido?:</b>
			<i><?php echo $dataToView["data"]["titulo_aunucio"]; ?></i>
		</div>
		<input type="submit" value="Quitar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="index.php?controller=anuncio&action=list">Cancelar</a>
	</form>
</div>