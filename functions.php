<?php
/**
 * krzeminski.net functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package krzeminski.net
 */

if ( ! function_exists( 'krzeminski_net_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function krzeminski_net_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on krzeminski.net, use a find and replace
	 * to change 'krzeminski-net' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'krzeminski-net', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'krzeminski-net' ),
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
	add_theme_support( 'custom-background', apply_filters( 'krzeminski_net_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'krzeminski_net_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function krzeminski_net_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'krzeminski_net_content_width', 640 );
}
add_action( 'after_setup_theme', 'krzeminski_net_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function krzeminski_net_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'krzeminski-net' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'krzeminski-net' ),
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'krzeminski_net_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function krzeminski_net_scripts() {
	wp_enqueue_style( 'krzeminski-net-style', get_stylesheet_uri() );

	wp_enqueue_script( 'krzeminski-net-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'krzeminski-net-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '', true );
    wp_enqueue_script( 'krzeminski-net-app', get_template_directory_uri() . '/js/app.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'krzeminski_net_scripts' );

add_image_size( 'portfolio-thumb', 400, 300, array('center', 'top'));

add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

// REMOVE EMOJI ICONS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Add the AMP analytics script to head of AMP pages
 */
function isa_amp_scripts( $data ) {
    $data['amp_component_scripts']['amp-analytics'] = 'https://cdn.ampproject.org/v0/amp-analytics-0.1.js';
    return $data;
}
add_filter( 'amp_post_template_data', 'isa_amp_scripts' );

/**
 * Add amp-analytics to the amp post template footer
 */
function isa_amp_analytics( $amp_template ) {
    ?><amp-analytics type="googleanalytics">
    <script type="application/json">
    {
      "vars": {
        "account": "UA-21641725-18"
      },
      "triggers": {
        "trackPageview": {
          "on": "visible",
          "request": "pageview"
        }
      }
    }
    </script>
    </amp-analytics><?php
}
add_action( 'amp_post_template_footer', 'isa_amp_analytics' );

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
