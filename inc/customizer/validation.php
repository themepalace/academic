<?php
/**
* Customizer validation functions
*
* @package Academic
* @since Academic 0.3
*/

/**
 * Check the value of long excerpt
 *
 * @since Academic 0.3
 * @return string A source value for use
 */
function academic_validate_long_excerpt( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
    $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
  } elseif ( $value < 5 ) {
    $validity->add( 'min_no_of_words', __( 'Minimum no of words is 5', 'academic' ) );
  } elseif ( $value > 100 ) {
    $validity->add( 'max_no_of_words', __( 'Maximum no of words is 100', 'academic' ) );
  }
  return $validity;
}


/**
 * Check the value of short excerpt
 *
 * @since Academic 0.3
 * @return string A source value for use
 */
function academic_validate_short_excerpt( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
    $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
  } elseif ( $value < 5 ) {
    $validity->add( 'min_no_of_words', __( 'Minimum no of words is 5', 'academic' ) );
  } elseif ( $value > 25 ) {
    $validity->add( 'max_no_of_words', __( 'Maximum no of words is 25', 'academic' ) );
  }
  return $validity;
}


/**
 * Check the value of the Sections->Tob Bar->Number of Fields
 *
 * @since Academic 0.3
 *
 * @param obj $validity A source size value for use in a 'sizes' attribute.
 * @param int $value    Value passed in the input field
 *
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function academic_top_bar_field_number( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
      $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
  } elseif ( $value < 1 ) {
      $validity->add( 'min_value', __( 'Minimum value is 1', 'academic' ) );
  } elseif ( $value > 3 ) {
      $validity->add( 'max_value', __( 'Maximum value is 3', 'academic' ) );
  }
  return $validity;
}


/**
 * Check the value for number of slider to show
 *
 * @since Academic 0.3
 * @return string A source value for use
 */
function academic_validate_no_of_slider( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', __( 'Minimum no of slide is 1', 'academic' ) );
   } elseif ( $value > 5 ) {
       $validity->add( 'max_no_of_words', __( 'Maximum no of slide is 5', 'academic' ) );
   }
   return $validity;
}

/**
 * About section statistics 
 * 
 * @since Academic 0.3
 * @return validation for max and min no of statistics details
 */
function academic_validate_no_of_about_statistics( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', __( 'Minimum no of statistics is 1', 'academic' ) );
   } elseif ( $value > 6 ) {
       $validity->add( 'max_no_of_words', __( 'Maximum no of statistics is 6', 'academic' ) );
   }
   return $validity;
}


/**
 * Category four blog number of posts validation
 * @return validation for max and min no of statistics details
 */
function academic_validate_cat_blog_four_post_num_range( $validity, $value ){
  $value = intval( $value );
  if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
  } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_posts', __( 'Minimum number of posts is 1', 'academic' ) );
  } elseif ( $value > 15 ) {
       $validity->add( 'max_no_of_posts', __( 'Maximum number of posts is 15', 'academic' ) );
  }
  return $validity;
}


/**
 * category blog one no. of articels
 * 
 * @since Academic 0.3
 * @return validation for max and min no of articles
 */
function academic_validate_category_blog_one_count( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', __( 'Minimum no of article is 1', 'academic' ) );
   } elseif ( $value > 12 ) {
       $validity->add( 'max_no_of_words', __( 'Maximum no of articles is 12', 'academic' ) );
   }
   return $validity;
}

/**
 * category blog two no. of articels
 * 
 * @since Academic 0.3
 * @return validation for max and min no of articles
 */
function academic_validate_category_blog_two_count( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', __( 'Minimum no of article is 1', 'academic' ) );
   } elseif ( $value > 12 ) {
       $validity->add( 'max_no_of_words', __( 'Maximum no of articles is 12', 'academic' ) );
   }
   return $validity;
}


/**
 * partners no. of list
 * 
 * @since Academic 0.3
 * @return validation for max and min no of Lists
 */
function academic_validate_partner_count( $validity, $value ){
       $value = intval( $value );
   if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', __( 'You must supply a valid number.', 'academic' ) );
   } elseif ( $value < 1 ) {
       $validity->add( 'min_no_of_words', __( 'Minimum no of list is 1', 'academic' ) );
   } elseif ( $value > 15 ) {
       $validity->add( 'max_no_of_words', __( 'Maximum no of Lists is 15', 'academic' ) );
   }
   return $validity;
}