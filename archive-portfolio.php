<?php
get_header();
?>

<section class="archive portfolio">
	<div class="container">
		<?php
		if(have_posts()){
			while(have_posts()){
				the_post();
				get_template_part('part', 'portfolio-loop');
			}
		}
		?>
		
		<nav class="pagination">
			<?php
			global $wp_query;

			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
			?>
		</nav>
	</div>
</section>

<?php
get_footer();
?>