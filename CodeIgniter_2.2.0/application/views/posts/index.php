



<div id="cos">
				
	<?php foreach ($posts as $posts_item): ?>
	<div class="post">
		
		<div class="post_izq">
			<?php
				switch ($posts_item['status']) {
					case 'b':
						$nombre_icono = 'borradores';
						break;
					case 'p':
						$nombre_icono = 'público';
						break;
					case 'c':
						$nombre_icono = 'censurado';
						break;
				}
				$url_icono = base_url() . '/assets/images/' . $nombre_icono . '.png';
			?>
			<img class="icono" src="<?php echo $url_icono; ?>" alt="Icono <?php echo $nombre_icono; ?>">
			<h3 class="post"><?php echo $posts_item['titulo'] ?></h3>
			<div class="post_contenido">
			</div>
			<?php
				$entradilla = substr($posts_item['contenido'], 0, 180) . '...';
			?>
			<p class="post"><?php echo $entradilla ?></p>
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
			<a class="boton_generico boton1" href="posts/<?php echo $posts_item['id_post'] ?>">Ver post</a>
		</div>
		
	</div>
	<?php endforeach ?>
	
</div>