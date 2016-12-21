<?php
/**
* Layout options
*
* @package Academic
* @since Academic 0.3
*/

// Add sidebar section
$wp_customize->add_section( 'academic_layout', array(
	'title'               => __('Layout','academic'),
	'description'         => __( 'Layout section options.', 'academic' ),
	'panel'               => 'academic_theme_options_panel'
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'academic_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'academic_sanitize_select',
	'default'             => $options['sidebar_position']
) );

$wp_customize->add_control( 'academic_theme_options[sidebar_position]', array(
	'label'               => __( 'Sidebar Position', 'academic' ),
	'section'             => 'academic_layout',
	'type'                => 'select',
	'choices'			  => academic_sidebar_position(),
) );

// Site layout setting and control.
$wp_customize->add_setting( 'academic_theme_options[site_layout]', array(
	'sanitize_callback'   => 'academic_sanitize_select',
	'default'             => $options['site_layout']
) );

$wp_customize->add_control( 'academic_theme_options[site_layout]', array(
	'label'               => __( 'Site Layout', 'academic' ),
	'section'             => 'academic_layout',
	'type'                => 'select',
	'choices'			  => academic_site_layout(),
) );
