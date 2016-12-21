<?php
/**
 * All codes related to custom header
 *
 * @package Academic
 */

/*
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Academic
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses academic_header_style()
 */
function academic_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'academic_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'academic_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'academic_custom_header_setup' );



if ( ! function_exists( 'academic_custom_header' ) ) :
	/**
	 * Custom Header Codes
	 *
	 * @since Academic 0.3
	 *
	 */
	function academic_custom_header() {
		
		/**
		 * Filter the default twentysixteen custom header sizes attribute.
		 *
		 * @since Academic 0.3
		 *
		 */
		$header_image_meta = academic_header_image_meta_option();

		if ( ( '' == $header_image_meta && ! get_header_image() ) || ! $header_image_meta ) {
			return;
		}
		?>
		<section id="banner-image">
            <div class="black-overlay"></div>
          	<div class="container">
              	<div class="banner-wrapper">
	                <div class="page-title">
	                  <header class="entry-header">
	                    <h2 class="entry-title">
	                    	<?php academic_title_as_per_template();?>
	                    </h2>
	                  </header>
	                </div><!-- end .page-title -->
                </div><!-- end .container -->
         	</div><!-- end .banner-wrapper -->
	        </section><!-- end #banner-image -->
		<?php
	}
endif;
add_action( 'academic_content_start', 'academic_custom_header', 20 );


if ( ! function_exists( 'academic_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see academic_custom_header_setup().
 */
function academic_header_style() {
	$header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( HEADER_TEXTCOLOR === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		#site-header .site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;
