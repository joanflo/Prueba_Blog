

<div id="cos">
				
				
	<?php echo validation_errors(); ?>
	
	<?php echo form_open('posts/create') ?>
		<div class="post_completo">
			
			<div class="campo_formulario">
	            <div class="texto_campo">
	                <p class="texto_formulario_grande">Título</p>
	                <p class="texto_formulario_peque">Título del post.</p>
	            </div>
	            <input class="campo_formulario" type="input" name="titulo" id="titulo" value="">
	        </div>
			
			<div class="campo_formulario">
	            <div class="texto_campo">
	                <p class="texto_formulario_grande">Contenido</p>
	                <p class="texto_formulario_peque">Agrega el contenido del post. Los posts con contenido inapropiado serán censurados.</p>
	            </div>
	            <textarea rows="8" class="campo_formulario" name="contenido" id="contenido"></textarea> 
	        </div>
	        
	        <input class="boton_generico boton2" type="submit" name="submit" value="Enviar" />
	        
		</div>
	</form>
	
</div>

</form>