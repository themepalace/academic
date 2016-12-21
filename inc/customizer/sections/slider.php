<?php
/**
* Slider options
*
* @package Academic
* @since Academic 0.3
*/

// Add slider enable section
$wp_customize->add_section( 'academic_slider_section', array(
	'title'             => __('Slider','academic'),
	'description'       => __( 'Slider section options.', 'academic' ),
	'panel'             => 'academic_sections_panel'
) );

// Add slider enable setting and control.
$wp_customize->add_setting( 'academic_theme_options[slider_enable]', array(
	'default'           => $options['slider_enable'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[slider_enable]', array(
	'label'             => __( 'Enable on', 'academic' ),
	'section'           => 'academic_slider_section',
	'type'              => 'select',
	'choices'           => academic_enable_disable_options()
) );

// Add slider effects setting and control.
$wp_customize->add_setting( 'academic_theme_options[slider_content_effect]', array(
	'default'           => $options['slider_content_effect'],
	'sanitize_callback' => 'academic_sanitize_select'
) );

$wp_customize->add_control( 'academic_theme_options[slider_content_effect]', array(
	'label'           => __( 'Transition Effects', 'academic' ),
	'section'         => 'academic_slider_section',
	'type'            => 'select',
	'active_callback' => 'academic_is_slider_active',
	'choices'         => academic_slider_effect(),
) );

// Add enable arrow controls setting and control.
$wp_customize->add_setting( 'academic_theme_options[enable_slider_controls]', array(
	'default'           => $options['enable_slider_controls'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[enable_slider_controls]', array(
	'label'           => __( 'Enable Arrow Controls', 'academic' ),
	'section'         => 'academic_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_is_slider_active',
) );

// Add enable slider pager setting and control.
$wp_customize->add_setting( 'academic_theme_options[enable_slider_pager]', array(
	'default'           => $options['enable_slider_pager'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[enable_slider_pager]', array(
	'label'           => __( 'Enable Pager Controls', 'academic' ),
	'section'         => 'academic_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_is_slider_active',
) );

// Add enable slider dragable setting and control.
$wp_customize->add_setting( 'academic_theme_options[enable_slider_dragable]', array(
	'default'           => $options['enable_slider_dragable'],
	'sanitize_callback' => 'academic_sanitize_checkbox'
) );

$wp_customize->add_control( 'academic_theme_options[enable_slider_dragable]', array(
	'label'           => __( 'Slider Dragable', 'academic' ),
	'section'         => 'academic_slider_section',
	'type'            => 'checkbox',
	'active_callback' => 'academic_is_slider_active',
) );

// Add slider number setting and control.
$wp_customize->add_setting( 'academic_theme_options[no_of_slider]', array(
	'default'           => $options['no_of_slider'],
	'sanitize_callback' => 'academic_sanitize_number_range',
	'validate_callback' => 'academic_validate_no_of_slider',
) );

$wp_customize->add_control( 'academic_theme_options[no_of_slider]', array(
	'label'           => __( 'Number of slides', 'academic' ),
	'description'     => __( 'Notice: Please refresh after the number of slides is set to see the effects.', 'academic' ),
	'section'         => 'academic_slider_section',
	'type'            => 'number',
	'active_callback' => 'academic_is_slider_active',
	'input_attrs'     => array(
		'max' => 5,
		'min' => 1,
		'style' => 'width:100px'
	)
) );

/**
 * Page Content Type
 */
for ($i=1; $i <= $options['no_of_slider']; $i++) {
	// Show page drop-down setting and control
	$wp_customize->add_setting( 'academic_theme_options[slider_content_page_'.$i.']', array(
		'sanitize_callback' => 'academic_sanitize_page'
	) );

	$wp_customize->add_control( 'academic_theme_options[slider_content_page_'.$i.']', array(
		'label'           => sprintf( __( 'Page Slider #%s', 'academic' ), $i ),
		'section'         => 'academic_slider_section',
		'active_callback' => 'academic_is_slider_active',
		'type'				=> 'dropdown-pages'
	) );
}

