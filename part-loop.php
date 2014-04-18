<article <?php post_class(); ?>>
	<div class="container">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<p><i class="fa fa-calendar"></i> <a href="<?php the_permalink(); ?>"><?php echo the_date(); ?></a></p>
		<?php the_excerpt(); ?>
	</div>
</article>