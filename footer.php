	</div> <!-- / div#main -->

<footer id="footer">
	<div class="face"><img src="<?php echo get_template_directory_uri(); ?>/images/chris.png" width="100" height="100"></div>
	
	<div class="container">

		<?php
		if(is_active_sidebar('footer-column-1')) {
			?>
			<ul class="sidebar column-1">
				<?php dynamic_sidebar('footer-column-1'); ?>
			</ul>
			<?php
		}
		?>

		<?php
		if(is_active_sidebar('footer-column-2')) {
			?>
			<ul class="sidebar column-2">
				<?php dynamic_sidebar('footer-column-2'); ?>
			</ul>
			<?php
		}
		?>

	</div>

</footer>


<?php wp_footer(); ?>
</body>
</html>