<article <?php post_class(); ?>>
	
	<?php
	$featured = false;
	if(has_post_thumbnail()){
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail' );
		$url = get_field('url');
		$hasRepo = get_field('has_repo');
		$repoURL = get_field('repo_url');
		$repoType = get_field('repo_type');
		?>
		<div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')">
			<div class="overlay"></div>
			<h1><?php the_title(); ?></h1>
			<p><?php echo get_field('short_description'); ?></p>
			<?php
			if(!empty($url)){
				?>
				<a href="<?php echo $url; ?>" class="button large"><?php _e('View Site', 'chrishutchinson'); ?></a>
				<?php
			}
			if($hasRepo === true && !empty($repoURL)){
				switch($repoType){
					default:
						$string = __('View Repo', 'chrishutchinson');
						break;
					case 'github':
						$string = '<i class="fa fa-github"></i> ' . __('View on GitHub', 'chrishutchinson');
						break;
					case 'bitbucket':
						$string = '<i class="fa fa-bitbucket"></i> ' . __('View on BitBucket', 'chrishutchinson');
						break;
				}
				?>
				<a href="<?php echo $repoURL; ?>" class="button large"><?php echo $string; ?></a>
				<?php
			}
			?>
		</div>
		<?php
		$featured = true;
	}
	?>

	<div class="container">
		<?php
		if(!$featured){
			?><h1><?php the_title(); ?></h1><?php
		}

		$skills = wp_get_post_terms(get_the_ID(), 'skills');
		if(count($skills) > 0){
			?>
			<div class="panel">
				<h3><?php _e('Project Skills', 'chrishutchinson'); ?></h3>
				<ul class="skills">
					<?php
					foreach($skills as $key=>$skill){
						?>
						<li class="skill"><?php echo $skill->name; ?></li>
						<?php
					}
					?>
				</ul>
			</div>
			<?php
		}

		the_content();
		?>
	</div>
</article>