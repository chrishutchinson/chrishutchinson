<?php
get_header();
?>

<section class="single">
	<?php
	if(have_posts()){
		while(have_posts()){
			the_post();
			get_template_part('part', 'portfolio');
			get_template_part('part', 'comments');
		}
	}
	?>
</section>

<?php
get_footer();
?>