<?php
/**
 * Academic basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Academic
 * @since Academic 0.3
 */

$options = academic_get_theme_options();


if ( ! function_exists( 'academic_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Academic 0.3
	 */
	function academic_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'academic_doctype', 'academic_doctype', 10 );


if ( ! function_exists( 'academic_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
		$options = academic_get_theme_options(); ?>
		<?php
	}
endif;
add_action( 'academic_before_wp_head', 'academic_head', 10 );


if ( ! function_exists( 'academic_page_start' ) ) :
	/**
	 * Start div id #page and screen reader link
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_page_start() {
		?>
		<div id="page" class="hfeed site">
			<div class="site-inner">
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'academic' ); ?></a>
		<?php
	}
endif;
add_action( 'academic_page_start', 'academic_page_start', 10 );


if ( ! function_exists( 'academic_header_start' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_header_start() {
		?>
        <header id="masthead" class="site-header">
            <div class="container">
		<?php
	}
endif;
add_action( 'academic_header', 'academic_header_start', 10 );


if ( ! function_exists( 'academic_site_branding_start' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_site_branding_start() {
		?>
        <div class="site-branding align-left"><!-- use align-right class to change logo position -->
		<?php
	}
endif;
add_action( 'academic_header', 'academic_site_branding_start', 20 );


if ( ! function_exists( 'academic_site_logo' ) ) :
	/**
	 * Start div class .site-branding
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_site_logo() {
		?>
	        <div class="site-logo">
	        	<?php
	        	if ( function_exists( 'the_custom_logo' ) ) {
	        		the_custom_logo();
	        	}
	        	?>
	        </div><!-- end .site-logo -->
		<?php
	}
endif;
add_action( 'academic_header', 'academic_site_logo', 30 );


if ( ! function_exists( 'academic_site_header' ) ) :
	/**
	 * Start div class .site-branding
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_site_header() {
		?>
        <div id="site-header">
            <?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
        </div><!-- end #site-header -->
		<?php
	}
endif;
add_action( 'academic_header', 'academic_site_header', 40 );


if ( ! function_exists( 'academic_site_branding_end' ) ) :
	/**
	 * Start div id #masthead
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_site_branding_end() {
		?>
	    </div><!--end .site-branding-->
		<?php
	}
endif;
add_action( 'academic_header', 'academic_site_branding_end', 50 );


if ( ! function_exists( 'academic_header_end' ) ) :
	/**
	 * End header class id #masthead
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_header_end() {
		?>
        	</div><!-- end .menu-wrapper -->
        </header><!--end .site-header-->
		<?php
	}
endif;
add_action( 'academic_header', 'academic_header_end', 100 );


if ( ! function_exists( 'academic_content_start' ) ) :
	/**
	 * Start div id #content
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'academic_content_start', 'academic_content_start', 10 );


if ( ! function_exists( 'academic_content_end' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_content_end() {
		?>
		</div><!--end .site-content-->
		<?php
	}
endif;
add_action( 'academic_content_end', 'academic_content_end', 100 );


if ( ! function_exists( 'academic_footer_start' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_footer_start() {
		$footer_sidebar_data = academic_footer_sidebar_class();
		$class               = $footer_sidebar_data['class'];
		?>
		<footer id="colophon" class="site-footer <?php echo esc_attr( $class );?>-col" role="contentinfo">
		<?php
	}
endif;
add_action( 'academic_footer', 'academic_footer_start', 10 );


if ( ! function_exists( 'academic_footer' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_footer() {

		$footer_sidebar_data = academic_footer_sidebar_class();
		$active_id           = $footer_sidebar_data['active_id'];

		if ( empty( $active_id ) ) {
			return;
		} ?>
        <div class="container page-section">
	      	<?php for ( $i=0; $i < count( $active_id ); $i++ ) { ?>

			<div class="column-wrapper">
	      		<?php 
	      		if ( is_active_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' ) ){
	      			dynamic_sidebar( 'footer-'.absint( $active_id[ $i ] ).'' );
	      		}
	      		?>
	      	</div>
	      	<?php } ?>
        </div><!-- end .container -->
		<?php
	}
endif;
add_action( 'academic_footer', 'academic_footer', 30 );


if ( ! function_exists( 'academic_copyright' ) ) :
	/**
	 * End div class .site-info
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_copyright() { 
		$theme_data = wp_get_theme(); ?>
		
	    <div class="site-info copyright text-center">
	    	<div class="container">
	      		<?php echo sprintf( _x( 'Copyright &copy; %1$s. All Rights Reserved', '1: Year, 2: Site Title with home URL', 'academic' ), date( 'Y' ) ) . ' &#124; ' . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'academic' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( $theme_data->get( 'Author' ) ) .'</a>'?>
	    	</div>
	    </div><!-- end .site-info -->  	
	<?php
	}
endif;
add_action( 'academic_footer', 'academic_copyright', 40 );


if ( ! function_exists( 'academic_footer_end' ) ) :
	/**
	 * End footer id #colophon
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_footer_end() {
		?>
        </footer><!-- end .site-footer -->
		<?php
	}
endif;
add_action( 'academic_footer', 'academic_footer_end', 100 );


if ( ! function_exists( 'academic_back_to_top' ) ) :
	/**
	 * Back to top class .backtotop
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_back_to_top() {
		$options = academic_get_theme_options();
		if ( $options['scroll_top_visible'] ) : ?>
        	<div class="backtotop"><i class="fa fa-angle-up fa-2x"></i></div><!--end .backtotop-->
		<?php 
		endif;
	}
endif;
add_action( 'academic_back_to_top', 'academic_back_to_top', 10 );


if ( ! function_exists( 'academic_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since Academic 0.3
	 */
	function academic_add_breadcrumb() {
		$options = academic_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo '<section id="breadcrumb-list" class="os-animation">
	            <div class="container">';
		        $breadcrumb_separator = $options['breadcrumb_separator'];
				$args = array(
				'separator'     => $breadcrumb_separator,
				);
				academic_simple_breadcrumb( $args );      
		echo '</div><!-- .container -->
          		</section><!-- end #breadcrumb-list -->';
		return;

	}
endif;
add_action( 'academic_breadcrumb_action', 'academic_add_breadcrumb' , 10 );


if ( ! function_exists( 'academic_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_page_end() {
		?>
				</div><!--end .site-inner -->
		</div><!-- end #page-->
		<?php
	}
endif;
add_action( 'academic_page_end', 'academic_page_end', 100 );


if ( ! function_exists( 'academic_page_section' ) ) :
	/**
	 * Start div class .container .page-section
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_page_section() {
		?>
		<div class="container page-section">
		<?php
	}
endif;
add_action( 'academic_page_section', 'academic_page_section', 10 );


if ( ! function_exists( 'academic_page_section_end' ) ) :
	/**
	 * Start div class .container .page-section
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_page_section_end() {
		?>
		</div><!-- end .page-section" -->
		<?php
	}
endif;
add_action( 'academic_page_section_end', 'academic_page_section_end', 10 );