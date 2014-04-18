<article <?php post_class(); ?>>
	<?php
	if(has_post_thumbnail()){
		?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio-thumb'); ?></a>
		<?php
	}
	?>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php the_excerpt(); ?>
</article>