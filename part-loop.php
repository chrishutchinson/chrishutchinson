<article <?php post_class(); ?>>
	<div class="container">
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<span class="date"><i class="fa fa-calendar"></i> <a href="<?php the_permalink(); ?>"><?php echo the_date(); ?></a></span>
		<?php the_excerpt(); ?>
	</div>
</article>