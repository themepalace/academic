<?php
/**
 * Excerpt options
 *
 * @package Academic
 * @since Academic 0.3
 */

// Add excerpt section
$wp_customize->add_section( 'academic_excerpt_section', array(
	'title'             => __('Excerpt','academic'),
	'description'       => __( 'Excerpt section options.', 'academic' ),
	'panel'             => 'academic_theme_options_panel'
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'academic_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'academic_sanitize_number_range',
	'validate_callback' => 'academic_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length']
) );

$wp_customize->add_control( 'academic_theme_options[long_excerpt_length]', array(
	'label'       => __( 'Blog Page Excerpt Length', 'academic' ),
	'description' => __( 'Total words to be displayed in archive page/search page.', 'academic' ),
	'section'     => 'academic_excerpt_section',
	'type'        => 'number',
	'input_attrs' => array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// Read more text.
$wp_customize->add_setting( 'academic_theme_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			  => $options['read_more_text']
) );

$wp_customize->add_control( 'academic_theme_options[read_more_text]', array(
	'label'       => __( 'Read More Text', 'academic' ),
	'section'     => 'academic_excerpt_section',
	'type'        => 'text',
) );