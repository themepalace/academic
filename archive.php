<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Academic
 */

get_header(); 

/**
 * academic_page_section hook
 *
 * @hooked academic_page_section -  10
 *
 */
do_action( 'academic_page_section' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : 
			?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
		
		/**
		* Hook - academic_pagination.
		*
		* @hooked academic_default_pagination 
		* @hooked academic_numeric_pagination 
		*/
		do_action( 'academic_action_pagination' ); 
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
