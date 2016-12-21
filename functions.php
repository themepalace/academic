<?php
/**
 * Academic functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Academic
 */

if ( ! function_exists( 'academic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function academic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Academic, use a find and replace
	 * to change 'academic' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'academic', get_template_directory() . '/languages' );

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
	add_image_size( 'academic-category-image', 450, 338, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'academic' ),
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
	add_theme_support( 'custom-background', apply_filters( 'academic_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// This setup supports logo, site-title & site-description
	add_theme_support( 'custom-logo', array(
		'height'      => 70,
		'width'       => 120,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', academic_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'academic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function academic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'academic_content_width', 640 );
}
add_action( 'after_setup_theme', 'academic_content_width', 0 );


if ( ! function_exists( 'academic_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 */
function academic_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'academic' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'academic' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Courgette, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Courgette font: on or off', 'academic' ) ) {
		$fonts[] = 'Courgette:400';
	}

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'academic' ) ) {
		$fonts[] = 'Roboto:400,500,300';
	}

	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'academic' ) ) {
		$fonts[] = 'Raleway:400,100,300,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'academic' ) ) {
		$fonts[] = 'Poppins:400,500,600';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function academic_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'academic-fonts', academic_fonts_url(), array(), null );

	// Add font awesome css
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/plugins/css/font-awesome.min.css', array(), '4.6.3' );

	// Add slick css
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/plugins/css/slick.min.css', array(), '1.6.0' );

	// Add slick theme css
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/plugins/css/slick-theme.min.css', array(), '1.6.0' );

	// Add sidr light css
	wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri() . '/assets/plugins/css/jquery-sidr-light.min.css', array(), '' );

	// Add lightbox css
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/assets/plugins/css/lightbox.min.css', array(), '2.7.1' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'academic-style', get_stylesheet_uri() );

	// Load sidr
	wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/assets/plugins/js/jquery-sidr.min.js', array( 'jquery' ), '', true );

	// Load slick jquery
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/plugins/js/slick.min.js', array(), '1.6.0', true );

	// Load smoothscroll
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/plugins/js/smoothscroll.min.js', array(), '0.9.9', true );

	// Load lightbox
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/assets/plugins/js/lightbox.min.js', array(), '2.8.2', true );

	// Load waypoints
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/plugins/js/waypoints.min.js', array(), '4.0.0',true );

	// Load custom js
	wp_enqueue_script( 'academic-custom', get_template_directory_uri() . '/assets/js/custom.min.js', array(), '',true );

	// Load animation js
	wp_enqueue_script( 'academic-animation', get_template_directory_uri() . '/assets/js/animation.min.js', array(), '',true );

	wp_enqueue_script( 'academic-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), '20151215', true );

	// Load the html5 shiv.
	wp_enqueue_script( 'academic-html5', get_template_directory_uri() . '/assets/js/html5.min.js', array(), '3.7.3' );
	wp_script_add_data( 'academic-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'academic-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'academic_scripts' );

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load core file
 */
require get_template_directory() . '/inc/core.php';

/*
*Register gallery thumbnail size to media.
*/
function academic_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'academic-category-image' 		=> __( 'Gallery Thumbnail', 'academic' ),
    ) );
}
add_filter( 'image_size_names_choose', 'academic_custom_sizes' );
