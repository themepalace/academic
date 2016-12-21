<?php
/**
* Category Blog Three options
*
* @package Academic
* @since Academic 0.3
*/

// Add category blog three enable section
$wp_customize->add_section( 'academic_category_blog_three', array(
	'title'             => __('First Category Blog','academic'),
	'description'       => __( 'First Category Blog options.', 'academic' ),
	'panel'             => 'academic_sections_panel'
) );

// Add category blog three enable setting and control.
$wp_customize->add_setting( 'academic_theme_options[category_blog_three_enable]', array(
	'default'           => $options['category_blog_three_enable'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_three_enable]', array(
	'label'             => __( 'Enable on', 'academic' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'select',
	'choices'           => academic_enable_disable_options()
) );

// Add category blog three title.
$wp_customize->add_setting( 'academic_theme_options[category_blog_three_title]', array(
	'default'           => $options['category_blog_three_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_three_title]', array(
	'label'             => __( 'Title', 'academic' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'text',
	'active_callback'	=> 'academic_category_blog_three_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_theme_options[category_blog_three_title]', array(
		'selector'            => '#popular-courses .entry-header .entry-title',
		'render_callback'     => 'academic_partial_category_blog_three_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add category blog three slider dragable.
$wp_customize->add_setting( 'academic_theme_options[category_blog_three_dragable]', array(
	'default'           => $options['category_blog_three_dragable'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_three_dragable]', array(
	'label'             => __( 'Enable Slide Dragable', 'academic' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_category_blog_three_active'
) );

// Add category blog three slider auto play.
$wp_customize->add_setting( 'academic_theme_options[category_blog_three_autoplay]', array(
	'default'           => $options['category_blog_three_autoplay'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_three_autoplay]', array(
	'label'             => __( 'Enable Slide Auto Slide', 'academic' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_category_blog_three_active'
) );

// Add category blog three layout.
$wp_customize->add_setting( 'academic_theme_options[category_blog_three_layout]', array(
	'default'           => $options['category_blog_three_layout'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_three_layout]', array(
	'label'             => __( 'Layout', 'academic' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'select',
	'choices'           => academic_category_blog_three_layout(),
	'active_callback'	=> 'academic_category_blog_three_active'
) );

// Add category blog three layout.
$wp_customize->add_setting( 'academic_theme_options[category_blog_three_type]', array(
	'default'           => $options['category_blog_three_type'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_three_type]', array(
	'label'             => __( 'Content Type', 'academic' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'select',
	'choices'           => academic_category_blog_three_type(),
	'active_callback'	=> 'academic_category_blog_three_active'
) );

// Add category blog three icon
$wp_customize->add_setting( 'academic_theme_options[category_blog_three_icon]', array(
	'default'           => $options['category_blog_three_icon'],
	'sanitize_callback' => 'sanitize_text_field'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_three_icon]', array(
	'label'             => __( 'Icon', 'academic' ),
	'description'           => sprintf( __( 'Use font awesome icon: Eg: %s. %sSee more here%s', 'academic' ), 'fa-desktop','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'text',
	'active_callback'	=> 'academic_category_blog_three_active'
) );

// Add category blog three type category setting and control
$wp_customize->add_setting(  'academic_theme_options[category_blog_three_parent_category]', array(
	'sanitize_callback' => 'absint',
) ) ;

$wp_customize->add_control( new academic_Dropdown_Taxonomies_Control ( $wp_customize,'academic_theme_options[category_blog_three_parent_category]', array(
	'label'             => __( 'Select Parent Category', 'academic' ),
	'section'           => 'academic_category_blog_three',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'academic_category_blog_three_sub_category'
) ) );
