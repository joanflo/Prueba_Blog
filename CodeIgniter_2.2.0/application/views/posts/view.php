<div id="cos">
	
	<div class="post_completo">
		
		<div class="post_izq">
			<?php
				switch ($posts_item['status']) {
					case 'b':
						$nombre_icono = 'borradores';
						break;
					case 'p':
						$nombre_icono = 'publico';
						break;
					case 'c':
						$nombre_icono = 'censurado';
						break;
				}
				$url_icono = base_url() . '/assets/images/' . $nombre_icono . '.png';
			?>
			<img class="icono" src="<?php echo $url_icono; ?>" alt="Icono <?php echo $nombre_icono; ?>">
			<h3 class="post"><?php echo $posts_item['titulo'] ?></h3>
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