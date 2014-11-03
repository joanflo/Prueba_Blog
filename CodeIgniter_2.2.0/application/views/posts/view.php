<div id="cos">
	
	<div class="post_completo">
		
		<div class="post_izq">
			<?php
				$selected_b = '';
				$selected_p = '';
				$selected_c = '';
				switch ($posts_item['status']) {
					case 'b':
						$nombre_icono = 'borradores';
						$selected_b = 'selected';
						break;
					case 'p':
						$nombre_icono = 'público';
						$selected_p = 'selected';
						break;
					case 'c':
						$nombre_icono = 'censurado';
						$selected_c = 'selected';
						break;
				}
				$url_icono = base_url() . '/assets/images/' . $nombre_icono . '.png';
			?>
			<img class="icono" src="<?php echo $url_icono; ?>" alt="Icono <?php echo $nombre_icono; ?>">
			
			<h3 class="post" style="display: inline"><?php echo $posts_item['titulo'] ?></h3>
			
			<?php
				$visibilidad_fieldset = 'none';
				if ($this->session->userdata('logged_in')) {
					$data = $this->session->userdata('logged_in');
					if ($data['status'] == 'a') {
						// usuario admin
						$visibilidad_fieldset = 'visible';
					}
				}
			?>
			<fieldset style="display: <?php echo $visibilidad_fieldset; ?>" id="fieldset_menu">
				<select name="estado_post" id="estado_post">
					<option value="b" <?php echo $selected_b; ?>>Borradores</option>
					<option value="p" <?php echo $selected_p; ?>>Público</option>
					<option value="c" <?php echo $selected_c; ?>>Censurado</option>
				</select>
				<input id="input_id_post" type="hidden" value="<?php echo $posts_item['id_post']; ?>">
			</fieldset>
			
		</div>
		
		<div class="post_der">
			<div class="icono">
				<img class="icono" src="<?php echo base_url(); ?>/assets/images/calendar.png" alt="Fecha creación">
				<p class="icono icono1"><b><?php echo $posts_item['create_time']; ?></b></p>
			</div>
			<div class="icono">
				<img class="icono" src="<?php echo base_url(); ?>/assets/images/username.png" alt="Uusario creador">
				<p class="icono icono1"><b><?php echo $posts_item['username'] ?></b></p>
			</div>
		</div>
		
		<div class="post_contenido_completo">
		</div>
		<p class="post"><?php echo $posts_item['contenido'] ?></p>
		
	</div>
	
</div>