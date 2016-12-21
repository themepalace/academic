<?php
/**
 * Menu
 *
 * This is the template for all registered menus
 *
 * @package Theme Palace
 * @subpackage academic
 * @since Academic 0.3
 */

if ( ! function_exists( 'academic_navigation' ) ) :
	/**
	 * Add primary menu
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_navigation() {
		?>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
        <?php 
        endif;
	}
endif;
add_action( 'academic_header', 'academic_navigation', 60 );


if ( ! function_exists( 'academic_mobile_menu' ) ) :
	/**
	 * Add mobile menu
	 */

	function academic_mobile_menu() { ?>
		<!-- Mobile Menu -->
        <nav id="sidr-left-top" class="mobile-menu sidr left">
          <?php academic_site_logo();?>
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul' ) ); ?>
        </nav><!-- end left-menu -->

        <a id="sidr-left-top-button" class="menu-button right" href="#sidr-left-top"><i class="fa fa-bars"></i></a>
	<?php
	}
endif;
add_filter( 'academic_mobile_menu','academic_mobile_menu', 70 );