<?php
/**
 * Test Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Test_Theme
 */

if ( ! function_exists( 'test_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function test_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Test Theme, use a find and replace
	 * to change 'test' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'test' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'test' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'test' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'test_widgets_init' );

/**
 * Register scripts for later use.
 */
function test_register_scripts()  {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		// Load the copy of jQuery that comes with WordPress
		// The last parameter set to TRUE states that it should be loaded in the footer.
		wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, FALSE, TRUE);
	}
}
add_action('init', 'test_register_scripts');

/**
 * Enqueue scripts and styles.
 */
function test_scripts() {
	wp_enqueue_style( 'test-style', get_stylesheet_uri() );

	wp_enqueue_script( 'test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'test-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'flickity-library', get_template_directory_uri() . '/js/min/flickity-min.js', array('jquery'), NULL, true );

	wp_enqueue_script( 'testimonial-carousel', get_template_directory_uri() . '/js/min/testimonial-carousel-min.js', array('flickity-library'), NULL, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_scripts' );


// Register Custom Post Type
function test_create_custom_post_type() {

	$labels = array(
		'name'                  => 'Testimonials',
		'singular_name'         => 'Testimonial',
		'menu_name'             => 'Testimonials',
		'name_admin_bar'        => 'Testimonials',
		'archives'              => 'Testimonials Archives',
		'attributes'            => 'Testimonials Attributes',
		'parent_item_colon'     => 'Parent Item: Testimonials',
		'all_items'             => 'All Testimonials',
		'add_new_item'          => 'Add New Testimonial',
		'add_new'               => 'Add New Testimonial',
		'new_item'              => 'New Testimonial',
		'edit_item'             => 'Edit Testimonial',
		'update_item'           => 'Update Testimonial',
		'view_item'             => 'View Testimonial',
		'view_items'            => 'View Testimonials',
		'search_items'          => 'Search Testimonials',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$rewrite = array(
		'slug'                  => 'testimonial',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => 'Testimonial',
		'description'           => 'Testimonial Section',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions' ),
		'taxonomies'            => array( 'testimonial' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-testimonial',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var'             => 'testimonial',
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'test_create_custom_post_type', 0 );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Associates Settings',
		'menu_title'	=> 'Associates Settings',
		'menu_slug' 	=> 'associates-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position'      => '6.2',
		'icon_url'     => 'dashicons-universal-access-alt',
	));

}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * For displaying the Homepage Header.
 */
require get_template_directory() . '/inc/homepage-header.php';

/**
 * For displaying the Homepage Header.
 */
require get_template_directory() . '/inc/flexible-content-module.php';

/**
 * Section Modules.
 */
require get_template_directory() . '/inc/acf-color-content-section.php';
require get_template_directory() . '/inc/acf-simple-content-section.php';
require get_template_directory() . '/inc/acf-advanced-content-section.php';
require get_template_directory() . '/inc/acf-mid-page-navigation-section.php';
require get_template_directory() . '/inc/acf-testimonial-section.php';
require get_template_directory() . '/inc/acf-associates-section.php';


/**
 * Blog page functions.
 */

// function custom_excerpt_length( $length ) {
// 	return 20;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );