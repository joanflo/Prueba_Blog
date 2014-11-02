<div id="cos">
	
	<div class="post_completo">
		
		<div class="post_izq">
			<h3 class="post"><?php echo $posts_item['titulo'] ?></h3>
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
		</div>
		
		<div class="post_contenido_completo">
		</div>
		<p class="post"><?php echo $posts_item['contenido'] ?></p>
		
	</div>
	
</div>