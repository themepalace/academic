<?php
/**
* Partners options
*
* @package Academic
* @since Academic 0.3
*/

// Add Partners enable section
$wp_customize->add_section( 'academic_partner', array(
	'title'             => __('Partners','academic'),
	'description'       => __( 'Partners options.', 'academic' ),
	'panel'             => 'academic_sections_panel'
) );

// Add Partners enable setting and control.
$wp_customize->add_setting( 'academic_theme_options[partner_enable]', array(
	'default'           => $options['partner_enable'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[partner_enable]', array(
	'label'             => __( 'Enable on', 'academic' ),
	'section'           => 'academic_partner',
	'type'              => 'select',
	'choices'           => academic_enable_disable_options()
) );

// Add Partners title.
$wp_customize->add_setting( 'academic_theme_options[partner_title]', array(
	'default'           => $options['partner_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'academic_theme_options[partner_title]', array(
	'label'             => __( 'Title', 'academic' ),
	'section'           => 'academic_partner',
	'type'              => 'text',
	'active_callback'	=> 'academic_partner_active'
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'academic_theme_options[partner_title]', array(
		'selector'            => '#our-partners .container .entry-header .entry-title',
		'render_callback'     => 'academic_partial_partner_title',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
	) );
}

// Add partner slider dragable.
$wp_customize->add_setting( 'academic_theme_options[partner_dragable]', array(
	'default'           => $options['partner_dragable'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[partner_dragable]', array(
	'label'             => __( 'Enable Slide Dragable', 'academic' ),
	'section'           => 'academic_partner',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_partner_active'
) );

// Add category blog two slider auto play.
$wp_customize->add_setting( 'academic_theme_options[partner_autoplay]', array(
	'default'           => $options['partner_autoplay'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[partner_autoplay]', array(
	'label'             => __( 'Enable Auto Slide', 'academic' ),
	'section'           => 'academic_partner',
	'type'              => 'checkbox',
	'active_callback'	=> 'academic_partner_active'
) );

// Add no of Partners.
$wp_customize->add_setting( 'academic_theme_options[no_of_partner]', array(
	'default'           => $options['no_of_partner'],
	'sanitize_callback' => 'absint',
	'validate_callback' => 'academic_validate_partner_count'
) );

$wp_customize->add_control( 'academic_theme_options[no_of_partner]', array(
	'label'             => __( 'No of partners', 'academic' ),
	'description'		=> __( 'Min 1 / Max 15. Notice: Please refresh after the number of features is set to see the effects.' , 'academic' ),
	'section'           => 'academic_partner',
	'type'              => 'number',
	'input_attrs' 		=> array(
		'min' => 1,
		'max' => 15,
		'style' => 'width:100px'
		),
	'active_callback'	=> 'academic_partner_active'
) );


for ( $i = 1; $i <= $options['no_of_partner']; $i++ ) { 

	// Add Partners image.
	$wp_customize->add_setting( 'academic_theme_options[partner_page_'. $i .']',
	  array(
	    'sanitize_callback' 	=> 'academic_sanitize_page',
	  )
	);
	$wp_customize->add_control( 'academic_theme_options[partner_page_'. $i .']',
	    array(
	    	'label'       		=> sprintf( __( 'Select Page # %s', 'academic' ), $i ),
			'section'     		=> 'academic_partner',
			'type'				=> 'dropdown-pages',
			'active_callback'	=> 'academic_partner_active',
	    )
	);
}
