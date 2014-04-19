<?php
/**
 * Theme: Chris Hutchinson
 * URL: http://github.com/chrishutchinson/chris-hutchinson
 * Class: chrisHutchinsonTheme
 */
class chrisHutchinsonTheme {
	/**
	 * Setup
	 */
	function chrisHutchinsonTheme() {
		global $content_width;

		// Setup some theme defaults
		$this->theme = new stdClass;
		$this->theme->name = 'chris-hutchinson';
		$this->theme->display = 'Chris Hutchinson';
		$this->theme->version = '1.0.0';

		// The content width
		if(!$content_width){
			$content_width = 800;
		}

		// Post Thumbnails
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1280, 500, true);
		add_image_size('portfolio-thumb', 220, 220, true);

		// HTML5
		add_theme_support('html5');

		// Feed Links
		add_theme_support('automatic-feed-links');

		// Image Sizes
		// add_image_size();

		// Menus
		register_nav_menus(array(
			'header' => 'Main Navigation',
			'sitemap' => 'Site Map',
		));

		// Actions
		add_action('wp_enqueue_scripts', array(&$this, 'frontendJSAndCSS'));
		add_action('wp_head', array(&$this, 'addGoogleFonts'));
		add_action('init', array(&$this, 'registerCustomPostTypes'));
		add_action('widgets_init', array(&$this, 'registerCustomSidebars'));

		// Filters
		add_filter('excerpt_more', array(&$this, 'excerptMore'));

	}

	function excerptMore(){
		global $post;
		return '<a class="moretag" href="'. get_permalink($post->ID) . '">...read more</a>';
	}


	function frontendJSAndCSS() {
		// JS
		if(WP_DEBUG == true){ // If debug is enabled in wp-config, load the unminified version
			wp_enqueue_script($this->theme->name.'-ui', get_template_directory_uri().'/js/ui.js', array('jquery'), $this->theme->version, true);
		} else { // Otherwise load up the minified JS
			wp_enqueue_script($this->theme->name.'-ui', get_template_directory_uri().'/js/min/ui-ck.js', array('jquery'), $this->theme->version, true);
		}

		// CSS
		wp_enqueue_style($this->theme->name.'-frontend', get_template_directory_uri().'/css/frontend.css');
		wp_enqueue_style($this->theme->name.'-font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
	}

	function addGoogleFonts() {
		?>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700|Lora:400,700' rel='stylesheet' type='text/css'>
		<?php
	}

	function registerCustomPostTypes(){
		register_post_type('portfolio', array(
			'labels'             => array(
				'name'               => __('Portfolio', $this->theme->name),
				'singular_name'      => __('Project', $this->theme->name),
				'menu_name'          => __('Portfolio', $this->theme->name),
				'name_admin_bar'     => __('Project', $this->theme->name),
				'add_new'            => __('Add New', $this->theme->name),
				'add_new_item'       => __('Add New Project', $this->theme->name),
				'new_item'           => __('New Project', $this->theme->name),
				'edit_item'          => __('Edit Project', $this->theme->name),
				'view_item'          => __('View Project', $this->theme->name),
				'all_items'          => __('All Projects', $this->theme->name),
				'search_items'       => __('Search Projects', $this->theme->name),
				'parent_item_colon'  => __('Parent Projects:', $this->theme->name),
				'not_found'          => __('No projects found.', $this->theme->name),
				'not_found_in_trash' => __('No projects found in Trash.', $this->theme->name),
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array('slug' => 'portfolio'),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
		));

		register_taxonomy(
			'skills',
			'portfolio',
			array(
				'label' => __('Skills'),
				'labels' => array(
					'name'                       => __('Skills', $this->theme->name),
					'singular_name'              => __('Skill', $this->theme->name),
					'search_items'               => __('Search Skills', $this->theme->name),
					'popular_items'              => __('Popular Skills', $this->theme->name),
					'all_items'                  => __('All Skills', $this->theme->name),
					'parent_item'                => null,
					'parent_item_colon'          => null,
					'edit_item'                  => __('Edit Skill', $this->theme->name),
					'update_item'                => __('Update Skill', $this->theme->name),
					'add_new_item'               => __('Add New Skill', $this->theme->name),
					'new_item_name'              => __('New Skill Name', $this->theme->name),
					'separate_items_with_commas' => __('Separate skills with commas', $this->theme->name),
					'add_or_remove_items'        => __('Add or remove skills', $this->theme->name),
					'choose_from_most_used'      => __('Choose from the most used skills', $this->theme->name),
					'not_found'                  => __('No skills found.', $this->theme->name),
					'menu_name'                  => __('Skills', $this->theme->name),
				),
				'rewrite' => array('slug' => 'skill'),
			)
		);
	}

	function registerCustomSidebars() {
		register_sidebar(array(
			'name' => __('Footer Column 1', $this->theme->name),
			'id' => 'footer-column-1',
			'description' => 'The First Footer Column',
		));
		register_sidebar(array(
			'name' => __('Footer Column 2', $this->theme->name),
			'id' => 'footer-column-2',
			'description' => 'The Second Footer Column',
		));
	}
}

// Initialise
$chrisHutchinsonTheme = new chrisHutchinsonTheme();