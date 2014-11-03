<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">

		<title><?php echo $title; ?></title>
		<meta name="author" content="Joanflo">
		
		<!-- estilos -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilos.css" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.11.2/jquery-ui.min.css" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.11.2/jquery-ui.structure.min.css" type="text/css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.11.2/jquery-ui.theme.min.css" type="text/css" media="screen">
		
		<!-- javascripts -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-ui-1.11.2/external/jquery/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-ui-1.11.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';
		</script>
		
	</head>

	<body>
		<div id="content">
			
			<header class="cabezera">
				<a href="<?php echo base_url(); ?>index.php/posts">
					<img class="cabezera" src="<?php echo base_url(); ?>/assets/images/logo.jpg" alt="Logotipo del blog">
				</a>
				
				<div class="cabezera cabezera1">
					<h1 class="cabezera">Título blog</h1>
					<h2 class="cabezera">Subtítulo blog</h2>
				</div>
				
				<div class="cabezera cabezera2">
					<?php
						if ($this->session->userdata('logged_in')) {
							$display = 'block';
							$session_data = $this->session->userdata('logged_in');
							$username = $session_data['username'];
						} else {
							$display = 'none';
							$username = 'username';
						}
					?>
					<div class="icono" style="display: <?php echo $display; ?>;">
						<img class="icono" src="<?php echo base_url(); ?>/assets/images/key.png" alt="Acceso usuario">
						<p class="icono icono1"><b><?php echo $username; ?></b></p>
					</div>
					<div class="icono">
						<img class="icono" src="<?php echo base_url(); ?>/assets/images/smartphone.png" alt="Marca y modelo">
						<p class="icono icono1"><b>marca</b></p>
						<p class="icono icono2">modelo</p>
					</div>
				</div>
			</header>
			
			<div class="barra_separadora">
			</div>