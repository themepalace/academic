<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Academic
	 */

	/**
	 * academic_doctype hook
	 *
	 * @hooked academic_doctype -  10
	 *
	 */
	do_action( 'academic_doctype' );

?>
<head>
<?php
	/**
	 * academic_before_wp_head hook
	 *
	 * @hooked academic_head -  10
	 *
	 */
	do_action( 'academic_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * academic_page_start hook
	 *
	 * @hooked academic_page_start -  10
	 *
	 */
	do_action( 'academic_page_start' );

	/**
	 * academic_top_bar hook
	 *
	 * @hooked academic_add_top_bar -  10
	 *
	 */
	do_action( 'academic_top_bar' );

	/**
	 * academic_header hook
	 *
	 * @hooked academic_header_start       - 10
	 * @hooked academic_site_branding_start- 20
	 * @hooked academic_site_logo          - 30
	 * @hooked academic_site_header        - 40
	 * @hooked academic_site_branding_end  - 50
	 * @hooked academic_navigation         - 60
	 * @hooked academic_header_end         - 100
	 *
	 */
	do_action( 'academic_header' );

	/**
	 * academic_mobile_menu hook
	 *
	 * @hooked academic_mobile_menu -  10
	 *
	 */
	do_action( 'academic_mobile_menu' );

	/**
	 * academic_content_start hook
	 *
	 * @hooked academic_content_start -  10
	 *
	 */
	do_action( 'academic_content_start' );


	/**
	 * academic_modules hook
	 *
	 * @hooked academic_content_start -  10
	 *
	 */
	do_action( 'academic_modules' );

	/**
	 * academic_loader_action hook
	 *
	 * @hooked academic_loader -  10
	 *
	 */
	do_action( 'academic_loader_action' );

	/**
	 * academic_breadcrumb_action hook
	 *
	 * @hooked academic_add_breadcrumb -  10
	 *
	 */
	do_action( 'academic_breadcrumb_action' );

	/**
	* academic_primary_content hook
	*
	* @hooked academic_add_slider_section - 10
	* @hooked academic_add_about_section - 20
	* @hooked academic_add_category_blog_one - 30
	* @hooked academic_add_category_blog_two - 50
	* @hooked academic_add_category_blog_three - 60
	*
	*/
	do_action( 'academic_primary_content' );