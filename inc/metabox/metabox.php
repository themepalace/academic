<?php
/**
 * Academic metabox file.
 *
 * This is the template that includes all the other files for metaboxes of Academic theme
 *
 * @package Theme Palace
 * @since Academic 0.3
 */

// Include slider layout meta
require get_template_directory() . '/inc/metabox/sidebar-layout.php';

// Include header image meta
require get_template_directory() . '/inc/metabox/header-image.php';

/**
 * Adds meta box to the post editing screen
 */
function academic_custom_meta() {
	// Sidebar layout meta
    add_meta_box( 'academic_sidebar_layout_meta', __( 'Sidebar Layout', 'academic' ), 'academic_sidebar_position_callback', array( 'post', 'page', 'jetpack-testimonial' ) );
	
	// Header image meta
    add_meta_box( 'academic_header_image', __( 'Header Image', 'academic' ), 'academic_header_image_callback', array( 'post', 'page' ) );
}
add_action( 'add_meta_boxes', 'academic_custom_meta' );


