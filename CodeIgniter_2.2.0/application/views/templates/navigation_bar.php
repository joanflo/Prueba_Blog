<!-- navigation bar -->

<nav class="opciones">
	<?php
		if (!$creating_post) {
			echo '<a class="boton_generico boton2" href="posts/create">Crear post</a>';
		}
		if ($this->session->userdata('logged_in')) {
			$nombre = 'Log out';
		} else {
			$nombre = 'Log in';
		}
	?>
	<a class="boton_generico boton2" id="log" href="#"><?php echo $nombre; ?></a>
</nav>



<!-- modal dialog -->

<div id="dialog-form" title="Log in">
	<p class="validateTips">Rellenar datos de acceso.</p>
 
	<?php echo form_open('usuarios/verify') ?>
		<fieldset>
			<label class="dialogo" for="username">Username</label>
			<input type="text" name="username" id="username" class="dialogo text_dialogo ui-widget-content ui-corner-all">
			<label class="dialogo" for="password">Password</label>
			<input type="password" name="password" id="password" class="dialogo text_dialogo ui-widget-content ui-corner-all">

			<input type="submit" name="submit" tabindex="-1" style="position:absolute; top:-1000px">
		</fieldset>
	</form>
  
</div>