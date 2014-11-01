<?php foreach ($posts as $posts_item): ?>

    <h2>
    	<?php echo $posts_item['titulo'] ?>
    </h2>
    <div class="main">
        <?php echo $posts_item['contenido'] ?>
    </div>
    <p><a href="posts/<?php echo $posts_item['id_post'] ?>">Ver post</a></p>

<?php endforeach ?>