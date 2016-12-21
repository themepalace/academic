<?php
/**
 * academic options
 *
 * @package Academic
 * @since Academic 0.3
 */

/**
 * Site Layout
 * @return array site layout options
 */
function academic_site_layout() {
  $academic_site_layout = array(
    'wide'  => __( 'Wide', 'academic' ),
    'boxed' => __( 'Boxed', 'academic' ),
  );

  $output = apply_filters( 'academic_site_layout', $academic_site_layout );

  return $output;
}

/**
 * Sidebar position
 * @return array Sidbar positions
 */
function academic_sidebar_position() {
  $academic_sidebar_position = array(
    'right-sidebar' => __( 'Right', 'academic' ),
    'left-sidebar'  => __( 'Left', 'academic' ),
    'no-sidebar'    => __( 'No Sidebar', 'academic' ),
  );

  $output = apply_filters( 'academic_sidebar_position', $academic_sidebar_position );

  return $output;
}

/**
 * Header image options
 * @return array Header image options
 */
function academic_header_image() {
  $academic_header_image = array(
    'enable' => __( 'Enable( Featured Image )', 'academic' ),
    'show-both' => __( 'Show Both( Featured and Header Image )', 'academic' ),
    'disable'  => __( 'Disable', 'academic' ),
  );

  $output = apply_filters( 'academic_header_image', $academic_header_image );

  return $output;
}

/**
 * Pagination
 * @return array site pagination options
 */
function academic_pagination_options() {
  $academic_pagination_options = array(
    'numeric'=> __( 'Numeric', 'academic' ),
    'default'=> __( 'Default(Older/Newer)', 'academic' ),
  );
  if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
        $academic_pagination_options['infinite-click'] = 'Infinite Click';
        $academic_pagination_options['infinite-scroll'] = 'Infinite Scroll';
    }

  $output = apply_filters( 'academic_pagination_options', $academic_pagination_options );

  return $output;
}


/**
 * Slider
 * @return array slider options
 */
function academic_enable_disable_options() {
  $academic_enable_disable_options = array(
    'static-frontpage'  => __( 'Static Frontpage', 'academic' ),
    'disabled'          => __( 'Disabled', 'academic' ),
  );

  $output = apply_filters( 'academic_enable_disable_options', $academic_enable_disable_options );

  return $output;
}


/**
 * Enabling options
 * @return array Enable options
 */
function academic_enable_entire_option() {
  $academic_enable_entire_option = array(
    'static-frontpage'  => __( 'Static Frontpage', 'academic' ),
    'disabled'          => __( 'Disabled', 'academic' ),
    'entire-site'          => __( 'Entrie Site', 'academic' ),
  );

  $output = apply_filters( 'academic_enable_entire_option', $academic_enable_entire_option );

  return $output;
}


/**
 * Slider effects
 * @return array Slider effects
 */
function academic_slider_effect() {
  $academic_slider_effect = array(
    'fade'                                        => __( 'Fade', 'academic' ),
    'cubic-bezier(0.250, 0.250, 0.750, 0.750)'    => __( 'Linear', 'academic' ),
  );

  $output =  apply_filters( 'academic_slider_effect', $academic_slider_effect );

  // Sort array in ascending order, according to the key:
  if ( ! empty( $output ) ) {
    ksort( $output );
  }

  return $output;
}



/**
 * Category blog two content type
 * @return array Category blog two content type options
 */
function academic_category_blog_two_type() {
  $academic_category_blog_two_type = array(
    'multiple-category' => __( 'Multiple Category', 'academic' ),
    'recent-posts'      => __( 'Recent Posts', 'academic' ),
  );

  $output = apply_filters( 'academic_category_blog_two_type', $academic_category_blog_two_type );

  return $output;
}

/**
 * Category blog two content layout
 * @return array Category blog two content type options
 */
function academic_category_blog_two_layout() {
  $academic_category_blog_two_layout = array(
    3  => __( '3 Column', 'academic' ),
    4  => __( '4 Column', 'academic' ),
  );

  $output = apply_filters( 'academic_category_blog_two_layout', $academic_category_blog_two_layout );

  return $output;
}


/**
 * Category blog three content layout
 * @return array Category blog three content type options
 */
function academic_category_blog_three_layout() {
  $academic_category_blog_three_layout = array(
    4  => __( '4 Column', 'academic' ),
    5  => __( '5 Column', 'academic' ),
    6  => __( '6 Column', 'academic' ),
  );

  $output = apply_filters( 'academic_category_blog_three_layout', $academic_category_blog_three_layout );

  return $output;
}

/**
 * Category blog three content type
 * @return array Category blog three content type options
 */
function academic_category_blog_three_type() {
  $academic_category_blog_three_type = array(
    'category'          => __( 'Categories', 'academic' ),
    'sub-category'      => __( 'Sub Categories', 'academic' ),
  );

  $output = apply_filters( 'academic_category_blog_three_type', $academic_category_blog_three_type );

  return $output;
}