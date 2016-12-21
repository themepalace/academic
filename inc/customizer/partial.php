<?php
/**
 * Customizer Partial Functions
 *
 * @package Theme_Palace
 * @since Academic 0.3
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Academic 0.3
 *
 * @return void
 */
function academic_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Academic 0.3
 *
 * @return void
 */
function academic_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render the category blog two title for the selective refresh partial.
 *
 * @since Academic 0.3
 * @return string
 */
function academic_partial_category_blog_two_title() {
	$options = academic_get_theme_options();
	return $options['category_blog_two_title'];
}

/**
 * Render the category blog three title for the selective refresh partial.
 *
 * @since Academic 0.3
 * @return string
 */
function academic_partial_category_blog_three_title() {
	$options = academic_get_theme_options();
	return $options['category_blog_three_title'];
}


/**
 * Render the partners title for the selective refresh partial.
 *
 * @since Academic 0.3
 * @return string
 */
function academic_partial_partner_title() {
	$options = academic_get_theme_options();
	return $options['partner_title'];
}
