<?php
/**
* Category Blog Two options
*
* @package Academic
* @since Academic 0.3
*/

// Add category blog two enable section
$wp_customize->add_section( 'academic_category_blog_two', array(
	'title'             => __('Second Category Blog','academic'),
	'description'       => __( 'Second Category Blog options.', 'academic' ),
	'panel'             => 'academic_sections_panel'
) );

// Add category blog two enable setting and control.
$wp_customize->add_setting( 'academic_theme_options[category_blog_two_enable]', array(
	'default'           => $options['category_blog_two_enable'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_two_enable]', array(
	'label'             => __( 'Enable on', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'select',
	'choices'           => academic_enable_disable_options()
) );

// Add category blog two title.
$wp_customize->add_setting( 'academic_theme_options[category_blog_two_title]', array(
	'default'           => $options['category_blog_two_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_two_title]', array(
	'label'             => __( 'Title', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'text',
	'active_callback'	=> 'academic_category_blog_two_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_theme_options[category_blog_two_title]', array(
		'selector'            => '#recent-news .entry-header .entry-title',
		'render_callback'     => 'academic_partial_category_blog_two_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add category blog two slider dragable.
$wp_customize->add_setting( 'academic_theme_options[category_blog_two_dragable]', array(
	'default'           => $options['category_blog_two_dragable'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_two_dragable]', array(
	'label'             => __( 'Enable Slide Dragable', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_category_blog_two_active'
) );

// Add category blog two slider auto play.
$wp_customize->add_setting( 'academic_theme_options[category_blog_two_autoplay]', array(
	'default'           => $options['category_blog_two_autoplay'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_two_autoplay]', array(
	'label'             => __( 'Enable Auto Slide', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_category_blog_two_active'
) );

// Add category blog two count.
$wp_customize->add_setting( 'academic_theme_options[category_blog_two_count]', array(
	'default'           => $options['category_blog_two_count'],
	'sanitize_callback' => 'absint',
	'validate_callback' => 'academic_validate_category_blog_two_count'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_two_count]', array(
	'label'             => __( 'No. of Articles', 'academic' ),
	'description'       => __( 'Min 1 / Max 12', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'number',
	'input_attrs'       => array(
		'min' => 1,
		'max' => 12,
		'style' => 'width:100px'
		),
	'active_callback'	=> 'academic_category_blog_two_active'
) );

// Add category blog two layout.
$wp_customize->add_setting( 'academic_theme_options[category_blog_two_layout]', array(
	'default'           => $options['category_blog_two_layout'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_two_layout]', array(
	'label'             => __( 'Layout', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'select',
	'choices'           => academic_category_blog_two_layout(),
	'active_callback'	=> 'academic_category_blog_two_active'
) );

// Add category blog two type.
$wp_customize->add_setting( 'academic_theme_options[category_blog_two_type]', array(
	'default'           => $options['category_blog_two_type'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[category_blog_two_type]', array(
	'label'             => __( 'Content Type', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'select',
	'choices'           => academic_category_blog_two_type(),
	'active_callback'	=> 'academic_category_blog_two_active'
) );

// Add category blog two type category setting and control
$wp_customize->add_setting(  'academic_theme_options[category_blog_two_multiple_category]', array(
	'sanitize_callback' => 'academic_sanitize_category_list',
) ) ;

$wp_customize->add_control( new academic_Dropdown_Category_Control ( $wp_customize,'academic_theme_options[category_blog_two_multiple_category]', array(
	'label'             => __( 'Select Category', 'academic' ),
	'section'           => 'academic_category_blog_two',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'academic_category_blog_two_multiple_category'
) ) );