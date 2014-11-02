



<div id="cos">
				
	<?php foreach ($posts as $posts_item): ?>
	<div class="post">
		
		<div class="post_izq">
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
				<?php
					$fechaStr = date('d / m / Y - H:i', intval($posts_item['create_time'])) . 'h';
				?>
				<p class="icono icono1"><b><?php echo $fechaStr; ?></b></p>
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