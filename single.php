<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Academic
 */

get_header(); ?>

<?php 
/**
 * academic_page_section hook
 *
 * @hooked academic_page_section -  10
 *
 */
do_action( 'academic_page_section' );?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'single' );

			/**
			* Hook academic_action_post_pagination
			*  
			* @hooked academic_post_pagination 
			*/
			do_action( 'academic_action_post_pagination' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( academic_is_sidebar_enable() ) {
	get_sidebar();
} 

/**
 * academic_page_section_end hook
 *
 * @hooked academic_page_section_end -  10
 *
 */
do_action( 'academic_page_section_end' );

get_footer();
