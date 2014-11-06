

<div id="cos">
	
	<?php
        if (!$is_mobile) {
        	$margin_left = 200;
        } else {
        	$margin_left = 0;
        }
	?>
	<div class="ui-state-error" style="width:350px;border:0px;margin-left:<?php echo $margin_left; ?>px;text-align:center;">
		<?php echo validation_errors(); ?>
	</div>
	
	<?php echo form_open('posts/create') ?>
		<div class="post_completo">
			
			<div class="campo_formulario">
	            <div class="texto_campo">
	                <p class="texto_formulario_grande">Título*</p>
	                <?php
		                if (!$is_mobile) {
		                	echo '<p class="texto_formulario_peque">Título del post.</p>';
		                }
					?>
	            </div>
	            <input class="campo_formulario" type="input" name="titulo" id="titulo" value="">
	        </div>
			
			<div class="campo_formulario">
	            <div class="texto_campo">
	                <p class="texto_formulario_grande">Contenido*</p>
	                <?php
		                if (!$is_mobile) {
		                	echo '<p class="texto_formulario_peque">Agrega el contenido del post. Los posts con contenido inapropiado serán censurados.</p>';
		                	echo '<br />';
		                	echo '<br />';
		                	echo '<br />';
		                	echo '<p class="texto_formulario_peque">*Campos obligatorios</p>';
		                	echo '<br />';
						}
					?>
	            </div>
	            <textarea rows="8" class="campo_formulario" name="contenido" id="contenido"></textarea> 
	        </div>
	        
	        <input class="boton_generico boton2" type="submit" name="submit" value="Enviar" />
	        
		</div>
	</form>
	
</div>

</form>