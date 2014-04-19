<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php
	wp_head();
	?>
</head>
<body <?php body_class(array('spacing')); ?>>
	<header id="header">
		<nav id="navigation" class="bg">
			<ul class="menu">
				<li>
					<a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i> <?php echo get_bloginfo('name'); ?></a>
				</li>
			</ul>

			<?php
			wp_nav_menu(array(
				'menu' => 'header',
				'container' => false,
				'menu_class' => 'menu links',
			));
			?>

			<div id="mobile-menu">
				<a href="#" data-action="toggleMenu">
					Menu <i class="fa fa-bars"></i>
				</a>
			</div>
		</nav>
	</header>

	<?php
	if(is_home() || is_front_page()){
		?>
		<header id="hero">
			<h1><?php echo get_bloginfo('name'); ?></h1>
			<?php
			$siteDescription = get_bloginfo('description');
			if(!empty($siteDescription)){
				?>
				<p><?php echo get_bloginfo('description'); ?></p>
				<?php
			}
			?>
		</header>
		<?php
	}

	if(is_post_type_archive('portfolio')){
		?>
		<header id="hero">
			<h1><?php _e('Portfolio', 'chrishutchinson'); ?></h1>
		</header>
		<?php
	} elseif(is_archive()){
		?>
		<header id="hero">
			<h1><?php _e('Blog', 'chrishutchinson'); ?></h1>
		</header>
		<?php
	}

	?>

	<div id="main">