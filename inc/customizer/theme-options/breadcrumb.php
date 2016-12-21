<?php
/**
* Breadcrumb options
*
* @package Academic
* @since Academic 0.3
*/

$wp_customize->add_section( 'academic_breadcrumb', array(
	'title'             => __('Breadcrumb','academic'),
	'description'       => __( 'Breadcrumb section options.', 'academic' ),
	'panel'             => 'academic_theme_options_panel'
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'academic_theme_options[breadcrumb_enable]', array(
	'sanitize_callback'	=> 'academic_sanitize_checkbox',
	'default'          	=> $options['breadcrumb_enable']
) );

$wp_customize->add_control( 'academic_theme_options[breadcrumb_enable]', array(
	'label'            	=> __( 'Enable Breadcrumb', 'academic' ),
	'section'          	=> 'academic_breadcrumb',
	'type'             	=> 'checkbox',
) );

// Breadcrumb seperator.
$wp_customize->add_setting( 'academic_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator']
) );

$wp_customize->add_control( 'academic_theme_options[breadcrumb_separator]', array(
	'label'            	=> __( 'Breadcrumb Seperator', 'academic' ),
	'section'          	=> 'academic_breadcrumb',
	'type'             	=> 'text',
	'input_attrs'		=> array(
		'style' => 'width:100px'
		),
	'active_callback'	=> 'academic_is_breadcrumb_enable'
) );