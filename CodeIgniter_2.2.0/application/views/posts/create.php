<h2>Nuevo post</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create') ?>

	<label for="titulo">Título</label>
	<input type="input" name="titulo" /><br />

	<label for="contenido">Contenido</label>
	<textarea name="contenido"></textarea><br />

	<input type="submit" name="submit" value="Crear post" />

</form>