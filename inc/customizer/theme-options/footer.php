<?php
/**
 * Footer options
 *
 * @package Academic
 * @since Academic 0.3
 */

/*Footer Section*/
$wp_customize->add_section( 'academic_section_footer',
	array(
		'title'      			=> __( 'Footer Options', 'academic' ),
		'priority'   			=> 900,
		'panel'      			=> 'academic_theme_options_panel',
	)
);

// scroll top visible
$wp_customize->add_setting( 'academic_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback'		=> 'academic_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'academic_theme_options[scroll_top_visible]',
    array(
		'label'      			=> __( 'Display Scroll Top Button', 'academic' ),
		'section'    			=> 'academic_section_footer',
		'type'		 			=> 'checkbox',
    )
);