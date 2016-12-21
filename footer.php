<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Academic
 */

/**
* academic_footer_content hook
*
* @hooked academic_add_partner - 10
*
*/
do_action( 'academic_footer_content' );

/**
* academic_content_end hook
*
* @hooked academic_content_end -  100
*
*/
do_action( 'academic_content_end' );


/**
* academic_footer hook
*
* @hooked academic_footer_start -  10
* @hooked academic_footer -  30
* @hooked academic_copyright -  40
* @hooked academic_footer_end -  100
*
*/
do_action( 'academic_footer' );


/**
* academic_back_to_top hook
*
* @hooked academic_back_to_top -  10
*
*/
do_action( 'academic_back_to_top' );

wp_footer(); ?>

</body>
</html>
