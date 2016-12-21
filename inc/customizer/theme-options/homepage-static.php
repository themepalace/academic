<?php
/**
* Homepage (Static ) options
*
* @package Academic
* @since Academic 0.3
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'academic_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'academic_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content']
) );

$wp_customize->add_control( 'academic_theme_options[enable_frontpage_content]', array(
	'label'       => __( 'Enable Content', 'academic' ),
	'description' => __( 'Check to enable content on static front page only.', 'academic' ),
	'section'     => 'static_front_page',
	'type'        => 'checkbox'
) );