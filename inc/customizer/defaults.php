<?php
/**
 * academic customizer default options
 *
 * @package Academic
 * @since Academic 0.3
 */


/**
 * Returns the default options for Academic.
 *
 * @since Academic 0.3
 * @return array An array of default values
 */
function academic_get_default_theme_options() {
	$academic_default_options = array(
		// Color layout options
		'color_layout'           => '#347fe1',
		
		// Theme Options
		'loader_enable'         		=> false,
		'loader_icon'         			=> 'fa-spinner',
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'long_excerpt_length'           => 50,
		'read_more_text'		        => __( 'Read More', 'academic' ),
		'breadcrumb_enable'         	=> false,
		'breadcrumb_separator'         	=> '/',
		'pagination_enable'         	=> false,
		'pagination_type'         		=> 'default',
		'scroll_top_visible'        	=> true,
		'reset_options'      			=> false,
		'enable_frontpage_content' 		=> true,

		// slider
		'slider_enable'                 => 'disabled',
		'slider_content_effect'         => 'cubic-bezier(0.250, 0.250, 0.750, 0.750)',
		'slider_content_type'           => 'demo',
		'no_of_slider'                  => 2,
		'enable_slider_controls'        => true,
		'enable_slider_pager'           => true,
		'enable_slider_dragable'        => true,
		'slider_call_to_action'         => false,
		'slider_call_to_action_new_tab' => true,
		
		// about
		'about_section_enable'			=> 'disabled',


		// category blog two
		'category_blog_two_enable'		=> 'disabled',
		'category_blog_two_dragable'	=> true,
		'category_blog_two_autoplay'	=> true,
		'category_blog_two_title'		=> __( 'First Category Blog', 'academic' ),
		'category_blog_two_count'		=> 8,
		'category_blog_two_type'		=> 'recent-posts',
		'category_blog_two_layout'		=> 4,

		// category blog three
		'category_blog_three_enable'	=> 'disabled',
		'category_blog_three_dragable'	=> true,
		'category_blog_three_autoplay'	=> true,
		'category_blog_three_count'		=> 7,
		'category_blog_three_layout'	=> 6,
		'category_blog_three_title'		=> __( 'Second Category Blog', 'academic' ),
		'category_blog_three_sub_title'	=> __( 'How can we help you', 'academic' ),
		'category_blog_three_type'		=> 'category',
		'category_blog_three_icon'		=> 'fa-snapchat-ghost',

		// Partners
		'partner_enable'				=> 'disabled',
		'partner_title'					=> __( 'Our Partners', 'academic' ),
		'no_of_partner'					=> 3,
		'partner_layout'				=> 6,
		'partner_dragable'				=> true,
		'partner_autoplay'				=> true,

		// news letter
		'news_letter_enable'			=> 'disabled',
		'news_letter_title'				=> __( 'Stay Updated With University', 'academic' ),
		'news_letter_sub_title'			=> __( 'Lorem Ipsum roin gravida nibh vel', 'academic' ),

		// Contact info
		'contact_us_contact_info_title'			=> __( 'Contact Info', 'academic' ),
		'contact_us_contact_info_phone'			=> '+977-123456789',
		'contact_us_contact_info_address'		=> __( '28 Jackson Blvd Ste 1020 Chicago IL 60604-2340', 'academic' ),
		'contact_us_contact_info_email'			=> 'info@university.com',
		'contact_us_contact_map_title'			=> __( 'Location Map', 'academic' ),
		'contact_us_map_shortcode'=>'[gmap latitude="23.2012841" longitude="90.01247147" width="80%" map_type="ROADMAP" ]',
		'contact_us_form_shortcode'=>'[contact-form-7 id="1880" title="Contact form 1"]',

		// Schedule 
		'schedule_post_num'			=> 8,
	);

	$output = apply_filters( 'academic_default_theme_options', $academic_default_options );
	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}