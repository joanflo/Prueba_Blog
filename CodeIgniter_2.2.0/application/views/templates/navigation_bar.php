<!-- navigation bar -->

<nav class="opciones">
	<?php
		if (!$creating_post) {
			if (!$this->session->userdata('logged_in')) {
				// no loggeado
				$href_a = '#';
				$id_a = "id='link_postcreate' ";
			} else {
				$href_a = base_url() . 'index.php/posts/create';
				$id_a = '';
			}
			echo "<a " . $id_a . "class='boton_generico boton2' href='" . $href_a . "'>Crear post</a>";
		}
		if ($this->session->userdata('logged_in')) {
			echo "<a class='boton_generico boton2' id='log2' href='" . base_url() . "index.php/posts/verify'>Log out</a>";
		} else {
			echo '<a class="boton_generico boton2" id="log" href="#">Log in</a>';
		}
	?>
</nav>



<!-- modal dialog log in -->

<div id="dialog-form" title="Log in">
	<p class="validateTips">Rellenar datos de acceso.</p>
 
	<?php echo form_open('usuarios/verify') ?>
		<fieldset>
			<label class="dialogo" for="username">Username</label>
			<input type="text" name="username" id="username" class="dialogo text_dialogo ui-widget-content ui-corner-all">
			<label class="dialogo" for="password">Password</label>
			<input type="password" name="password" id="password" class="dialogo text_dialogo ui-widget-content ui-corner-all">

			<input type="submit" name="submit" tabindex="-1" style="position:absolute;top:-1000px">
		</fieldset>
	</form>
  
</div>