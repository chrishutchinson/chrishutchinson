<article <?php post_class(); ?>>
	
	<?php
	$featured = false;
	if(has_post_thumbnail()){
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail' );
		?>
		<div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')">
			<div class="overlay"></div>
			<h1><?php the_title(); ?></h1>
		</div>
		<?php
		$featured = true;
	}
	?>

	<div class="container">
		<?php
		if(!$featured && !is_front_page()){
			?><h1><?php the_title(); ?></h1><?php
		}

		if(!is_front_page()){
			?><span class="date"><i class="fa fa-calendar"></i> <?php the_date(); ?></span><?php
		}
		?>
		<?php
		the_content();
		
		wp_link_pages();
		?>
	</div>
</article>