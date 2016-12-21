<?php
/**
 * Academic core file.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @since Academic 0.3
 */

/**
 * Include options function.
 */
require get_template_directory() . '/inc/options.php';


// Load customizer defaults values
require get_template_directory() . '/inc/customizer/defaults.php';


/**
 * Merge values from default options array and values from customizer
 *
 * @return array Values returned from customizer
 * @since Academic 0.3
 */
function academic_get_theme_options() {
  $academic_default_options = academic_get_default_theme_options();

  return array_merge( $academic_default_options , get_theme_mod( 'academic_theme_options', $academic_default_options ) ) ;
}


/**
  * Write message for featured image upload
  *
  * @return array Values returned from customizer
  * @since Academic 0.3
*/
function academic_slider_image_instruction( $content, $post_id ) {
  $allowed = array( 'page' );
  if ( in_array( get_post_type( $post_id ), $allowed ) ) {
    return $content .= '<p><b>' . __( 'Note', 'academic' ) . ':</b>' . __( ' The recommended size for image is 1170px by 500px while using it for slider', 'academic' ) . '</p>';
  } 
  return $content;
}
add_filter( 'admin_post_thumbnail_html', 'academic_slider_image_instruction', 10, 2);

/**
 * Add helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Add structural hooks.
 */
require get_template_directory() . '/inc/structure.php';

/**
 * Add metabox
 */
require get_template_directory() . '/inc/metabox/metabox.php';

/**
 * modules additions.
 */
require get_template_directory() . '/inc/modules/modules.php';

/**
 * Custom widget additions.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load woocommerce compatibility file.
 */
require get_template_directory() . '/inc/woocommerce.php';
