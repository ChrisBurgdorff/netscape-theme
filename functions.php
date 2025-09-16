<?php
/**
 * netscape functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package netscape
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function netscape_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on netscape, use a find and replace
		* to change 'netscape' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'netscape', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'netscape' ),
			'secondary' => __( 'Secondary Menu', 'netscape' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'netscape_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'netscape_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function netscape_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'netscape_content_width', 640 );
}
add_action( 'after_setup_theme', 'netscape_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function netscape_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Left Sidebar', 'netscape' ),
		'id'            => 'left-sidebar',
		'description'   => __( 'Widgets in this area will show in the left sidebar.', 'netscape' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
			'name'          => __( 'Right Sidebar', 'netscape' ),
			'id'            => 'right-sidebar',
			'description'   => __( 'Widgets in this area will show in the right sidebar.', 'netscape' ),
			'before_widget' => '<div class="sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', 'netscape_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function netscape_scripts() {
	wp_enqueue_style( 'netscape-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'netscape-style', 'rtl', 'replace' );

	wp_enqueue_script( 'netscape-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'netscape_scripts' );

/**
 * Implement custom hit counter
 */
function geo_counter_display( $atts ) {
	$atts = shortcode_atts( array(
			'number' => 0,
			'digits' => 6,
	), $atts, 'geo_counter' );

	$num = str_pad( intval( $atts['number'] ), intval( $atts['digits'] ), '0', STR_PAD_LEFT );

	return '<div class="geo-counter">
						<span class="geo-label">You are Visitor Number: </span>
						<span class="geo-digits">' . esc_html( $num ) . '</span>
					</div>';
}
add_shortcode( 'geo_counter', 'geo_counter_display' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

