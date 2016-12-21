<?php
/**
 * Academic widgets inclusion
 *
 * This is the template that includes all custom widgets of Academic
 *
 * @package Theme Palace
 * @subpackage academic
 * @since Academic 0.3
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function academic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'academic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'academic' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	for ($i=1; $i < 4; $i++) { 
		register_sidebar( array(
			'name'          => esc_html__( 'Footer ', 'academic' ).$i,
			'id'            => 'footer-'.$i,
			'description'   => esc_html__( 'Add footer widgets here.', 'academic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'academic_widgets_init' );

/**
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/recent-posts.php';

/**
 * Include Social Link widget file
 */
require get_template_directory() . '/inc/widgets/social-link.php';

/**
 * Register widgets
 */
add_action( 'widgets_init', function() {

	// Register Recent Post widget
	register_widget( 'Academic_Recent_Posts' );

	// Register Social Link widget
	register_widget( 'Academic_Social_Link' );

});
